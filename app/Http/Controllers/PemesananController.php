<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\ListPesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Setting;

class PemesananController extends Controller
{
    public function orderConfirmation()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $settings = Setting::first();
        if (!$settings) {
            // Handle the case where no settings are found, possibly return an empty view or create default settings.
            return view('admin.setting')->with('settings', new Setting());
        }
    
        return view('pelanggan.konfirmasiPesanan', compact('cart', 'total', 'settings'));
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
        $settings = Setting::first();
        if (!$settings) {
            // Handle the case where no settings are found, possibly return an empty view or create default settings.
            return view('admin.setting')->with('settings', new Setting());
        }
        return view('pelanggan.inputNamaDanMeja', compact('order_id', 'settings'));
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

    public function showOrder($orderId)
    {
        $order = Pesanan::with('listPesanan.menu')->findOrFail($orderId);
        return response()->json($order);
    }

    public function confirmOrders($orderId)
    {
        $order = Pesanan::findOrFail($orderId);
        $order->status_pesanan = 'Confirmed';
        $order->save();

        return response()->json(['success' => true, 'message' => 'Order confirmed successfully.']);
    }

    public function generatePdf($orderId)
    {
        $order = Pesanan::with('listPesanan.menu')->findOrFail($orderId);
        $pdf = PDF::loadView('pdf.invoice', compact('order'));
        return $pdf->download('invoice.pdf');
    }



}
