
@extends('layouts.customer')

@section('content')

		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
							
						</div>
						<form action="{{ route('shop') }}" method="GET">
                        <select name="category_id">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                               	</option>
                            @endforeach
                        </select>
                        <button type="submit">Filter</button>
                    </form> 

					</div>
				</div>
			</div>
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            @foreach($products as $index => $item)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <div class="product-item">
                    <img src="{{ asset('images/' . $item->image) }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $item->product_name }}</h3>
                    <strong class="product-price">{{ $item->price }}</strong>
					<form action="" method="POST">
						@csrf
						<button type="submit" class="icon-cross addToCart">
							<img src="{{ asset('asset/images/cross.svg') }}" class="img-fluid">
						</button>
					</form>
					
					
					<a href="{{ route('product.show',$item->id) }}" class="icon-crosss"> 
						<i class="fa-solid fa-magnifying-glass"></i>
					</a>
						<div id="productModal" class="modal fade" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Detail Produk</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body" id="productModalBody">
										<!-- Detail produk akan dimuat di sini -->
									</div>
								</div>
							</div>
						</div>
						
						
						<!-- Tambahkan tombol View dengan link ke halaman detail produk -->
					</div>
				</div>
				@endforeach
							
				
							
				
				
			</div>
		</div>
	</div>
	
 
		


	@endsection
		@section('script')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

		<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('asset/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('asset/js/custom.js') }}"></script>
		{{-- <script>
			$(document).ready(function() {
				// Handle click on Add to Cart link
				$('.addToCart').click(function(e) {
					e.preventDefault();
					var productId = $(this).data('product-id');
		
					// Kirim AJAX request ke backend untuk menambahkan produk ke keranjang belanja
					$.ajax({
						type: "POST", // Atur metode HTTP sesuai dengan backend Anda
						url: "{{ route('addToCartSingle') }}", // Atur URL sesuai dengan rute backend Anda
						data: {
							product_id: productId,
							qty: 1 // Set jumlah produk menjadi 1
							// Anda juga dapat mengirim data tambahan jika diperlukan
						},
						success: function(response) {
							// Tanggapan dari backend (misalnya, sukses atau gagal)
							console.log(response);
							// Redirect pengguna ke halaman keranjang belanja
							window.location.href = "{{ route('cart') }}";
						}
					});
				});
			});
		</script> --}}

		@endsection
