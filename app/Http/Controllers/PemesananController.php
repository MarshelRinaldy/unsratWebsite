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

        return view('pelanggan.dashboardPelanggan', compact('cart', 'total'));
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
            'meja' => $request->meja,
            'status_pesanan' => 'pending',
        ]);

      
        foreach ($cart as $id => $details) {
            ListPesanan::create([
                'pesanan_id' => $order->id,
                'menu_id' => $id,
                'quantity' => $details['quantity'],
            ]);
        }
        
        session()->forget('cart');
        return redirect()->route('dashboard_pelanggan')->with('success', 'Order confirmed!');
    }
}
