<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'foto',
        'status',
        'kategori', // Tambahkan jika ada kolom kategori
        'tanggapan', // ✅ Tambahkan ini
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}