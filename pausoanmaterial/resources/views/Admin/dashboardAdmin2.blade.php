<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title> ADMIN | PAUSOAN MATERIAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{ asset('admin2/assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css" />
    <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">

    <!-- App css -->
    <link href="{{ asset('admin2/assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin2/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin2/assets/js/config.js') }}"></script>

</head>
<style>
     a {
            text-decoration: none !important;
        }
</style>
<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a class='logo-light' href='/admin/home2'>
                    <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="logo" class="logo-lg" height="28">
                    <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="small logo" class="logo-sm" height="28">
                </a>

            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">
                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ url('/admin/home2')}}'>
                            <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                            <span class="menu-text"> Dashboards </span>
                            {{-- <span class="badge bg-primary rounded ms-auto">01</span> --}}
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{url('admin/category') }} '>
                            <span class="menu-icon"><span class="mdi mdi-order-bool-descending"></span></span></span>
                            <span class="menu-text"> Category </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{url('admin/product') }} '>
                            <span class="menu-icon"><span class="mdi mdi-list-box"></span></span>
                            <span class="menu-text"> Product </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{url('admin/transaction') }} '>
                            <span class="menu-icon"><span class="mdi mdi-notification-clear-all"> </span></span>
                            <span class="menu-text"> Order </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{url('admin/delivery') }} '>
                            <span class="menu-icon"><span class="mdi mdi-truck-delivery"></span></span>
                            <span class="menu-text"> Delivery </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{route('galeri.index') }} '>
                            <span class="menu-icon"><span class="mdi mdi-image"></span></span>
                            <span class="menu-text"> Gallery </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="logo" class="logo-lg" height="22">
                                <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="dark logo" class="logo-lg" height="22">
                                <img src="{{ asset('admin2/assets/images/logo4.png') }}" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>
                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if(auth()->user()->image)
                                <img src="{{ asset('user/' . auth()->user()->image) }}" alt="" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('images/oto.jpg') }}" alt="Default User Image" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @endif
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                {{-- <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div> --}}
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="page-title mb-0">Dashboard</h4>
                            </div>
                            <div class="col-lg-6">
                               <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                               </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        {{-- <span class="badge badge-soft-primary float-end">Daily</span> --}}
                                        <h5 class="card-title mb-0">Total Category</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                <?php echo $totalcategory; ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        {{-- <span class="badge badge-soft-primary float-end">Per Week</span> --}}
                                        <h5 class="card-title mb-0">Total Product</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                <?php echo $totalProducts; ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        {{-- <span class="badge badge-soft-primary float-end">Per Month</span> --}}
                                        
                                        <h5 class="card-title mb-0">Total Order</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                <?php echo $totalpesanan; ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div>
                            <!--end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">All Time</span>
                                        <h5 class="card-title mb-0">Total Income</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                <?php echo 'Rp.' . number_format($totalPaidOrders, 0, ',', '.'); ?>
                                            </h2>
                                        </div>
                                       
                                    </div>
                                </div>

                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                    </div>

                    <!-- end row-->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="card-title">Monthly Income</h4>
                                            <p class="card-subtitle mb-0">Ini adalah data hasil penghasilan perbulan</p>
                                        </div>
                                        <a href="/export-excel" class="btn btn-info">Export Excel</a>
                                    </div>
                                    <canvas id="chartjs-bar" width="400" height="100"></canvas>
                                </div> <!--end card body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!--end row-->

             
                    <!--end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Pausoan Material</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                            </div>
                        </div>
                              
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function () {
        const labels = @json($labels);
        const data = @json($data);

        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Monthly Income",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: data,
                        barPercentage: 0.75,
                        categoryPercentage: 0.5,
                    },
                ],
            },
            options: {
                scales: {
                    yAxes: [
                        {
                            gridLines: {
                                display: false,
                            },
                            stacked: false,
                        },
                    ],
                    xAxes: [
                        {
                            stacked: false,
                            gridLines: {
                                color: "transparent",
                            },
                        },
                    ],
                },
            },
        });
    });
    </script>
    <!-- END wrapper -->

    <!-- App js -->
    {{-- <script src="{{ asset('admin2/assets/js/vendor.min.js') }}"></script> --}}
    <script src="{{ asset('admin2/assets/js/app.js') }}"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('admin2/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('admin2/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('admin2/assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('admin2/assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('admin2/assets/js/pages/dashboard.js') }}"></script>

</body>
</html>