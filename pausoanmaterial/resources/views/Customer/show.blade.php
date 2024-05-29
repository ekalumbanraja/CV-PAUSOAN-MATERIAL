@extends("layouts.customer2")

@section("css")
<style>
    @import url("https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
    body {
        font-family: 'Poppins', sans-serif;
    }
    .comments-area {
        background: transparent;
        border-top: 1px solid #eee;
        padding: 45px 0;
        margin-top: 50px;
    }
    @media (max-width: 414px) {
        .comments-area {
            padding: 50px 8px;
        }
    }
    .comments-area h4 {
        margin-bottom: 35px;
        font-size: 18px;
    }
    .comments-area h5 {
        font-size: 16px;
        margin-bottom: 0px;
    }
    .comments-area .comment-list {
        padding-bottom: 10px;
    }
    .comments-area .comment-list:last-child {
        padding-bottom: 0px;
    }
    .comments-area .comment-list.left-padding {
        padding-left: 25px;
    }
    @media (max-width: 413px) {
        .comments-area .comment-list .single-comment h5 {
            font-size: 12px;
        }
        .comments-area .comment-list .single-comment .date {
            font-size: 11px;
        }
        .comments-area .comment-list .single-comment .comment {
            font-size: 10px;
        }
    }
    .comments-area .thumb {
        margin-right: 20px;
    }
    .comments-area .thumb img {
        width: 40px;
        border-radius: 50%;
    }
    .comments-area .date {
        font-size: 14px;
        color: #999999;
        margin-bottom: 0;
        margin-left: 20px;
    }
    .comments-area .comment {
        margin-bottom: 10px;
        color: #777777;
        font-size: 15px;
    }
    .comments-area .btn-reply {
        background-color: transparent;
        color: #888888;
        padding: 5px 18px;
        font-size: 14px;
        display: block;
        font-weight: 400;
    }
    .blog-author {
        padding: 40px 30px;
        background: #fbf9ff;
        margin-top: 50px;
    }
    @media (max-width: 600px) {
        .single-post-area .blog-author {
            padding: 20px 8px;
        }
    }
    .single-post-area .blog-author img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin-right: 30px;
    }
    @media (max-width: 600px) {
        .single-post-area .blog-author img {
            margin-right: 15px;
            width: 45px;
            height: 45px;
        }
    }
    .single-post-area .blog-author a {
        display: inline-block;
    }
    .single-post-area .blog-author a:hover {
        color: #9F78FF;
    }
    .single-post-area .blog-author p {
        margin-bottom: 0;
        font-size: 15px;
    }
    .single-post-area .blog-author h4 {
        font-size: 16px;
    }
    .single-post-area .navigation-area {
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
        margin-top: 55px;
    }
    .product-container {
        display: flex;
        max-width: 1000px;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        margin: auto;
    }
    .product-image {
        flex: 1;
        transition: transform 0.3s ease;
    }
    .product-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .product-details {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .product-title {
        font-family: 'Cinzel', serif;
        font-size: 2.2em;
        margin: 10px 0;
    }
    .price {
        font-size: 1.5em;
        margin: 10px 0;
    }
    .new-price {
        color: #e60023;
    }
    .product-description {
        margin: 20px 0;
        line-height: 1.5;
        color: #333;
    }
    .product-purchase {
        display: flex;
        align-items: center;
    }
    .quantity-operations {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .quantity-operations button {
        /* background-color: #333; */
        color: rgb(0, 0, 0);
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 20px;
    }
    .quantity-operations input {
        text-align: center;
        border: 1px solid #ddd;
        width: 50px;
        font-size: 20px;
    }
    .quantity-operations button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
    .add-to-cart {
        display: inline-block;
        height: 50px;
        color: white;
        border: none;
        padding: 0 40px;
        text-transform: uppercase;
        font-size: 14px;
        line-height: 50px;
        background-color: #007bff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .add-to-cart:hover {
        background-color: #0056b3;
    }
    .comments-section h2 {
        font-family: 'Cinzel', serif;
        margin-bottom: 20px;
    }
    .comment {
        display: flex;
        margin-bottom: 20px;
    }
    .comment img.user-img {
        border-radius: 50%;
        width: 64px;
        height: 64px;
        margin-right: 20px;
    }
    .comment-details {
        flex: 1;
    }
    .comment-details h4 {
        margin: 0;
        font-size: 1.1em;
    }
    .comment-details p.comment-text {
        margin: 5px 0 10px;
    }
    .comment-details .text-muted {
        font-size: 0.9em;
    }
</style>
@endsection

@section("content")
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Product section-->
<html>
<body>
    <main>
        <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
            <h2 class="ltext-105 cl0 txt-center">
                Product Details
            </h2>
        </section>
        
        <br><br><br>
        <div class="product-container">
            <div class="product-image">
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" />
            </div>
            <div class="product-details">
                <h1 class="product-title">{{ $product->product_name }}</h1>
                <p class="price">
                    <span class="new-price">Rp.{{ number_format($product->price, 0, ',', '.') }}</span>
                </p>
                <p class="stock">Stok: <span>{{ $product->stok }}</span></p>
                <p class="product-description">
                    {{ $product->description }}
                    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero? --}}
                </p>
                <form action="{{ route('addToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idProduct" value="{{ $product->id }}">
                    <input type="hidden" name="stok" value="{{ $product->stok }}">
                    <input type="hidden" name="totalPrice" id="totalPriceInput" value="{{ $product->price }}">
                    <div class="quantity-operations">
                        <button type="button" class="decrease">-</button>
                        <input type="text" class="quantity" value="1" aria-label="Example text with button addon" id="qty" min="1" max="{{ $product->stok }}" name="qty" aria-describedby="button-addon1" />
                        <button type="button" class="increase">+</button>
                    </div>
                    Total: <span id="totalPrice" class="price">{{ number_format($product->price, 0, ',', '.') }}</span>
                    <br>
                    <button type="submit" class="add-to-cart" style="font-size:24px;background-color:#333 ; "> <span class="mdi mdi-cart-arrow-down"></span></button>
                </form>
            </div>
        </div>
    </main>
    <br>

    <section class="border-top py-4">
        <div class="container">
            <h2 class="comments-section">Product Reviews</h2>

            @if (request()->query('from') === 'historypesanan')
                <!-- Review form for logged-in users -->
                <form action="{{ route('submitReview', ['product_id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="review">Your Review:</label>
                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            @endif
            
            <!-- Display reviews -->
            <div class="mt-2">
                @if($recentReviews->isEmpty())
                    <p>No recent reviews yet.</p>
                @else
                    <div class="comments-area">
                        @foreach($recentReviews as $review)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('user/' . $review->user->image) }}">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">{{ $review->content }}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>{{ $review->user->name }}</h5>
                                                    <p class="date">{{ $review->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
</body>
</html>
@endsection

@section("scripts")
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var increaseButton = document.querySelector('.increase');
        var decreaseButton = document.querySelector('.decrease');
        var quantityInput = document.getElementById('qty');
        var maxStock = {{ $product->stok }};
        var pricePerItem = parseInt("{{ $product->price }}");

        function updatePrice() {
            var currentValue = parseInt(quantityInput.value);
            var totalPrice = currentValue * pricePerItem;
            document.getElementById('totalPrice').innerText = totalPrice.toLocaleString('id-ID');
            document.getElementById('totalPriceInput').value = totalPrice;
        }

        increaseButton.addEventListener('click', function() {
            var currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue < maxStock) {
                quantityInput.value = currentValue + 1;
                updatePrice();
                if (parseInt(quantityInput.value) === maxStock) {
                    increaseButton.disabled = true;
                }
            }
        });

        decreaseButton.addEventListener('click', function() {
            var currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updatePrice();
                increaseButton.disabled = false;
            }
        });

        quantityInput.addEventListener('input', function() {
            var currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && (currentValue < 1 || currentValue > maxStock)) {
                quantityInput.value = 1;
                increaseButton.disabled = false;
            }
            updatePrice();
        });
    });
</script>
@endsection
