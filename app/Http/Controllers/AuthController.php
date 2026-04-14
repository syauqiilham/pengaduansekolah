<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Tampilkan form register
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi user baru
     */
    public function registerPost(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'role'     => 'required|in:admin,siswa',
        ], [
            'name.required'     => 'Nama wajib diisi',
            'email.required'    => 'Email wajib diisi',
            'email.unique'      => 'Email sudah terdaftar',
            'password.min'      => 'Password minimal 5 karakter',
            'password.confirmed'=> 'Konfirmasi password tidak cocok',
            'role.required'     => 'Role wajib dipilih',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect('/login')
            ->with('success', 'Register berhasil, silakan login.');
    }

    /**
     * Tampilkan form login
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi user
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // Simpan session manual
        Session::put([
            'login'     => true,
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'role'      => $user->role,
        ]);

        // Redirect berdasarkan role
        return $user->role === 'admin'
            ? redirect('/admin/pengaduan')
            : redirect()->route('siswa.dashboard');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
}