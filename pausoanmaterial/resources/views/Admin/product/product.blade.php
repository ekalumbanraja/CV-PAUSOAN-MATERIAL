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
                      <h2>Product</h2>
                      <p>Welcome to Product <span class="bread-ntd">table</span></p>
                    </div>
                    
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                    <div class="breadcomb-report">
                        <button data-toggle="tooltip" data-placement="left" title="Tambah Produk" class="btn" onclick="window.location='{{ route('tampil_product') }}'">
                            <i class="notika-icon notika-sent"></i>
                        </button>
                    </div>
                </div>
                <div class="normal-table-area">
                    <form action="{{ route('admin.Product') }}" method="GET">
                        <select name="category_id">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Filter</button>
                    </form> 

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list">
                <div class="basic-tb-hd">
                    <!-- <h2>Basic Table</h2>
                    <p>Basic example without any additional modification classes</p> -->
                </div>
                <div class="bsc-tbl">
                    <table class="table table-sc-ex">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td><img src="{{ asset('images/' . $item->image) }}" alt="Product Image" style="max-width: 100px;"></td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>
                                       <a class="btn btn-warning notika-btn-warning" href="{{ route('edit_product', ['id' => $item->id]) }}">Edit</a>
                                       <a class="btn btn-danger notika-btn-danger" href="{{ route('delete_product', ['id' => $item->id]) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
