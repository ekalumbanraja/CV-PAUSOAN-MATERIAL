<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Import model Review
use App\Models\Order; // Import model Review
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryPembelian;

class ReviewController extends Controller
{
    public function submitReview(Request $request)
{
    // Validasi input
    // dd($request->all());
    $request->validate([
        'review' => 'required|string',
        'product_id' => 'required|integer|exists:products,id', // Pastikan product_id yang disubmit ada di tabel products
    ]);
    try {
        // Mendapatkan ID pengguna yang sedang login
        // $user = Auth::user();
        // $userId = auth()->id();
        // Simpan review ke dalam database                                                                                      
        Review::create([
            'content' => $request->input('review'),
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'), // Gunakan product_id dari permintaan
        ]);
        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Review submitted successfully!');
    } catch (\Exception $e) {
        // Tampilkan pesan kesalahan jika terjadi masalah saat menyimpan review
        return redirect()->back()->with('error', 'Failed to submit review. Please try again later.');
    }
}
public function updateStatus($orderId) {
    // Temukan pesanan berdasarkan ID
    $order = Order::find($orderId);
    if ($order) {
        // Perbarui status menjadi "Paid"
        $order->status = "Paid";
        $order->save();
        return response()->json(['message' => 'Status pesanan berhasil diperbarui'], 200);
    } else {
        return response()->json(['error' => 'Pesanan tidak ditemukan'], 404);
    }
}
public function show($id)
{
    $history = HistoryPembelian::find($id);
    if (!$history) {
        return redirect()->route('home')->with('error', 'History not found');
    }

    return view('Customer.showhistory', compact('history'));
}




}
