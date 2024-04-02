<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin/product/product');
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
       $product->category = $request->category;
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
    
       // Simpan nama file gambar ke dalam database
       $product->image = $imageName;
    
       $product->save();
    
       return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
    
    // Metode untuk menyimpan pengguna baru
    public function store(Request $request)
    {
        // Logika untuk menyimpan pengguna baru
    }

    // Metode untuk menampilkan detail pengguna tertentu
    public function show($id)
    {
        // Logika untuk menampilkan detail pengguna tertentu berdasarkan ID
    }

    // Metode untuk menampilkan formulir pengeditan pengguna
    public function edit($id)
    {
        // Logika untuk menampilkan formulir pengeditan pengguna berdasarkan ID
    }

    // Metode untuk menyimpan pengeditan pengguna
    public function update(Request $request, $id)
    {
        // Logika untuk menyimpan pengeditan pengguna berdasarkan ID
    }

    // Metode untuk menghapus pengguna
    public function destroy($id)
    {
        // Logika untuk menghapus pengguna berdasarkan ID
    }
}
