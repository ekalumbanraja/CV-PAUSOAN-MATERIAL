<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}" />
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet" />
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}" />
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/owl.transitions.css') }}" />
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu/meanmenu.min.css') }}" />
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}" />
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}" />
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}" />
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/jvectormap/jquery-jvectormap-2.0.3.css') }}" />
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/notika-custom-icon.css') }}" />
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/wave/waves.min.css') }}" />
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}" />
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}" />
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
  </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="logo-area">
              <a href="#"><img src="{{ asset('admin/img/logo/lala.png') }}" width="150px" height="48px" alt="" /></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="header-top-menu">
              <ul class="nav navbar-nav notika-top-nav">
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                        @endguest
                
           
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="mobile-menu">
              <nav id="dropdown">
                <ul class="mobile-menu-nav">
                  <li>
                    <a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                    <ul id="demoevent" class="collapse dropdown-header-top">
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="view-email.html">View Email</a></li>
                      <li><a href="compose-email.html">Compose Email</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                    <ul id="democrou" class="collapse dropdown-header-top">
                      <li><a href="animations.html">Animations</a></li>
                      <li><a href="google-map.html">Google Map</a></li>
                      <li><a href="data-map.html">Data Maps</a></li>
                      <li><a href="code-editor.html">Code Editor</a></li>
                      <li><a href="image-cropper.html">Images Cropper</a></li>
                      <li><a href="wizard.html">Wizard</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                    <ul id="demolibra" class="collapse dropdown-header-top">
                      <li><a href="flot-charts.html">Flot Charts</a></li>
                      <li><a href="bar-charts.html">Bar Charts</a></li>
                      <li><a href="line-charts.html">Line Charts</a></li>
                      <li><a href="area-charts.html">Area Charts</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                    <ul id="demodepart" class="collapse dropdown-header-top">
                      <li><a href="normal-table.html">Normal Table</a></li>
                      <li><a href="data-table.html">Data Table</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                    <ul id="demo" class="collapse dropdown-header-top">
                      <li><a href="form-elements.html">Form Elements</a></li>
                      <li><a href="form-components.html">Form Components</a></li>
                      <li><a href="form-examples.html">Form Examples</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                      <li><a href="notification.html">Notifications</a></li>
                      <li><a href="alert.html">Alerts</a></li>
                      <li><a href="modals.html">Modals</a></li>
                      <li><a href="buttons.html">Buttons</a></li>
                      <li><a href="tabs.html">Tabs</a></li>
                      <li><a href="accordion.html">Accordion</a></li>
                      <li><a href="dialog.html">Dialogs</a></li>
                      <li><a href="popovers.html">Popovers</a></li>
                      <li><a href="tooltips.html">Tooltips</a></li>
                      <li><a href="dropdown.html">Dropdowns</a></li>
                    </ul>
                  </li>
                  <li>
                    <a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                    <ul id="Pagemob" class="collapse dropdown-header-top">
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="color.html">Color</a></li>
                      <li><a href="login-register.html">Login Register</a></li>
                      <li><a href="404.html">404 Page</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li >
                <a  href="{{ url('/admin/home')}}"><i class="notika-icon notika-house"></i> Home</a>
              </li>
              <li>
                <a href=" {{url('admin/category') }} "><i class="notika-icon notika-mail"></i> Category</a>
              </li>
              <li>
                <a href="{{ url('admin/product')}}"><i class="notika-icon notika-mail"></i> Product</a>
              </li>
              <li>
                <a href="#Interface"><i class="notika-icon notika-edit"></i> Transaction</a>
              </li>
              <li>
                <a href="#Charts"><i class="notika-icon notika-bar-chart"></i> Inventory</a>
              </li>
              <li>
                <a href="#Tables"><i class="notika-icon notika-windows"></i> Order</a>
              </li>
              <li>
                <a href="#Forms"><i class="notika-icon notika-form"></i> Feedback</a>
              </li>
              <li>
                <a href="#Appviews"><i class="notika-icon notika-app"></i>Purchase</a>
              </li>
              <!-- <li>
                <a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Pages</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
              <div class="website-traffic-ctn">
                <h2><span class="counter">50,000</span></h2>
                <p>Total Website Traffics</p>
              </div>
              <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
              <div class="website-traffic-ctn">
                <h2><span class="counter">90,000</span>k</h2>
                <p>Website Impressions</p>
              </div>
              <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
              <div class="website-traffic-ctn">
                <h2>$<span class="counter">40,000</span></h2>
                <p>Total Online Sales</p>
              </div>
              <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
              <div class="website-traffic-ctn">
                <h2><span class="counter">1,000</span></h2>
                <p>Total Support Tickets</p>
              </div>
              <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <div class="sale-statistic-inner notika-shadow mg-tb-30">
              <div class="curved-inner-pro">
                <div class="curved-ctn">
                  <h2>Sales Statistics</h2>
                  <p>Vestibulum purus quam scelerisque, mollis nonummy metus</p>
                </div>
              </div>
              <div id="curved-line-chart" class="flot-chart-sts flot-chart"></div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
            <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
              <div class="past-day-statis">
                <h2>For The Past 30 Days</h2>
                <p>Fusce eget dolor id justo luctus the commodo vel pharetra nisi. Donec velit of libero.</p>
              </div>
              <div class="dash-widget-visits"></div>
              <div class="past-statistic-an">
                <div class="past-statistic-ctn">
                  <h3><span class="counter">3,20,000</span></h3>
                  <p>Page Views</p>
                </div>
                <div class="past-statistic-graph">
                  <div class="stats-bar"></div>
                </div>
              </div>
              <div class="past-statistic-an">
                <div class="past-statistic-ctn">
                  <h3><span class="counter">1,03,000</span></h3>
                  <p>Total Clicks</p>
                </div>
                <div class="past-statistic-graph">
                  <div class="stats-line"></div>
                </div>
              </div>
              <div class="past-statistic-an">
                <div class="past-statistic-ctn">
                  <h3><span class="counter">24,00,000</span></h3>
                  <p>Site Visitors</p>
                </div>
                <div class="past-statistic-graph">
                  <div class="stats-bar-2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->

    <!-- End Email Statistic area-->
    <!-- Start Realtime sts area-->

    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-copy-right">
              <p>Copyright © 2018 . All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{ asset('admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('admin/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('admin/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('admin/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{ asset('admin/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('admin/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('admin/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('admin/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('admin/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('admin/js/knob/knob-active.js') }}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{ asset('admin/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('admin/js/wave/wave-active.js') }}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('admin/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <!--  Chat JS
		============================================ -->
    <script src="{{ asset('admin/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('admin/js/tawk-chat.js') }}"></script>
  </body>
</html>
