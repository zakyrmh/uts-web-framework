<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses data registrasi
    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // 2. Simpan ke Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password wajib di-hash!
        ]);

        // 3. Otomatis Login setelah Berhasil Register
        Auth::login($user);

        // 4. Redirect ke halaman CRUD Mahasiswa (kita siapkan route-nya nanti)
        return redirect()->route('mahasiswa.index')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // 2. Coba Autentikasi (Fitur 'remember' opsional, kita buat false dulu)
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Jika sukses, regenerasi session demi keamanan
            $request->session()->regenerate();

            // Alihkan ke halaman tujuan (default: /mahasiswa)
            return redirect()->intended(route('mahasiswa.index'))->with('success', 'Login berhasil! Halo kembali.');
        }

        // 3. Jika Gagal, Kembalikan dengan error khusus email/password salah
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Mempertahankan input email lama agar user tidak repot ketik ulang
    }

    // --- FITUR LOGOUT (BARU) ---
    public function logout(Request $request)
    {
        Auth::logout();

        // Hancurkan session lama
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Alihkan ke halaman login kembali
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
