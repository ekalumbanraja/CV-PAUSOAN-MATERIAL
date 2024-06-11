@extends('layouts.admin2')
@section('title', 'Product')

@section('content')

<div class="breadcomb-area">
    <div class="container">
        <div class="row">
          <div class="col-lg-7 mb-4">
            <div class="d-none d-lg-block">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Category</li>
                    <li class="breadcrumb-item active">Edit Galery</li>
                </ol>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow p-3 mb-3 bg-body rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('update_product', ['id' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf <!-- Laravel CSRF protection -->
                        <div class="mb-2">
                            <label for="product_name" class="form-label">Name Product</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" value="{{ $product->product_name }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="" selected>Pilih Kategori</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="stok" class="form-label">Stok barang</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="" value="{{ $product->stok }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control"  name="image" placeholder="" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4" cols="50">{{ $product->description }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
