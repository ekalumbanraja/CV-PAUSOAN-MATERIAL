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
                      <h2>Product Table</h2>
                      <p>Welcome to product <span class="bread-ntd">table</span></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                        <button data-toggle="tooltip" data-placement="left" title="Tambah Product" class="btn" onclick="window.location='{{ route('tampil_product') }}'">
                            <i class="notika-icon notika-sent"></i>
                        </button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Pemasok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Alexandra</td>
                                        <td>Christopher</td>
                                        <td>@makinton</td>
                                        <td>Alexandra</td>
                                        <td>Christopher</td>
                                        <td>@makinton</td>
                                        <td>Ducky</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
