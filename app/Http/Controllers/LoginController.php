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
          
            return redirect()->route('dashboard_pelanggan');
        }

      
        return redirect()->back()->with('error', 'Email atau Password Salah');

        // ->with('success', 'Berhasil Membatalkan Transaksi Tersebut');
    }


     public function login_admin_view(){
        return view('admin.loginAdmin');
    }

     public function login_admin(Request $request)
    {
      
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
          
            return redirect()->route('dashboard_admin');
        }

       
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_admin_view');
    }
}
