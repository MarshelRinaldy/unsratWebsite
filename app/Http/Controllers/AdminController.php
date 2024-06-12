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

    public function update_menu(Request $request, $id)
    {
        $validated = $request->validate([
            'menu' => 'required',
            'description' => 'required',
            'available' => 'required',
            'category' => 'required|exists:kategori,id',
            'price' => 'required',
            'image' => 'nullable', // Image is optional for update
        ]);

        $menu = Menu::findOrFail($id);

        // Handle image update if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = time() . '_' . $request->menu . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/' . $path, file_get_contents($file));
            $menu->image = $path;
        }

        $menu->nama = $validated['menu'];
        $menu->deskripsi = $validated['description'];
        $menu->status_menu = $request->has('available') ? 'available' : 'unavailable';
        $menu->kategori_id = $validated['category'];
        $menu->harga = $validated['price'];
        $menu->save();

        return redirect()->route('menu_admin')->with('success', 'Menu berhasil diperbarui!');
    }

    public function delete_menu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu_admin')->with('success', 'Menu berhasil dihapus!');
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

    public function update_kategori(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $validated = $request->validate([
            'kategori' => 'required|max:255',
        ]);

        $kategori->nama = $validated['kategori'];
        $kategori->save();

        return redirect()->route('kategori_admin')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function delete_kategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_admin')->with('success', 'Kategori berhasil dihapus!');
    }



    //INI UNTUK USERS
    public function mengelola_users_admin(){
        $admins = Admin::all();
        $pelanggans = Pelanggan::all();

        return view('admin.mengelolaAkunAdmin', compact('admins', 'pelanggans'));
    }

    public function editPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.editPelanggan', compact('pelanggan'));
    }

    public function updatePelanggan(Request $request, $id)
    {
        $request->validate([
            'nama_awal' => 'required|string|max:255',
            'nama_akhir' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan,email,' . $id,
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama_awal = $request->input('nama_awal');
        $pelanggan->nama_akhir = $request->input('nama_akhir');
        $pelanggan->email = $request->input('email');
        $pelanggan->save();

        return redirect()->route('admin.mengelolaAkunAdmin')->with('success', 'Pelanggan updated successfully');
    }

    public function deletePelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('admin.mengelolaAkunAdmin')->with('success', 'Pelanggan deleted successfully');
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin,username,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->nama = $request->input('nama');
        $admin->username = $request->input('username');
        $admin->save();

        return redirect()->route('admin.mengelolaAkunAdmin')->with('success', 'Admin updated successfully');
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.mengelolaAkunAdmin')->with('success', 'Admin deleted successfully');
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
