<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan import DB facade
use App\Models\Kategori;
use App\Models\Menu;

class TampilanMenuKategoriController extends Controller
{
    public function show($id)
    {
        $kategori = Kategori::find($id); // Gunakan model untuk mendapatkan kategori

        if (!$kategori) {
            return redirect()->route('dashboard_pelanggan')->with('error', 'Kategori tidak ditemukan');
        }

        // Gunakan model untuk mendapatkan item-menu berdasarkan kategori yang dipilih
        $kategoriItems = Menu::where('kategori_id', $id)->get();

        return view('pelanggan.dashboardPelanggan', compact('kategori', 'kategoriItems'));
    }
}
