<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = product::all();

        return view('admin/product/product',compact('product'));
    }

    public function tampilproduct (){
        $category= category::all();
        return view('admin.product.tampilproduct',compact('category'));
    }

    // Metode untuk menampilkan formulir pembuatan pengguna
    public function tambahproduct(Request $request)
    {
       $product = new Product();
       $product->product_name = $request->product_name;
       $product->category_id = $request->category_id; // Mengambil category_id dari form
       $product->stok = $request->stok;
       $product->description = $request->description;
       $product->price = $request->price;
    
       // Validasi input gambar
       $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
    
       // Simpan gambar
       $image = $request->file('image');
       $imageName = time().'.'.$image->getClientOriginalExtension();  
       $image->move(public_path('images'), $imageName);
    
       // Simpan nama file gambar ke dalam model
       $product->image = $imageName;
    
       $product->save();
    
       return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
    
    
    public function editproduct($id)
    {
        $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('admin.product.editproduct', compact('product'));
    }
    
}
