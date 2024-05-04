<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Import model Review
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function submitReview(Request $request)
{
    // Validasi input
    // dd($request->all());
    $request->validate([
        'review' => 'required|string',
        'product_id' => 'required|integer', // Pastikan product_id disertakan dalam validasi
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

}
