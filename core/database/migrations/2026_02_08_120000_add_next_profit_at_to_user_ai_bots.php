<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_ai_bots') && !Schema::hasColumn('user_ai_bots', 'next_profit_at')) {
            Schema::table('user_ai_bots', function (Blueprint $table) {
                $table->dateTime('next_profit_at')->nullable()->after('last_profit_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('user_ai_bots') && Schema::hasColumn('user_ai_bots', 'next_profit_at')) {
            Schema::table('user_ai_bots', function (Blueprint $table) {
                $table->dropColumn('next_profit_at');
            });
        }
    }
};
