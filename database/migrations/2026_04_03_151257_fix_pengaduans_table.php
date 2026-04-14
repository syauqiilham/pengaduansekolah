<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Ubah kolom kategori menjadi nullable atau beri default
            $table->string('kategori')->nullable()->change();
            // atau
            // $table->string('kategori')->default('umum')->change();
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string('kategori')->nullable(false)->change();
        });
    }
};