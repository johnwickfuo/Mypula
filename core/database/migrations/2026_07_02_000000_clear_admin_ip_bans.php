<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Purge any admin IP bans left over from the now-disabled
     * automatic 3-strike ban feature.
     */
    public function up(): void
    {
        if (Schema::hasTable('admin_ip_bans')) {
            DB::table('admin_ip_bans')->delete();
        }
    }

    /**
     * No rollback: cleared bans are not restored.
     */
    public function down(): void
    {
        //
    }
};
