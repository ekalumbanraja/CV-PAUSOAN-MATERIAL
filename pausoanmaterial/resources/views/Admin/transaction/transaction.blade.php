@extends('layouts.admin')
@section('title', 'Transaction')

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
                                <h2>Transacation</h2>
                                <p>Welcome to Transacation <span class="bread-ntd">table</span></p>
                              </div>
                              
                            </div>
                          </div>
                          {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Tambah Produk" class="btn" onclick="window.location='{{ route('tampil_product') }}'">
                                    <i class="notika-icon notika-sent"></i>
                                </button>
                            </div>
                        </div> --}}

                        <div class="normal-table-area">
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
                                                            <th>ID</th>
                                                            <th>User ID</th>
                                                            <th>Product IDs</th>
                                                            <th>Recipient Name</th>
                                                            <th>Total Price</th>
                                                            <th>Status</th>
                                                            <th>Alamat</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($transactions as $transaction)
                                                        <tr>
                                                            <td>{{ $transaction->id }}</td>
                                                            <td>{{ $transaction->user_id }}</td>
                                                            <td>{{ $transaction->id_barang }}</td>
                                                            <td>{{ $transaction->recipient_name }}</td>
                                                            <td>{{ $transaction->total_price }}</td>
                                                            <td>{{ $transaction->status }}</td>
                                                            <td>{{ $transaction->address }}</td>
                                                            <td>
                                                                @if ($transaction->status === 'unpaid')
                                                                    <form action="{{ route('admin.transaction.markAsPaid', $transaction->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit">Mark as Paid</button>
                                                                    </form>
                                                                    @else
                                                                    <button type="submit">Atur Pengiriman</button>

                                                                @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection