<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            
            // ✅ Tambah kolom 'status' jika belum ada
            if (!Schema::hasColumn('pengaduans', 'status')) {
                $table->enum('status', ['0', 'proses', 'selesai'])
                      ->default('0')
                      ->after('foto');
            }
            
            // ✅ Buat kolom opsional menjadi nullable (boleh kosong)
            if (Schema::hasColumn('pengaduans', 'lokasi')) {
                $table->string('lokasi')->nullable()->change();
            }
            
            if (Schema::hasColumn('pengaduans', 'kategori')) {
                $table->string('kategori')->nullable()->change();
            }
            
            if (Schema::hasColumn('pengaduans', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->change();
            }
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn(['status', 'lokasi', 'kategori', 'deskripsi']);
        });
    }
};