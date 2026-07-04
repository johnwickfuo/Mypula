<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add a per-game minimum multiplier (used by Aviator as the guaranteed
     * "minimum X the plane flies to" before it can crash).
     */
    public function up(): void
    {
        if (Schema::hasTable('game_settings') && !Schema::hasColumn('game_settings', 'min_multiplier')) {
            Schema::table('game_settings', function (Blueprint $table) {
                $table->decimal('min_multiplier', 8, 2)->default(1.00)->after('win_chance');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('game_settings') && Schema::hasColumn('game_settings', 'min_multiplier')) {
            Schema::table('game_settings', function (Blueprint $table) {
                $table->dropColumn('min_multiplier');
            });
        }
    }
};
