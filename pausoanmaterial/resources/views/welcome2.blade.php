@extends('layouts.customer2')

@section('content')

			<div class="why-choose-section">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-6">
							<h2 class="section-title">Why Choose Us</h2>
							<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
	
							<div class="row my-5">
								<div class="col-6 col-md-6">
									<div class="feature">
										<div class="icon">
											<img src="{{ asset('asset/images/truck.svg')}}" alt="Image" class="imf-fluid">
										</div>
										<h3>Fast &amp; Free Shipping</h3>
										<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
									</div>
								</div>
	
								<div class="col-6 col-md-6">
									<div class="feature">
										<div class="icon">
											<img src="{{ asset('asset/images/bag.svg')}}" alt="Image" class="imf-fluid">
										</div>
										<h3>Easy to Shop</h3>
										<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
									</div>
								</div>
	
								<div class="col-6 col-md-6">
									<div class="feature">
										<div class="icon">
											<img src="{{ asset('asset/images/support.svg')}}" alt="Image" class="imf-fluid">
										</div>
										<h3>24/7 Support</h3>
										<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
									</div>
								</div>
	
								<div class="col-6 col-md-6">
									<div class="feature">
										<div class="icon">
											<img src="{{ asset('asset/images/return.svg')}}" alt="Image" class="imf-fluid">
										</div>
										<h3>Hassle Free Returns</h3>
										<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
									</div>
								</div>
	
							</div>
						</div>
	
						<div class="col-lg-5">
							<div class="img-wrap">
								<img src="{{ asset('asset/images/WhatsApp.jpg') }}" alt="Image" class="img-fluid">
								<img src="{{ asset('asset/images/WhatsApp2.jpg') }}" alt="Image" class="img-fluid">
							</div>
						</div>
	
					</div>
				</div>
			</div>
			<div class="we-help-section">
				<div class="container">
				  <div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
					  <div class="imgs-grid">
						<div class="grid grid-1"><img src="{{ asset('asset/images/images.jpeg') }}" alt="Untree.co" /></div>
						<div class="grid grid-2"><img src="{{ asset('asset/images/images2.jpeg') }}" alt="Untree.co" /></div>
						<div class="grid grid-3"><img src="{{ asset('asset/images/images3.jpeg') }}" alt="Untree.co" /></div>
					  </div>
					</div>
					<div class="col-lg-5 ps-lg-5">
					  <h2 class="section-title mb-4">Kami membantu membangun rumah dengan design interior</h2>
					  <p>
						Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et
						netus et malesuada
					  </p>
		  
					  <ul class="list-unstyled custom-list my-4">
						<li>Donec vitae odio quis nisl dapibus malesuada</li>
						<li>Donec vitae odio quis nisl dapibus malesuada</li>
						<li>Donec vitae odio quis nisl dapibus malesuada</li>
						<li>Donec vitae odio quis nisl dapibus malesuada</li>
					  </ul>
					  <p><a herf="#" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
		</div>
@endsection