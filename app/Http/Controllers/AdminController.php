<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Admin;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //INI UNTUK BERANDA
    public function beranda_admin(){
        return view('admin.berandaAdmin');
    }

    //INI UNTUK MENU
    public function menu_admin(){

        $menus = Menu::all();
        $categories = Kategori::all();
        
        return view('admin.menuAdmin', compact('menus', 'categories'));
    }

    public function store_menu(Request $request)
    {
        
        $validated = $request->validate([
            'menu' => 'required',
            'description' => 'required',
            'available' => 'required',
            'category' => 'required|exists:kategori,id',
            'price' => 'required',
            'image' => 'required',
        ]);


        $file = $request->file('image');
        $path = time() . '_' . $request->menu . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Menu::create([
            'nama' => $validated['menu'],
            'deskripsi' => $validated['description'],
            'status_menu' => $request->has('available') ? 'available' : 'unavailable',
            'kategori_id' => $validated['category'],
            'harga' => $validated['price'],
            'image' => $path,
        ]);

       
        return redirect()->route('menu_admin')->with('success', 'Menu berhasil ditambahkan!');
    }
    
    
    //INI UNTUK KATEGORI
    public function kategori_admin(){
        $categories = Kategori::all();

        return view('admin.kategoriAdmin', compact('categories'));
    }

    public function store_kategori(Request $request)
    {
       
        $validated = $request->validate([
            'kategori' => 'required|max:255',
        ]);

       
        Kategori::create([
            'nama' => $validated['kategori'],
        ]);

    
        return redirect()->route('kategori_admin')->with('success', 'Kategori berhasil ditambahkan!');
    }



    //INI UNTUK USERS
    public function mengelola_users_admin(){
        $admins = Admin::all();
        $pelanggans = Pelanggan::all();

        return view('admin.mengelolaAkunAdmin', compact('admins', 'pelanggans'));
    }

    //INI UNTUK DAFTAR PESANAN
   public function show_daftar_pesanan(Request $request)
{
    $status = $request->input('status', 'Diproses'); 
    $pesanan = Pesanan::where('status_pesanan', $status)->get();

    return view('admin.daftarPesanan', [
        'pesanan' => $pesanan,
        'status' => $status
    ]);
}


}
