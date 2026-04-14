<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

// ==================== 🔐 AUTH ROUTES ====================

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
})->name('home');


// ==================== 👨‍🎓 SISWA ROUTES ====================

// ✅ DASHBOARD SISWA (HARUS DILETAKKAN SEBELUM ROUTE DINAMIS /{id})
Route::get('/siswa/pengaduan/dashboard', function () {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    
    $user_id = session('user_id');
    
    // Hitung statistik
    $total_pengaduan = Pengaduan::where('user_id', $user_id)->count();
    $menunggu = Pengaduan::where('user_id', $user_id)->where('status', '0')->count();
    $proses = Pengaduan::where('user_id', $user_id)->where('status', 'proses')->count();
    $selesai = Pengaduan::where('user_id', $user_id)->where('status', 'selesai')->count();
    
    // Pengaduan terbaru (5 terakhir)
    $pengaduan_terbaru = Pengaduan::where('user_id', $user_id)
                                   ->latest()
                                   ->limit(5)
                                   ->get();
    
    return view('siswa.pengaduan.dashboard', compact(
        'total_pengaduan', 
        'menunggu', 
        'proses', 
        'selesai',
        'pengaduan_terbaru'
    ));
})->name('siswa.dashboard');

// ✅ Redirect: Halaman utama siswa langsung ke dashboard
Route::get('/siswa/pengaduan', function () {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    $pengaduan = Pengaduan::where('user_id', session('user_id'))->latest()->get();
    return view('siswa.pengaduan.index', compact('pengaduan'));
})->name('siswa.pengaduan');

// List Semua Pengaduan Siswa (jika ingin melihat list terpisah)
Route::get('/siswa/pengaduan/list', function () {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    $pengaduan = Pengaduan::where('user_id', session('user_id'))->latest()->get();
    return view('siswa.pengaduan.index', compact('pengaduan'));
})->name('siswa.pengaduan.list');

// Form Create Pengaduan
Route::get('/siswa/pengaduan/create', function () {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    return view('siswa.pengaduan.create');
})->name('siswa.pengaduan.create');

// Store Pengaduan (POST)
Route::post('/siswa/pengaduan/store', function (Request $request) {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'isi'   => 'required|string',
        'foto'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'judul.required' => 'Judul wajib diisi',
        'isi.required' => 'Isi pengaduan wajib diisi',
        'foto.image' => 'File harus berupa gambar (jpg, png, jpeg, gif)',
        'foto.max' => 'Ukuran foto maksimal 2MB',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('uploads'), $fileName);
        $fotoPath = $fileName;
    }

    try {
        Pengaduan::create([
            'user_id' => session('user_id'),
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'foto'    => $fotoPath,
            'status'  => '0',
        ]);
        return redirect()->route('siswa.dashboard')->with('success', 'Pengaduan berhasil dikirim!');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menyimpan: ' . $e->getMessage())->withInput();
    }
})->name('siswa.pengaduan.store');

// ✅ FORM EDIT PENGADUAN
Route::get('/siswa/pengaduan/{id}/edit', function ($id) {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    
    // Cari data pengaduan dan pastikan milik user yang login
    $pengaduan = Pengaduan::where('id', $id)
                          ->where('user_id', session('user_id'))
                          ->firstOrFail();
                          
    return view('siswa.pengaduan.edit', compact('pengaduan'));
})->name('siswa.pengaduan.edit');

// ✅ PROSES UPDATE PENGADUAN
Route::put('/siswa/pengaduan/{id}/update', function (Request $request, $id) {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    
    // Validasi
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'isi'   => 'required|string',
        'foto'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $pengaduan = Pengaduan::where('id', $id)
                          ->where('user_id', session('user_id'))
                          ->firstOrFail();

    // Handle Upload Foto Baru (Hapus yang lama jika ada)
    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        // Hapus foto lama jika ada
        if ($pengaduan->foto) {
            $oldFotoPath = public_path('uploads/' . $pengaduan->foto);
            if (file_exists($oldFotoPath)) {
                unlink($oldFotoPath);
            }
        }
        
        // Upload foto baru
        $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('uploads'), $fileName);
        $pengaduan->foto = $fileName;
    }

    // Update Data
    $pengaduan->judul = $request->judul;
    $pengaduan->isi   = $request->isi;
    
    // Jika status 'selesai', siswa tidak bisa edit lagi (opsional, tapi disarankan)
    if ($pengaduan->status == 'selesai') {
        return back()->with('error', 'Tidak bisa mengedit pengaduan yang sudah selesai.');
    }

    $pengaduan->save();

    return redirect('/siswa/pengaduan')->with('success', 'Pengaduan berhasil diperbarui!');
})->name('siswa.pengaduan.update');

// ⚠️ ROUTE DINAMIS {id} - HARUS PALING AKHIR agar tidak bentrok dengan dashboard/create
Route::get('/siswa/pengaduan/{id}', function ($id) {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    $pengaduan = Pengaduan::where('id', $id)
                          ->where('user_id', session('user_id'))
                          ->firstOrFail();
    return view('siswa.pengaduan.show', compact('pengaduan'));
})->name('siswa.pengaduan.show');

// Hapus Pengaduan Siswa
Route::get('/siswa/pengaduan/delete/{id}', function ($id) {
    if (!session('login') || session('role') !== 'siswa') {
        return redirect('/login')->with('error', 'Silakan login sebagai siswa');
    }
    Pengaduan::where('id', $id)
             ->where('user_id', session('user_id'))
             ->delete();
    return redirect()->route('siswa.dashboard')->with('success', 'Pengaduan berhasil dihapus!');
})->name('siswa.pengaduan.delete');


// ==================== 👨‍💼 ADMIN ROUTES ====================

// Dashboard Admin
Route::get('/admin/pengaduan/dashboard', function () {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    
    // Hitung statistik
    $total_pengaduan = Pengaduan::count();
    $menunggu = Pengaduan::where('status', '0')->count();
    $proses = Pengaduan::where('status', 'proses')->count();
    $selesai = Pengaduan::where('status', 'selesai')->count();
    
    // Jumlah siswa unik yang membuat pengaduan
    $total_siswa = Pengaduan::distinct('user_id')->count('user_id');
    
    // Pengaduan terbaru (5 terakhir)
    $pengaduan_terbaru = Pengaduan::with('user')->latest()->limit(5)->get();
    
    return view('admin.pengaduan.dashboard', compact(
        'total_pengaduan', 
        'menunggu', 
        'proses', 
        'selesai',
        'total_siswa',
        'pengaduan_terbaru'
    ));
})->name('admin.dashboard');

// ✅ Redirect: Halaman utama admin langsung ke dashboard
Route::get('/admin/pengaduan', function () {
    return redirect()->route('admin.dashboard');
});

// List Semua Pengaduan Admin (jika ingin melihat list terpisah)
Route::get('/admin/pengaduan/list', function () {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    $pengaduan = Pengaduan::with('user')->latest()->get();
    return view('admin.pengaduan.index', compact('pengaduan'));
})->name('admin.pengaduan.list');

// Detail Pengaduan Admin
Route::get('/admin/pengaduan/{id}', function ($id) {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    $pengaduan = Pengaduan::with('user')->findOrFail($id);
    return view('admin.pengaduan.show', compact('pengaduan'));
})->name('admin.pengaduan.show');

// Update Status Pengaduan (Admin) - POST Method
Route::post('/admin/pengaduan/{id}/update-status', function (Request $request, $id) {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    
    $request->validate([
        'status' => 'required|in:0,proses,selesai',
        'tanggapan' => 'nullable|string|max:1000'
    ]);
    
    Pengaduan::where('id', $id)->update([
        'status' => $request->status,
        'tanggapan' => $request->tanggapan,
    ]);
    
    return redirect()->route('admin.pengaduan.list')->with('success', 'Status berhasil diperbarui!');
})->name('admin.pengaduan.update');

// Hapus Pengaduan Admin
Route::get('/admin/pengaduan/delete/{id}', function ($id) {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    Pengaduan::where('id', $id)->delete();
    return redirect()->route('admin.pengaduan.list')->with('success', 'Pengaduan berhasil dihapus!');
})->name('admin.pengaduan.delete');

// Hapus Pengaduan Admin
Route::get('/admin/pengaduan/delete/{id}', function ($id) {
    if (!session('login') || session('role') !== 'admin') {
        return redirect('/login')->with('error', 'Silakan login sebagai admin');
    }
    Pengaduan::where('id', $id)->delete();
    return redirect()->route('admin.pengaduan')->with('success', 'Pengaduan berhasil dihapus!');
})->name('admin.pengaduan.delete');