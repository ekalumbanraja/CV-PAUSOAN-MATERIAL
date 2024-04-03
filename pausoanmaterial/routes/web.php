<?php
 
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;


 
Auth::routes();

Route::get('/', function () {
    return view('welcome2');
});

   
/* NORMAL USER */

Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
/* ADMIN */

//CATEGORY 

Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/category', [AdminController::class, 'index'])->name('category');
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/category/tampilcategory', [AdminController::class, 'tampilcategory'])->name('tampil_category');
}); 
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::post('admin/category/tambahcategory', [AdminController::class, 'tambahcategory'])->name('tambah_category');
}); 
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/deletecategory/{id}', [AdminController::class, 'deletecategory'])->name('deletecategory');
}); 


//PRODUK 

Route::middleware(['auth','user-access:admin'])->group(function () {
   
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.Product');
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/product/tampilproduct', [ProductController::class, 'tampilproduct'])->name('tampil_product');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::post('admin/product/tambahproduct', [ProductController::class, 'tambahproduct'])->name('tambah_product');
}); 

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/product/editproduct/{id}', [ProductController::class, 'editproduct'])->name('edit_product');
}); 

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::post('admin/product/updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('update_product');
}); 

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/product/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('delete_product');
}); 





Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});



/* MANAGER */

Route::middleware(['auth', 'user-access:manager'])->group(function () {
   Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


// // Routes untuk Produk
// // Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// // Routes untuk Kategori
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
