<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method menuju Halaman Register
    public function register()
    {
        // Kirim data judul halaman
        $data['title'] = 'Register';

        // Redirect ke halaman register
        return view('user/register', $data);
    }

    // Method untuk menyimpan data user
    public function register_action(Request $request)
    {
        // Validasi data : Digunakan untuk field yang wajib diisi
        $request->validate([
            // Field name harus diisi
            'name' => 'required',

            // Field username harus diisi dan harus unik
            'username' => 'required|unique:users',

            // Field password harus diisi dan harus sama dengan field password_confirm
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        // Menampung data dari form ke dalam variabel
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,

            // Hash::make() digunakan untuk mengenkripsi password
            'password' => Hash::make($request->password),
        ]);

        // Simpan data user ke dalam database
        $user->save();

        // Redirect ke halaman login dan tampilkan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    // Method menuju Halaman Login
    public function login()
    {
        // Kirim data judul halaman
        $data['title'] = 'Login | MyStudents';

        // Redirect ke halaman login
        return view('user/login', $data);
    }

    // Method untuk proses login
    public function login_action(Request $request)
    {
        // Validasi data : Digunakan untuk field yang wajib diisi
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah username dan password cocok dengan data di database
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            // Jika password & username cocok, maka :

            // Generate session token untuk user yang berhasil login
            $request->session()->regenerate();

            // Redirect ke halaman students dan tampilkan pesan sukses dengan nama user yang berhasil login
            return redirect()->route('students.index')->with('success', 'Selamat datang ' . Auth::user()->name);

        }

        // Jika password salah, tampilkan pesan error dan redirect ke halaman login
        return redirect()->route('login')->with('error', 'Username atau password salah!');
    }

    // Method untuk proses logout
    public function logout(Request $request)
    {
        // Hapus session token
        Auth::logout();

        // Buat ulang ID Session dan menghapus semua data dari SEssion
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman home
        return redirect('/');
    }

}