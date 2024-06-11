@extends('layouts.customer2')
@section('title','Product | PAUSOAN MATERIAL')

@section('css')
<style>
.block2 {
    position: relative;
    overflow: hidden;
    border: 1px solid #f0f0f0;
    border-radius: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 350px;
}

.block2:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.block2-img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.block2-txt {
    padding: 15px;
}

.block2-btn {
    position: absolute;
    bottom: 15px;
    right: 15px;
    padding:10px 16px;
    background-color: #6c7ae0;
    color: #fff;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

.block2:hover .block2-btn {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.block2-btn:hover {
    background-color: #555;
}

.stext-104 {
    font-size: 14px;
    color: #333;
    transition: all 0.3s ease;
}

.stext-104:hover {
    color: #6c7ae0;
}

/* Styles for the select dropdown */
.category-select {
    font-size: 16px;
    color: #333;
    background-color: #f8f8f8;
    border: 2px solid #ddd;
    border-radius: 5px;
    padding: 10px 20px;
    margin: 5px;
    transition: all 0.3s ease;
}

.category-select:hover {
    color: #000000;
    background-color: #ffffff;
    /* border-color: #6c7ae0; */
}

.active-category {
    /* background-color: #6c7ae0; */
    color: #fff;
    /* border-color: #6c7ae0; */
}

.search-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
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
        <div class="m-tb-10">
            <!-- Category Select Dropdown -->
            <form action="{{ route('shop') }}" method="GET">
                <select name="category_id" class="category-select" onchange="this.form.submit()">
                    <option value="" {{ request('category_id') == '' ? 'selected' : '' }}>All Products</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="search-container m-tb-10">
            <!-- Search product -->
            <form action="{{ route('shop') }}" method="GET" style="display: flex; align-items: center; padding: 5px 10px;">
                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search" style="border: none; outline: none; font-size: 1rem; color: #333; padding-left: 10px; width: 100%;">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                    <i class="zmdi zmdi-search" style="font-size: 1.5rem; color: #555;"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="row isotope-grid">
        @foreach($products as $index => $item)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ asset('images/' . $item->image) }}" alt="IMG-PRODUCT" class="block2-img">
                    <a href="{{ route('product.show', $item->id) }}" class="block2-btn flex-c-m stext-103">
                        View Details
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l">
                        <a href="{{ route('product.show', $item->id) }}" class="stext-104">
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