<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\ListPesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function orderConfirmation()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        return view('pelanggan.konfirmasiPesanan', compact('cart', 'total'));
    }

    public function confirmOrder(Request $request)
    {
        $userId = auth()->id();
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $order = Pesanan::create([
            'pelanggan_id' => $userId,
            'total_harga' => $total,
            'status_pesanan' => 'Diproses',
        ]);

        foreach ($cart as $id => $details) {
            ListPesanan::create([
                'pesanan_id' => $order->id,
                'menu_id' => $id,
                'quantity' => $details['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('input_nama_meja', ['order_id' => $order->id])
                         ->with('success', 'Order confirmed!');
    }


    public function input_nama_meja($order_id){
        return view('pelanggan.inputNamaDanMeja', compact('order_id'));
    }

    public function inputan_nama_dan_meja(Request $request, $order_id) {
    
    $pesanan = Pesanan::findOrFail($order_id);
    
    $request->validate([
        'nama' => 'required|string|max:255',
        'meja' => 'required|integer',
    ]);
    
    $pesanan->update([
        'nama' => $request->nama,
        'meja' => $request->meja,
    ]);
    
    return redirect()->route('dashboard_pelanggan')->with('success', 'Berhasil Memesan, Silahkan menunggu pesanan anda');
}


}
