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
        Schema::table('pengaduans', function (Blueprint $table) {
            //
        });
        
        // ✅ Perbaiki kolom status menggunakan raw SQL
        // ENUM dengan nilai: '0' (menunggu), 'proses', 'selesai'
        DB::statement("ALTER TABLE pengaduans MODIFY COLUMN status ENUM('0', 'proses', 'selesai') DEFAULT '0'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            //
        });
        
        // Revert ke default (jika perlu)
        DB::statement("ALTER TABLE pengaduans MODIFY COLUMN status VARCHAR(20) DEFAULT '0'");
    }
};