<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   


    public function login(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // Mencoba login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard pelanggan jika berhasil login
            return redirect()->route('dashboard_pelanggan');
        }

        // Kembali ke halaman login dengan pesan error jika login gagal
        return redirect()->back()->with('error', 'Email atau Password Salah');

        // ->with('success', 'Berhasil Membatalkan Transaksi Tersebut');
    }


     public function login_admin_view(){
        return view('admin.loginAdmin');
    }
}
