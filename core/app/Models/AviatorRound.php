<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AviatorRound extends Model
{
    protected $fillable = [
        'round_number',
        'crash_point',
        'status',
        'started_at',
        'crashed_at',
        'total_bet_amount',
        'total_payout',
        'total_bets'
    ];

    protected $casts = [
        'crash_point' => 'decimal:2',
        'total_bet_amount' => 'decimal:8',
        'total_payout' => 'decimal:8',
        'started_at' => 'datetime',
        'crashed_at' => 'datetime',
    ];

    /**
     * Get all bets for this round
     */
    public function bets(): HasMany
    {
        return $this->hasMany(AviatorBet::class);
    }

    /**
     * Get active bets for this round
     */
    public function activeBets(): HasMany
    {
        return $this->hasMany(AviatorBet::class)->where('status', 'active');
    }

    /**
     * Get the current active round
     */
    public static function getCurrentRound()
    {
        return self::whereIn('status', ['waiting', 'flying'])->first();
    }

    /**
     * Get the latest round number
     */
    public static function getLatestRoundNumber()
    {
        return self::max('round_number') ?? 0;
    }

    /**
     * Create next round with pre-generated crash point
     */
    public static function createNextRound()
    {
        $lastRoundNumber = self::max('round_number') ?? 0;
        
        return self::create([
            'round_number' => $lastRoundNumber + 1,
            'crash_point' => self::generateCrashPoint(),
            'status' => 'pending'
        ]);
    }

    /**
     * Generate crash point using provably fair algorithm
     */
    public static function generateCrashPoint()
    {
        // Simple random for now - can be replaced with provably fair algorithm
        $random = mt_rand(100, 1000) / 100;

        // Weight distribution to make lower multipliers more common
        if ($random < 1.5) {
            $crashPoint = round(mt_rand(101, 200) / 100, 2);
        } elseif ($random < 3.0) {
            $crashPoint = round(mt_rand(150, 500) / 100, 2);
        } else {
            $crashPoint = round(mt_rand(200, 1000) / 100, 2);
        }

        // Enforce the admin-configured minimum multiplier: the plane must fly
        // to at least this value before it is allowed to crash. When a rolled
        // point falls below the floor, re-roll it just above the floor so the
        // result is not always pinned to the exact minimum.
        $minMultiplier = (float) optional(
            GameSetting::where('game_key', 'aviator')->first()
        )->min_multiplier;

        if ($minMultiplier > 1.0 && $crashPoint < $minMultiplier) {
            $crashPoint = round($minMultiplier + (mt_rand(0, 100) / 100), 2);
        }

        return $crashPoint;
    }

    /**
     * Update round statistics
     */
    public function updateStatistics()
    {
        $this->total_bets = $this->bets()->count();
        $this->total_bet_amount = $this->bets()->sum('bet_amount');
        $this->total_payout = $this->bets()->whereNotNull('payout')->sum('payout');
        $this->save();
    }
}
