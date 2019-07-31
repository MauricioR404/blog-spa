<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/blog/blog/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- csrf-token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('meta-title', config('app.name'))</title>
    <meta name="description" content="@yield('meta-description', 'Este es el blog de Zendero')">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">
    @stack('styles')

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>

    <!-- Preloader -->
    {{-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> --}}

<!-- VueJs -->
<div id="app">

    <!-- Start header section -->
    <header class="header-area" id="header-area">
        <div class="dope-nav-container breakpoint-off">
            <div class="container">
                <div class="row">
                    <!-- dope Menu -->
                    <nav class="dope-navbar justify-content-between" id="dopeNav">

                        <!-- Logo -->
                            <img src="{{ asset('img/blog/logo.png') }}" alt="">

                        <!-- Navbar Toggler -->
                        <div class="dope-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>

                        <!-- Menu -->
                        <div class="dope-menu">

                            <!-- close btn -->
                            <div class="dopecloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Nav Start -->
                            <div class="dopenav">
                                <ul id="nav">
                                    <li>
                                        <router-link :to="{name: 'home'}">Home</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'about'}">About</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'contact'}">Contact</router-link>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('pages.contact') }}">Contact</a>
                                    </li> --}}
                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Start header section -->

         <!-- Start page-top-banner section -->
      <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row section-gap-half">
                    <div class="col-lg-12 text-center">
                        <h1>Blog Posts</h1>
                        <h4>Our Recent Blog Posts</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about-top-banner section -->

    
        @yield('content')

    <!-- Start footer section -->
    <footer class="footer-section section-gap-half">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-sm-6 footer-cols">
                  <a href="#">
                      <img src="{{ asset('img/blog/logo-w.png') }}" alt="">
                  </a>
                  <p class="copyright-text">&copy; 2018 Design With
                      <i class="fa fa-heart" aria-hidden="true"></i> By <br>
                      <a href="http://dopetheme.com" target="_blank">Dope Theme</a>
                  </p>
              </div>
              <div class="col-lg-3 col-sm-6 footer-cols">
                  <h4>Resources</h4>
                  <ul>
                      <li><a href="index-multi.html">Home</a></li>
                      <li><a href="about-us.html">About Us</a></li>
                      <li><a href="service.html">Services</a></li>
                      <li><a href="portfolio.html">Portfolio</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                  </ul>
              </div>
              <div class="col-lg-3 col-sm-6 footer-cols">
                  <h4>Help</h4>
                  <ul>
                      <li><a href="#">Terms & condition</a></li>
                      <li> <a href="#">Privacy</a></li>
                      <li> <a href="#">Policy</a></li>
                      <li> <a href="#">Support</a></li>
                      <li> <a href="#">FAQ</a></li>
                  </ul>
              </div>
              <div class="col-lg-3 col-sm-6 footer-cols">
                  <h4>Get in touch</h4>
                  <ul>
                      <li>
                          <a href="tel:880174230987">880174230987</a>
                      </li>
                      <li>
                          <a href="email:Support@dometheme.com.bd">Support@dometheme.com</a>
                      </li>
                      <li>
                          <a href="#">
                              West Baller court 69 <br>
                              London , UK
                          </a>
                      </li>
                  </ul>
                  <ul id="social">
                      <li>
                          <a target="_blank" href="#">
                              <i class="fa fa-facebook"></i>
                          </a>
                      </li>
                      <li>
                          <a target="_blank" href="#">
                              <i class="fa fa-twitter"></i>
                          </a>
                      </li>
                      <li>
                          <a target="_blank" href="#">
                              <i class="fa fa-google-plus"></i>
                          </a>
                      </li>
                      <li>
                          <a target="_blank" href="#">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <!-- End footer section -->

  <div class="scroll-top">
      <i class="ti-angle-up"></i>
  </div>

</div>
  <!--
JS
============================================= -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
  <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>
  <script src="{{ asset('js/dopeNav.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  

</body>

</html>










