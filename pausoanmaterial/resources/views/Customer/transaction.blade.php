@extends('layouts.customer')

@section('css')
<style>
    .status{
        background-color: red;
    }
    .btn.success {
  background-color: #28a745;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.btn.success:hover {
  background-color: #218838;
}

/* Style untuk tombol bahaya */
.btn.danger {
  background-color: #dc3545;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.btn.danger:hover {
  background-color: #c82333;
}
</style>
@endsection

@section('content')
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
                  <th>Aksi</th>
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
                        <td><a href="#" class="status">{{ $item->status }}</a></td>
                        <td>
                            <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn danger">Hapus</button>
                            </form>
                            <button class="btn success">Bayar</button>
                        </td>
                      
                      </tr>         
          @endforeach             
                </tbody>
             </table>
        </div>
    </div>
</div>
<br><br><br><br>

@endsection



