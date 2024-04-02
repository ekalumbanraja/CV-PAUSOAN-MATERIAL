@extends('layouts.admin')
@section('title', 'Product')
@section('content')


<div class="breadcomb-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="breadcomb-wp">
                    <div class="breadcomb-icon">
                      <i class="notika-icon notika-windows"></i>
                    </div>
                    <div class="breadcomb-ctn">
                      <h2>Add Product</h2>
                      <p>Silahkan Tambahkan Product <span class="bread-ntd"></span></p>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tambah_product') }}" enctype="multipart/form-data"  >
            @csrf <!-- Laravel CSRF protection -->
            <div class="form-group">
                <label for="product_name">Name Product</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" required>
            </div>
           
            <div class="form-group">
                <label for="category_name">Category</label>
                <select class="form-control" id="category_name" name="category" required>
                <option value="" selected>Pilih Kategori</option>

                    @foreach($category as $category)
                    <option >{{$category->category_name }} </option>
                   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok barang</label>
                <input type="number" class="form-control" id="stok" name="stok" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control"  name="image" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
            </div>
            
            <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </form>
    </div>
</div>




@endsection

