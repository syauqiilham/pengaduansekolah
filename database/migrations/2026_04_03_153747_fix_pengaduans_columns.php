<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string('lokasi')->nullable()->change();
            $table->string('kategori')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string('lokasi')->nullable(false)->change();
            $table->text('deskripsi')->nullable(false)->change();
            $table->string('kategori')->nullable(false)->change();
        });
    }
};