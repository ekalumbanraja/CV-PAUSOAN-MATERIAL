@extends('layouts.admin2')
@section('title', 'Order')

@section('content')
<br>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
            {{-- <li class="breadcrumb-item active">Tambah Data</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>  
  

  {{-- <h1 class="text-center mb-4"style="font-family: 'Rowdies', cursive;">Order</h1> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-wrap">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            {{-- <th>User ID</th>
                            <th>Product IDs</th> --}}
                            <th>Recipient Name</th>
                            <th>Total Price</th>
                            {{-- <th>Status</th> --}}
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Data Start -->
                        @foreach ($orders as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            {{-- <td>{{ $order->user_id }}</td>
                            <td>{{ $order->id_barang }}</td> --}}
                            <td>{{ $order->recipient_name }}</td>
                            <td>Rp.{{ $order->total_price }}</td>
                            {{-- <td>{{ $order->status }}</td> --}}
                            <td>{{ $order->address }}</td>
                            <td>
                                <form action="{{ route('admin.order.markAsPaid', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary btn-sm">Konfirmasi Pengiriman</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    
                        <!-- Dummy Data End -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination (commented out as not needed for dummy data) -->
            <!-- <div class="d-flex justify-content-center">
                {{-- {{ $orders->links() }} --}}
            </div> -->
        </div>
    </div>
</div>
@endsection
