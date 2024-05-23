@extends('layouts.customer')

@section('content')
<div class="container">
    <h1>Riwayat Pesanan</h1>

    <h2>Pengguna: {{ $user->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
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
                <td>{{ $pesanan->order_id }}</td>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewProductModal{{ $pesanan->order_id }}">
                        View
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="viewProductModal{{ $pesanan->order_id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $pesanan->order_id }}" aria-hidden="true">
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
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="img-fluid">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>{{ json_decode($pesanan->namaproduk)[$index] }}</h5>
                                                    <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                                    <a href="{{ route('product.show', $product->id) }}?from=historypesanan" class="btn btn-primary">Add Review</a>
                                                </div>
                                            </div>
                                            <hr>
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

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
