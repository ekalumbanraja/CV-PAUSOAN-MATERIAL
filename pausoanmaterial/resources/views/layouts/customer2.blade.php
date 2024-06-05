<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <title>Home</title> --}}
    <title>@yield('title')</title>
{{-- @yield('eka') --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon --><link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('assete/images/icons/icon.png') }}"/>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- CSS Files -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assete/css/main.css') }}">

    <!-- Midtrans Scripts -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <style>
        .site-logo a {
            text-transform: uppercase;
            letter-spacing: .2em;
            font-size: 20px;
            padding-left: 10px;
            padding-right: 10px;
            border: 2px solid #25262a;
            color: #000 !important;
        }
        .site-logo a:hover {
            text-decoration: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #000000;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ffffff;
        }

        .dropbtn {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
    </style>
    @yield('css')
</head>
@section('title','home')
    
<body class="animsition">
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                       Bukan Toko Bangunan Kaleng kaleng
                    </div>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">pausoanmaterial@gmail.com</a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25">082299770207</a>
                        {{-- <a href="#" class="flex-c-m trans-04 p-lr-25">EN</a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25">USD</a> --}}
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    <!-- Logo desktop -->
                    <div class="site-logo">
                        <a href="/welcome2" class="logo">
                            CV PAUSOAN
                        </a>
                    </div>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="custom-navbar main-menu">
                            <li class="">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li><a class="nav-link" href="/shop">Shop</a></li>
                            <li><a class="nav-link" href="/galery">Galery</a></li>
                            <li><a class="nav-link" href="/transaction">My order</a></li>
                            <li><a class="nav-link" href="/aboutus">About Us</a></li>

                            {{-- <li><a class="nav-link" href="/contact">Contact</a></li> --}}
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <a href="/cart">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ \App\Models\Cart::where('idUser', Auth::id())->count() }}">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-notify="{{ auth()->check() ? auth()->user()->unreadNotifications->count() : 0 }}">
                                <i class="zmdi zmdi-notifications"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                                @forelse(auth()->check() ? auth()->user()->notifications->take(5) : [] as $notification)
                                    <a class="dropdown-item {{ $notification->unread() ? 'font-weight-bold' : '' }}" href="#">{{ $notification->data['message'] }}</a>
                                    @if($notification->unread())
                                        {{ $notification->markAsRead() }}
                                    @endif
                                @empty
                                    <a class="dropdown-item" href="#">Tidak ada notifikasi</a>
                                @endforelse
                                @if(auth()->check() && auth()->user()->notifications->count() > 15)
                                    <a class="dropdown-item text-center" href="#">Lihat semua notifikasi</a>
                                @endif
                            </div>
                        </div>
                        
                        @if(auth()->check())
                            <div class="dropdown">
                                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(auth()->user()->image)
                                        <img src="{{ asset('user/' . auth()->user()->image) }}" alt="" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/oto.jpg') }}" alt="Default User Image" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('historypesanan') }}">History Pesanan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            {{-- <a href="{{ route('login') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">Login</a> --}}
                            <div class="dropdown">
                                <button class="dropbtn"><span class="mdi mdi-account"></span></button>
                                <div class="dropdown-content">
                                    <a href="/login">Login</a>
                                    <a href="/register">Register</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo mobile -->
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('assete/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Gratis ongkir sekitar TOBASA
                    </div>
                </li>
                {{-- <li>
                    <div class="right-top-bar flex-w h-full">
                        {{-- <a href="#" class="flex-c-m p-lr-10 trans-04">Help & FAQs</a> --}}
                        {{-- <a href="/transaction" class="flex-c-m p-lr-10 trans-04">My Order</a> --}}
                        {{-- <a href="#" class="flex-c-m p-lr-10 trans-04">EN</a>
                        <a href="#" class="flex-c-m p-lr-10 trans-04">USD</a> 
                    </div>
                </li> --}}
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="/welcome2">Home</a>
                </li>
                <li>
                    <a href="/shop">Shop</a>
                </li>
                <li>
                    <a href="/aboutus">About Us</a>
                </li>
                <li>
                    <a href="/services">Blog</a>
                </li>
                <li>
                    <a href="/about">About</a>
                </li>
                <li>
                    <a href="/contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ asset('assete/images/icons/icon-close2.png') }}" alt="CLOSE">
                </button>
                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    {{-- <br><br>
    <br><br> --}}
    <br><br>
    <br><br>
    
    @yield('content')
 <br><br>
    <br><br>
    <br><br>
    <br><br>
    
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #ffffff;">Alamat Toko : </h5>
                    <p>
                        Jln. By pass, tambunan,<br> Kec. Balige, Toba,<br>Sumatera Utara 22312
                    </p>
                  </div>

                <!-- Footer Links -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #ffffff;">links</h5>
                    <ul class="list-unstyled mb-0">
                      <li class="mb-1">
                        <a href="/product" style="color: #4f4f4f;">Shop</a>
                      </li>
                      <li class="mb-1">
                        <a href="/aboutus" style="color: #4f4f4f;">About us</a>
                      </li>
                      <li class="mb-1">
                        <a href="/galery" style="color: #4f4f4f;">Galery</a>
                      </li>
                      <li>
                        <a href="/welcome2" style="color: #4f4f4f;">Home</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-1" style="letter-spacing: 2px; color: #ffffff;">opening hours</h5>
                    <table class="table" style="color: #4f4f4f; border-color: #666;">
                      <tbody>
                        <tr>
                          <td>Mon - Sat</td>
                          <td>8am - 9pm</td>
                        </tr>
                        <tr>
                          <td>Sun</td>
                          <td>Close</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>

            <!-- Footer Bottom -->
            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1"><img src="{{ asset('assete/images/icons/icon-pay-01.png') }}" alt="ICON-PAY"></a>
                    <a href="#" class="m-all-1"><img src="{{ asset('assete/images/icons/icon-pay-02.png') }}" alt="ICON-PAY"></a>
                    <a href="#" class="m-all-1"><img src="{{ asset('assete/images/icons/icon-pay-03.png') }}" alt="ICON-PAY"></a>
                    <a href="#" class="m-all-1"><img src="{{ asset('assete/images/icons/icon-pay-04.png') }}" alt="ICON-PAY"></a>
                    <a href="#" class="m-all-1"><img src="{{ asset('assete/images/icons/icon-pay-05.png') }}" alt="ICON-PAY"></a>
                </div>

                {{-- <p class="stext-107 cl6 txt-center">
                    &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p> --}}
            </div>
        </div>
        
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top"><i class="zmdi zmdi-chevron-up"></i></span>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('assete/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assete/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assete/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assete/js/slick-custom.js') }}"></script>
    <script src="{{ asset('assete/vendor/parallax100/parallax100.js') }}"></script>
    <script src="{{ asset('assete/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assete/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assete/js/main.js') }}"></script>

    @yield('scripts')
    <script>
        // Mengambil path halaman saat ini
      // Mengambil path halaman saat ini
      var path = window.location.pathname;
    
    // Menghapus karakter '/' di awal path
    path = path.replace(/\/$/, "");
    
    // Mengambil semua elemen tautan dalam navbar
    var navLinks = document.querySelectorAll('.custom-navbar a.nav-link');
    
    // Loop melalui setiap tautan dan menambahkan kelas 'active' jika path sesuai
    navLinks.forEach(function(link) {
        if (link.getAttribute('href') === path) {
            link.parentElement.classList.add('active-menu');
        }
    });

        
    </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>
</html>
