<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Setting;

class PelangganController extends Controller
{
    public function registrasi_pelanggan(){
        return view('pelanggan.registrasiPelanggan');
    }

    public function simpan_pelanggan(Request $request)
    {
        // $request->validate([
        //     'nama_awal' => 'required',
        //     'nama_akhir' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'mobile_number' => 'required',
        //     'alamat' => 'required',
        // ]);

        // Create a new customer record
        Pelanggan::create([
            'nama_awal' => $request->nama_awal,
            'nama_akhir' => $request->nama_akhir,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile_number' => $request->mobile_number,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('login_pelanggan_view')->with('success', 'Pelanggan berhasil terdaftar!');
    }

    

    public function dashboard_pelanggan()
{
    $menuItems = Menu::all(); 
    $categories = Kategori::all();

    // Retrieve the latest settings record
    $settings = Setting::latest()->first();

    // Check if settings are null and create a new Setting instance if not found
    if (!$settings) {
        $settings = new Setting();
    }

    // Pass the settings to the view
    return view('pelanggan.dashboardPelanggan', compact('menuItems', 'categories', 'settings'));
}

    


    
}
