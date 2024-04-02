<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('asset/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
		<title>PausoanMaterial</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Pausoan<span>Material</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li><a class="nav-link" href="shop.html">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="services.html">Services</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
                    
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						{{-- <li><a ></a></li> --}}
						{{-- <li><a class="nav-link" href="cart.html"><img src="{{ asset('asset/images/cart.svg') }}"></a></li> --}}
                        @if (Route::has('login'))
							
								@auth
									<a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
								@else
						        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>             
									@if (Route::has('register'))
						        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>             
                            	@endif
								@endauth
						
						@endif

					</ul>
                </ul>

				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Temukan Solusi <span clsas="d-block">Bangunan Anda di Sini!</span></h1>
								<p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, perferendis corrupti omnis dolores repudiandae labore dolore dolorum ex totam distinctio quisquam cum porro, incidunt quis corporis in dolor! Quidem, ipsa.</p>
								<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('asset/images/truk.png') }}" style="height:700px ;weight:650px;padding-bottom:30px" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
		<!-- End We Help Section -->
		</footer>
		<!-- End Footer Section -->	


		<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('asset/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('asset/js/custom.js') }}"></script>
	</body>

</html>
