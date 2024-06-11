<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category_id');
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->paginate(6);;
        $categories = Category::all(); // Mendapatkan semua kategori
    
        return view('admin.product.product', compact('products', 'categories'));
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
       $product->sku = 'brg_' . uniqid();
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
        $category= Category::all(); // Pastikan Anda menggunakan 'Category' (dengan huruf besar)
        $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('admin.product.editproduct', compact('product', 'category')); // Mengirimkan kedua variabel
    }
    
    public function updateproduct(Request $request, $id)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'stok' => 'required',
        'price' => 'required',
        'description' => 'required',
    ]);

    // Mengambil produk yang ingin diperbarui berdasarkan ID
    $product = Product::findOrFail($id);

    // Memperbarui atribut-atribut produk dengan data baru
    $product->product_name = $request->product_name;
    $product->category_id = $request->category_id;
    $product->stok = $request->stok;
    $product->price = $request->price;
    $product->description = $request->description;

    // Memproses gambar jika ada yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Simpan gambar baru
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    
        // Simpan nama file gambar ke dalam model
        $product->image = $imageName;
    }
    // Simpan perubahan ke dalam database
    $product->save();

    // Redirect kembali ke halaman daftar produk dengan pesan sukses
    return redirect()->route('admin.Product')->with('success', 'Produk berhasil diperbarui.');
}

    
public function deleteproduct($id)
{
    // Temukan produk yang ingin dihapus berdasarkan ID
    $product = Product::findOrFail($id);

    // Hapus gambar produk jika ada
    if ($product->image) {
        $imagePath = public_path('images/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Hapus produk dari database
    $product->delete();

    // Redirect kembali ke halaman daftar produk dengan pesan sukses
    return redirect()->route('admin.Product')->with('success', 'Produk berhasil dihapus.');
}
    

}
