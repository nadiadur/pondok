<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing records where telpon is null
        DB::table('registrations')
            ->whereNull('telpon')
            ->update(['telpon' => 'Belum diisi']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally revert back to null if needed
        DB::table('registrations')
            ->where('telpon', 'Belum diisi')
            ->update(['telpon' => null]);
    }
};