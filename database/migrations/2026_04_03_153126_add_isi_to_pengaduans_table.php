<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Cek apakah kolom sudah ada
            if (!Schema::hasColumn('pengaduans', 'isi')) {
                $table->text('isi')->after('judul');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduans', 'isi')) {
                $table->dropColumn('isi');
            }
        });
    }
};