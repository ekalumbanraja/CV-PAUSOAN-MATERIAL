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
							<option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
					<a href="{{ route('product.show',$item->id) }}" > 
						
                    <img src="{{ asset('images/' . $item->image) }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $item->product_name }}</h3>
					<strong class="product-price">Rp.{{ number_format($item->price, 0, ',', '.') }}</strong>

					{{-- <form action="" method="POST">
						@csrf
						<button type="submit" class="icon-cross addToCart">
							<img src="{{ asset('asset/images/cross.svg') }}" class="img-fluid">
						</button>
					</form> --}}
					
					
					{{-- <a href="{{ route('product.show',$item->id) }}" class="icon-crosss"> 
						<i class="fa-solid fa-magnifying-glass"></i>
					</a> --}}
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
									</div>
									
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
				@endforeach				
			</div>
		</div>
	</div>
	
 
		


	@endsection
			