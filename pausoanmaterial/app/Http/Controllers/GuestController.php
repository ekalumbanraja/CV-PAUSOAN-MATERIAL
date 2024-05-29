<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Galeri;
class GuestController extends Controller
{
    public function shop(Request $request)
    {$category_id = $request->input('category_id');
        $query = Product::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('product_name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->search . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }
    
        $products = $query->get();
        // $products = $query->paginate();
        $categories = Category::all();
        return view('Customer/product',compact('products', 'categories'));
    }
    public function view($id)
    {
    $product = Product::findOrFail($id);
    $recentReviews = $product->reviews()->orderBy('created_at', 'desc')->take(5)->get(); // Ambil 5 ulasan terbaru
    return view('customer.show', compact('product','recentReviews'));
    }
    public function checkout(Request $request)
    {
        // Lakukan validasi data pembelian
        $request->validate([
            'inventory_id' => 'required|exists:products,id',
        ]);

        // Lakukan logika pembelian di sini, misalnya mengurangi stok, menyimpan data pembelian ke database, dll.

        // Redirect kembali ke halaman sebelumnya atau halaman sukses pembelian
        return redirect()->back()->with('success', 'Pembelian berhasil dilakukan!');
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function index(){
        return view('Customer/home2');
    }

    public function galeri(){
        $galeris = Galeri::all();

        return view('Customer.services',compact('galeris'));
    }
}
