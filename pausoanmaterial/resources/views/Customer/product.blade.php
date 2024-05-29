@extends('layouts.customer2')

@section('css')
<style>
.block2-img {
    width: 100%;
    height: 100%; /* Atur tinggi gambar sesuai kebutuhan Anda */
    object-fit: cover; /* Atur agar gambar memenuhi container tanpa mengubah aspek rasionya */
}
.stext-106 {
    font-size: 14px;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 2px;
    line-height: 1.7;
    cursor: pointer;
}
.hov1:hover {
    color: #222;
}
.bor3 {
    border: 1px solid #e6e6e6;
    border-radius: 5px;
    padding: 10px 20px;
}
.trans-04 {
    transition: all 0.4s;
}
.m-r-32 {
    margin-right: 32px;
}
.m-tb-5 {
    margin-top: 5px;
    margin-bottom: 5px;
}
.how-active1 {
    border-bottom: 2px solid #6c7ae0; /* Adjust this to your preferred underline style */
}
.active-category {
    border-bottom: 2px solid #6c7ae0; /* Ensure this matches the active style */
}
</style>
@endsection

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Product
    </h2>
</section>

<div class="container">
    <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <!-- All Products Button -->
            <form action="{{ route('shop') }}" method="GET">
                <input type="hidden" name="category_id" value="">
                <button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category_id') == '' ? 'active-category' : '' }}">
                    All Products
                </button>
            </form>
            @foreach($categories as $category)
            <form action="{{ route('shop') }}" method="GET">
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category_id') == $category->id ? 'active-category' : '' }}">
                    {{ $category->category_name }}
                </button>
            </form>
            @endforeach
        </div>

        <div class="flex-w flex-c-m m-tb-10">
            <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                Search
            </div>
        </div>
        
        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
            <form action="{{ route('shop') }}" method="GET">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
                </div>	
            </form>
        </div>			
    </div>

    <div class="row isotope-grid">
        @foreach($products as $index => $item)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ asset('images/' . $item->image) }}" alt="IMG-PRODUCT" class="block2-img">
                    <a href="{{ route('product.show', $item->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="{{ route('product.show', $item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $item->product_name }}
                        </a>

                        <span class="stext-105 cl3">
                            Rp.{{ number_format($item->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Load more -->
    {{-- @if($products->count() > 8)
    <div class="flex-c-m flex-w w-full p-t-45">
        <a href="{{ $products->nextPageUrl() }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
        </a>
    </div>
    @endif --}}
</div>
@endsection

@section('scripts')
<script>
$('.js-pscroll').each(function(){
    $(this).css('position','relative');
    $(this).css('overflow','hidden');
    var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
    });

    $(window).on('resize', function(){
        ps.update();
    })
});
</script>

<script>
window.addEventListener('load', function() {
    // Ambil semua gambar dengan kelas 'block2-img'
    var images = document.querySelectorAll('.block2-img');
    
    // Loop melalui setiap gambar
    images.forEach(function(image) {
        // Atur tinggi gambar menjadi tinggi gambar terbesar
        var maxHeight = Math.max.apply(null, Array.from(images).map(function(image) {
            return image.clientHeight;
        }));
        image.style.height = maxHeight + 'px';
    });
});
</script>
@endsection
