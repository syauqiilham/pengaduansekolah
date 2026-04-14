<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::with('user')->latest()->get();
        return view('admin.pengaduan.index', compact('data'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggapan_admin' => 'nullable'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => $request->status,
            'tanggapan_admin' => $request->tanggapan_admin
        ]);

        return redirect('/admin/pengaduan/'.$id)->with('success', 'Pengaduan berhasil diperbarui');
    }
}