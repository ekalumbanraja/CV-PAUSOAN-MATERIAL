@extends('layouts.customer2')

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
    History Pesanan
    </h2>
</section>	
<br><br>
<div class="container">
	

    {{-- <h2>Pengguna: {{ $user->name }}</h2> --}}

    <table class="table">
        <thead>
            <tr>
                {{-- <th>ID Pesanan</th> --}}
                <th>Nama Produk</th>
                <th>Total Harga</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historypesanan as $pesanan)
            <tr>
                {{-- <td>{{ $pesanan->order_id }}</td> --}}
                <td>
                    @foreach (json_decode($pesanan->namaproduk) as $namaProduk)
                        {{ $namaProduk }}<br>
                    @endforeach
                </td>
                <td>Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</td>
                <td>{{ $pesanan->address }}</td>
                <td>{{ $pesanan->status }}</td>
                <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewProductModal{{ $pesanan->order_id }}">
                        View
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="viewProductModal{{ $pesanan->order_id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $pesanan->order_id }}" aria-hidden="true">
                    <br><br><br><br>
                        
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewProductModalLabel{{ $pesanan->order_id }}">Detail Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    @foreach (json_decode($pesanan->id_barang) as $index => $idBarang)
                                        @php
                                            $product = \App\Models\Product::find($idBarang);
                                        @endphp
                                       @if ($product)
                                       <div class="card mb-3">
                                           <div class="row g-0">
                                               <div class="col-md-4 d-flex align-items-center">
                                                   <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="img-fluid rounded-start">
                                               </div>
                                               <div class="col-md-8">
                                                   <div class="card-body">
                                                       <h2 class="card-title">{{ json_decode($pesanan->namaproduk)[$index] }}</h2>
                                                       <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                                       <p class="card-text"> {{ $product->description }} </p>
                                                       <br>
                                                       <br>

                                                       <a href="{{ route('product.show', $product->id) }}?from=historypesanan" class="btn btn-dark">Add Review</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   @endif
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
