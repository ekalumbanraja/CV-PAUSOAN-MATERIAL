@extends('layouts.customer2')

@section('css')
<style>
	
/* services section start */

.services_section {
    width: 100%;
    float: left;
}

.services_taital {
    width: 100%;
    float: left;
    font-size: 40px;
    color: #1b1b1b;
    font-weight: bold;
    text-align: center;
}

.services_text_1 {
    width: 100%;
    font-size: 16px;
    margin: 0 auto;
    color: #1f1f1f;
    padding-top: 20px;
    text-align: center;
}

.services_text {
    width: 100%;
    font-size: 14px;
    margin: 0px;
    color: #1b1b1b;
    padding-top: 20px;
}

.services_section_2 {
    width: 90%;
    margin: 0 auto;
    padding-top: 30px;
}

.box_main {
    width: 100%;
    background-color: #ffffff;
    height: auto;
    padding: 40px 20px 40px 20px;
    border-radius: 20px;
    margin-top: 30px;
}

.box_main:hover {
    background-color: #ffffff;
    box-shadow: 0px 0px 20px 0px;
}

.box_main.active {
    background-color: #ffffff;
    box-shadow: 0px 0px 20px 0px;
}

.service_img {
    width: 30%;
    min-height: 71px;
}

.development_text {
    width: 100%;
    font-size: 24px;
    color: #1b1b1b;
    font-weight: bold;
    padding: 20px 0px 0px 0px;
    text-transform: uppercase;
    min-height: 80px;
}

.service_img img {
    min-height: 80px;
}

.readmore_bt {
    width: 140px;
    padding-top: 30px;
}

.readmore_bt a {
    width: 100%;
    text-align: center;
    font-size: 16px;
    color: #fda51a;
    padding: 15px 20px;
    margin-top: 10px;
    font-weight: bold;
}

.readmore_bt a:hover {
    color: #252525;
}
/* :: 15.0 Blog Area CSS */
.blog-wrapper {
  position: relative;
  z-index: 1; }
  .blog-wrapper .single-blog-area {
    position: relative;
    z-index: 1;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.15);
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    overflow: hidden; }
    .blog-wrapper .single-blog-area img {
      width: 100%;
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms; }
    .blog-wrapper .single-blog-area .post-title {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      background-color: #ffffff;
      padding: 20px 40px;
      position: absolute;
      bottom: 0;
      left: 0;
      width: 85%;
      height: auto;
      z-index: 10; }
      @media only screen and (max-width: 767px) {
        .blog-wrapper .single-blog-area .post-title {
          padding: 20px; } }
      .blog-wrapper .single-blog-area .post-title a {
        display: block;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.5; }
        @media only screen and (max-width: 767px) {
          .blog-wrapper .single-blog-area .post-title a {
            font-size: 14px; } }
        @media only screen and (min-width: 576px) and (max-width: 767px) {
          .blog-wrapper .single-blog-area .post-title a {
            font-size: 18px; } }
    .blog-wrapper .single-blog-area .hover-content {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      background-color: #ffffff;
      background-color: #ffffff;
      padding: 20px 40px;
      position: absolute;
      width: 85%;
      height: 100%;
      z-index: 100;
      top: 0;
      left: 0;
      opacity: 0;
      visibility: hidden; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .blog-wrapper .single-blog-area .hover-content {
          padding: 20px; } }
      @media only screen and (max-width: 767px) {
        .blog-wrapper .single-blog-area .hover-content {
          padding: 20px; } }
      .blog-wrapper .single-blog-area .hover-content .hover-post-title a {
        display: block;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 20px; }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
          .blog-wrapper .single-blog-area .hover-content .hover-post-title a {
            font-size: 16px;
            margin-bottom: 10px; } }
        @media only screen and (max-width: 767px) {
          .blog-wrapper .single-blog-area .hover-content .hover-post-title a {
            font-size: 14px;
            margin-bottom: 10px; } }
        @media only screen and (min-width: 576px) and (max-width: 767px) {
          .blog-wrapper .single-blog-area .hover-content .hover-post-title a {
            font-size: 18px;
            margin-bottom: 20px; } }
        .blog-wrapper .single-blog-area .hover-content .hover-post-title a:hover {
          color: #000000; }
      @media only screen and (max-width: 767px) {
        .blog-wrapper .single-blog-area .hover-content p {
          display: none; } }
      @media only screen and (min-width: 480px) and (max-width: 767px) {
        .blog-wrapper .single-blog-area .hover-content p {
          display: block;
          font-size: 14px;
          line-height: 1.7; } }
      .blog-wrapper .single-blog-area .hover-content > a {
        display: block;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 0;
        color: #000000;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-top: 50px; }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
          .blog-wrapper .single-blog-area .hover-content > a {
            margin-top: 15px; } }
        @media only screen and (max-width: 767px) {
          .blog-wrapper .single-blog-area .hover-content > a {
            margin-top: 30px; } }
    .blog-wrapper .single-blog-area:hover .hover-content, .blog-wrapper .single-blog-area:focus .hover-content {
      opacity: 1;
      visibility: visible; }
    .blog-wrapper .single-blog-area:hover img, .blog-wrapper .single-blog-area:focus img {
      -webkit-transform: scale(1.1);
      transform: scale(1.1); }


/* services section end */


</style>
@endsection

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Gallery
    </h2>
</section>
<br><br><br><br>
<div class="blog-wrapper section-padding-80">
    <div class="container">
        <div class="row">
            <!-- Single Blog Area -->
            @foreach ($galeris as $galeri)
            <div class="col-12 col-lg-6">
                <div class="single-blog-area mb-50">
                    <a href="{{ asset('storage/' . $galeri->gambar) }}" data-lightbox="gallery" data-title="{{ $galeri->judul }}">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" height="400px">
                    </a>
                    <!-- Post Title -->
                    {{-- <div class="post-title"> --}}
                        {{-- <a href="#" style="color: #000000">{{ $galeri->judul }}</a> --}}
                    {{-- </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection