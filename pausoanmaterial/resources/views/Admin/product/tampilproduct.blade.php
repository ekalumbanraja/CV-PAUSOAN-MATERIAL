@extends('layouts.admin2')
@section('title', 'Product')
@section('content')


<div class="col-sm-7">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Product</li>
    <li class="breadcrumb-item active">Add Product</li>
    {{-- <li class="breadcrumb-item active">Tambah Data</li> --}}
  </ol>
</div><!-- /.col -->
<div class="card">
  <div class="card-body">
      <div class="col-lg-8 mb-4 mx-auto">
          <form method="POST" action="{{ route('tambah_product') }}" enctype="multipart/form-data">
              @csrf <!-- Laravel CSRF protection -->
              <table class="table table-borderless">
                  <tr>
                      <td><label for="product_name">Name Product</label></td>
                      <td><input type="text" class="form-control" id="product_name" name="product_name" placeholder="" required></td>
                  </tr>
                  <tr>
                      <td><label for="category_name">Category</label></td>
                      <td>
                          <select class="form-control" id="category_id" name="category_id" required>
                              <option value="" selected>Pilih Kategori</option>
                              @foreach($category as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="stok">Stok barang</label></td>
                      <td><input type="number" class="form-control" id="stok" name="stok" placeholder="" required></td>
                  </tr>
                  <tr>
                      <td><label for="price">Price</label></td>
                      <td><input type="number" class="form-control" id="price" name="price" placeholder="" required></td>
                  </tr>
                  <tr>
                      <td><label for="image">Image</label></td>
                      <td><input type="file" class="form-control" name="image" placeholder="" required></td>
                  </tr>
                  <tr>
                      <td><label for="description">Description</label></td>
                      <td><textarea id="description" name="description" rows="4" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                      <td colspan="2" class="text-end">
                          <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                      </td>
                  </tr>
              </table>
          </form>
      </div>
  </div>
</div>




@endsection

