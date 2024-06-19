<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\Kategori;
class CartController extends Controller
{   

    public function addToCart(Request $request, $id)
    {
        $menu = Menu::find($id);
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $menu->nama,
                "quantity" => $quantity,
                "price" => $menu->harga,
                "image" => $menu->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Berhasil Menambahkan ke Keranjang!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed successfully');
        }
        return redirect()->back();
    }

    public function keranjang_view()
    {
        $settings = Setting::first();
        if (!$settings) {
            
            return view('admin.setting')->with('settings', new Setting());
        }

        $categories = Kategori::all();
        return view('pelanggan.keranjang', compact('settings', 'categories'));
    }

    
}
