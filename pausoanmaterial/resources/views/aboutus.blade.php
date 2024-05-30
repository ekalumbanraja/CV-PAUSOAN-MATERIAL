@extends("layouts.customer2")
@section('title','About Us | PAUSOAN MATERIAL')

@section('css')
<style>
	
/*--------------------------------------------------------------
# Contact Section
--------------------------------------------------------------*/
.contact .info-item {
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    padding: 20px 0 30px 0;
}

.contact .info-item i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    font-size: 24px;
    line-height: 0;
    color: var(--color-primary);
    border-radius: 50%;
    border: 2px dotted #ffd565;
}

.contact .info-item h3 {
    font-size: 20px;
    color: #6c757d;
    font-weight: 700;
    margin: 10px 0;
}

.contact .info-item p {
    padding: 0;
    line-height: 24px;
    font-size: 14px;
    margin-bottom: 0;
}

.contact .php-email-form {
    width: 100%;
    background: #fff;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    padding: 30px;
}

.contact .php-email-form .form-group {
    padding-bottom: 20px;
}

.contact .php-email-form .error-message {
    display: none;
    color: #fff;
    background: #df1529;
    text-align: left;
    padding: 15px;
    font-weight: 600;
}

.contact .php-email-form .error-message br + br {
    margin-top: 25px;
}

.contact .php-email-form .sent-message {
    display: none;
    color: #fff;
    background: #059652;
    text-align: center;
    padding: 15px;
    font-weight: 600;
}

.contact .php-email-form .loading {
    display: none;
    background: #fff;
    text-align: center;
    padding: 15px;
}

.contact .php-email-form .loading:before {
    content: "";
    display: inline-block;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    margin: 0 10px -6px 0;
    border: 3px solid #059652;
    border-top-color: #fff;
    -webkit-animation: animate-loading 1s linear infinite;
    animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input,
.contact .php-email-form textarea {
    border-radius: 0;
    box-shadow: none;
    font-size: 14px;
}

.contact .php-email-form input:focus,
.contact .php-email-form textarea:focus {
    border-color: var(--color-primary);
}

.contact .php-email-form input {
    height: 44px;
}

.contact .php-email-form textarea {
    padding: 10px 12px;
}

.contact .php-email-form button[type="submit"] {
    background: var(--color-primary);
    border: 0;
    padding: 10px 35px;
    color: #fff;
    transition: 0.4s;
    border-radius: 5px;
}

.contact .php-email-form button[type="submit"]:hover {
    background: rgba(254, 185, 0, 0.8);
}

@keyframes animate-loading {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}


</style>
@endsection
@section('content')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
		About Us
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				{{-- <div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Visi Kami
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Di CV PAUSOAN MATERIAL, visi kami adalah menjadi pemimpin pasar dalam industri bahan bangunan yang dikenal tidak hanya karena kualitas produk yang kami tawarkan tetapi juga karena inovasi, keberlanjutan, dan pelayanan pelanggan yang luar biasa. Kami berkomitmen untuk mendukung pembangunan yang berkelanjutan dan berkontribusi pada kemajuan komunitas di mana kami beroperasi. Kami percaya bahwa dengan memberikan produk dan layanan terbaik, kami dapat membantu mewujudkan proyek-proyek impian Anda menjadi kenyataan.

							Kami bercita-cita untuk:

							Menjadi pilihan utama bagi konsumen yang membutuhkan bahan bangunan berkualitas tinggi.
							Membawa inovasi terkini dalam industri konstruksi ke pasar lokal dan nasional.
							Memimpin dengan contoh dalam praktik bisnis yang etis dan bertanggung jawab terhadap lingkungan.
						</p>

						{{-- <p class="stext-113 cl6 p-b-26">
							Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. 
						</p> 

						<p class="stext-113 cl6 p-b-26">
							ada pertanyaan? hubungi 082299700207
						</p>
					</div>
				</div> --}}

				{{-- <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ asset('images/empat.png') }}" alt="IMG">
						</div>
					</div>
				</div> --}}
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Sambutan dari pemilik
						</h3>
{{-- 
						<p class="stext-113 cl6 p-b-26">
							Misi kami adalah menyediakan produk bahan bangunan berkualitas tinggi yang memenuhi standar industri, serta memberikan pelayanan pelanggan yang ramah dan profesional. Kami berkomitmen untuk selalu berinovasi dengan mengikuti perkembangan teknologi dan tren terbaru dalam industri konstruksi, memastikan bahwa kami menawarkan solusi yang efisien dan efektif. Selain itu, kami mendukung praktik pembangunan berkelanjutan dengan menyediakan produk-produk yang ramah lingkungan dan mengadopsi inisiatif hijau dalam operasional kami. Kami berusaha membangun hubungan jangka panjang yang didasarkan pada kepercayaan dan kepuasan pelanggan, serta berkontribusi positif terhadap komunitas lokal melalui berbagai program dan inisiatif.
						</p> --}}

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Halo,

Saya Pausoan Hutagaol , pemilik CV PAUSOAN MATERIAL. Terima kasih telah meluangkan waktu untuk mengunjungi situs kami. Di  CV PAUSOAN MATERIAL, kami memahami betapa pentingnya kualitas bahan bangunan dalam setiap proyek konstruksi Anda, baik besar maupun kecil. Itulah sebabnya kami berkomitmen untuk menyediakan hanya produk terbaik dengan pelayanan yang luar biasa.

Kami mengundang Anda untuk menjelajahi berbagai produk yang kami tawarkan dan merasakan sendiri dedikasi kami terhadap kualitas dan kepuasan pelanggan. Tim kami yang berpengalaman siap membantu Anda dengan segala kebutuhan konstruksi dan renovasi, memberikan saran ahli, dan memastikan Anda mendapatkan solusi yang tepat.

Mari kita bekerja sama untuk mewujudkan proyek impian Anda. Kunjungi toko kami di Jln. By pass, tambunan, Kec. Balige, Toba, Sumatera Utara atau hubungi kami melalui 082299700207 untuk konsultasi lebih lanjut. Kami sangat menantikan kesempatan untuk melayani Anda.

Salam hangat,
{{-- 
Pausoan Si --}}

							<span class="stext-111 cl8">
								- Pausoan Hutagaol
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{ asset('images/pemilik.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>	
	<div id="contact">
		<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>
	  
				<!-- ======= Contact Section ======= -->
				<section id="contact" class="contact">
				  <div class="container" data-aos="fade-up" data-aos-delay="100">
			
					<div class="section-heading">
					  {{-- <h2>Contact & Alamat <em>Gereja</em></h2> --}}
					  {{-- <p>Berikut adalah yang dapat diihat oleh semua jemaat</p> --}}
					</div>
			
					<div class="row gy-4">
					  <div class="col-lg-6">
						<div class="info-item  d-flex flex-column justify-content-center align-items-center">
						  <i class="bi bi-map"></i>
						  <h3>Alamat </h3>
						  
						  <p>Jln. By pass, tambunan, Kec. Balige, Toba, Sumatera Utara 22312</p>
						</div>
					  </div><!-- End Info Item -->
			
					  <div class="col-lg-3 col-md-6">
						<div class="info-item d-flex flex-column justify-content-center align-items-center">
						  <i class="bi bi-envelope"></i>
						  <h3>Email</h3>
						  <p>@pausoanmaterial</p>
						</div>
					  </div><!-- End Info Item -->
			
					  <div class="col-lg-3 col-md-6">
						<div class="info-item  d-flex flex-column justify-content-center align-items-center">
						  <i class="bi bi-telephone"></i>
						  <h3>No-telpon</h3>
						  <a href="https://api.whatsapp.com/send?phone=6281396293306" class="nav-link">+62 813-9629-3306</a>
	  
						</div>
					  </div><!-- End Info Item -->
			
					</div>
					<br><br>
	  
					  {{-- <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1515&amp;height=462&amp;hl=en&amp;q=gpdiporsea&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://capcuttemplate.org/">Capcut Template</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:462px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:462px;}.gmap_iframe {height:462px!important;}</style></div> --}}
				
                <div style="overflow:hidden;resize:none;max-width:100%;width:1500px;height:700px;"><div id="gmap-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=cv+pausoan+material&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="google-map-html" href="https://www.bootstrapskins.com/themes" id="grab-map-authorization">premium bootstrap themes</a><style>#gmap-canvas img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>

				  </section><!-- End Contact Section -->
		</div>
		
@endsection