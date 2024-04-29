@extends('layouts.customer')

@section('content'
)
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Transaction</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="table-wrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Nama Barang</th>
                  <th>Total Harga</th>
                  <th>NO HP </th>
                  <th>Status</th>
                </tr>
              </thead>
				 <tbody>
            @foreach($orders as $item)
                    <tr>
                        <td>{{ $item->recipient_name }}</td>
                        <td>
                        @foreach(json_decode($item->namaproduk) as $productName)
                            {{ $productName }} <br>
                        @endforeach
                        </td>
                        <td>{{ 'Rp ' . number_format($item->total_price, 0, ',', '.') }}</td>
                        <td>{{ $item->phone }}</td>
                        <td><a href="#" class="btn btn-success">{{ $item->status }}</a></td>
                      </tr>         
          @endforeach             
                </tbody>
             </table>
        </div>
    </div>
</div>
<br><br><br><br>
@endsection



