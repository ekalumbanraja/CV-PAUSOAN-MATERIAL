@extends('layouts.admin')
@section('title', 'Product')

@section('content')
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
                            @foreach($product as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 100px;"></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->category_name }}</td> <!-- Menampilkan nama kategori -->
                                <td>{{ $product->price }}</td>
                                <td>
                                       <a class="btn btn-warning notika-btn-warning" href="{{ route('edit_product', ['id' => $product->id]) }}">Edit</a>

                                        <a class="btn btn-danger notika-btn-danger" href="">Delete</button>

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
