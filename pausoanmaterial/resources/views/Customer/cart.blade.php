@extends('layouts.customer')

@section('content')
  
      @if ($cartItems->isEmpty())
    <div class="container px-3 my-5 clearfix">
      <p>Keranjang belanja Anda kosong.</p>
    </div>
  @else
  
  <div class="card">
    <div class="card-header">
  
      <h2>Shopping Cart</h2>
      </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered m-0">
      <thead>
      <tr>
      <th class="text-right py-3 px-4" style="width: 100px;">Product name</th>
      <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
      <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
      <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
      <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
      </tr>
      </thead>
      <tbody>
        @foreach ($cartItems as $item)
    <tr>
        <td class="text-right font-weight-semibold align-middle p-4">{{ $item->product->product_name }}</td>
        <td class="text-right font-weight-semibold align-middle p-4">{{ $item->productPrice }}</td>
        <td class="align-middle p-4">
            <input type="number" class="form-control text-center" value="{{ $item->stok }}" min="1" max="{{ $item->product->stok }}">
        </td>
          
        <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
        <td class="text-center align-middle px-0">
          <form action="{{ route('cart.delete', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="shop-tooltip close float-none text-danger" title="Remove">×</button>
          </form>
      </td>
       
      </tr>
@endforeach



      </tbody>
      </table>
      </div>
      
      <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
      <div class="mt-4">
      
      </div>
      <div class="d-flex">
      {{-- <div class="text-right mt-4 mr-5">
      <label class="text-muted font-weight-normal m-0">Discount</label>
      <div class="text-large"><strong>$20</strong></div>
      </div> --}}
      <div class="text-right mt-4">
      <label class="text-muted font-weight-normal m-0">Total price</label>
      <div class="text-large"><strong>Rp {{ $totalPriceIDR }}</strong></div>
      </div>
      </div>
      </div>
      <div class="text-right mt-4">
      <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
      <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
      
    </div>
  </div>
</div>
  @endif
@endsection
@section("script")
<!-- Tambahkan skrip JavaScript di bagian bawah halaman -->
<script>
  // Fungsi untuk menghitung ulang total harga dan memperbarui tampilan
  function recalculateTotalPrice() {
      var totalPrice = 0;
      // Iterasi setiap baris dalam tabel keranjang belanja
      $('.table tbody tr').each(function() {
          var quantity = parseInt($(this).find('.quantity-input').val());
          var pricePerItem = parseFloat($(this).find('.font-weight-semibold').eq(1).text().replace('Rp.', '').replace('.', '').replace(',', '.'));
          var subtotal = quantity * pricePerItem;
          // Update tampilan subtotal untuk setiap baris
          $(this).find('.subtotal').text('Rp.' + subtotal.toLocaleString('id-ID'));
          // Tambahkan subtotal ke total harga keseluruhan
          totalPrice += subtotal;
      });
      // Perbarui tampilan total harga
      $('#totalPrice').text('Rp.' + totalPrice.toLocaleString('id-ID'));
  }

  // Event listener untuk mengawasi perubahan pada input kuantitas produk
  $('.quantity-input').on('change', function() {
      var quantity = parseInt($(this).val());
      var maxStock = parseInt($(this).attr('max'));
      // Pastikan jumlah tidak melebihi stok
      if (quantity > maxStock) {
          $(this).val(maxStock);
          quantity = maxStock;
      }
      recalculateTotalPrice(); // Hitung ulang total harga saat kuantitas berubah
  });

  // Event listener untuk tombol "Kurangi"
  $('.decrease').on('click', function() {
      var input = $(this).siblings('.quantity-input');
      var currentValue = parseInt(input.val());
      if (currentValue > 1) {
          input.val(currentValue - 1);
          recalculateTotalPrice(); // Hitung ulang total harga saat jumlah dikurangi
      }
  });

  // Event listener untuk tombol "Tambah"
  $('.increase').on('click', function() {
      var input = $(this).siblings('.quantity-input');
      var currentValue = parseInt(input.val());
      var max = parseInt(input.attr('max'));
      if (currentValue < max) {
          input.val(currentValue + 1);
          recalculateTotalPrice(); // Hitung ulang total harga saat jumlah ditambah
      }
  });

  // Hitung total harga saat halaman dimuat
  recalculateTotalPrice();
</script>
@endsection
  