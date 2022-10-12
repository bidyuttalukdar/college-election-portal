<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('general/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('general/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('general/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('general/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('general/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('general/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('general/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('general/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('general/assets/css/style.css') }}" rel="stylesheet">

  <style>
    .color-green{
      color: green;
    }
    .color-red{
      color: red;
    }
  </style>
  @yield('css_content')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="{{url('/')}}"><span></span>GU ELECTION</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active {{ request()->is('register/*') ? 'd-none' : '' }}" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto {{ request()->is('register/*') ? 'd-none' : '' }}" href="#about">About</a></li>
          <li><a class="nav-link scrollto {{ request()->is('register/*') ? 'd-none' : '' }}" href="#services">Services</a></li>
          <li><a class="nav-link scrollto {{ request()->is('register/*') ? 'd-none' : '' }}" href="#candidates">Candidates</a></li>
          {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
          <li><a class="nav-link scrollto {{ request()->is('register/*') ? 'd-none' : '' }}" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <!-- End Hero Section -->

  <main id="main">
    @yield('content')   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span></span>GU Election</h2>
                </div>

                <p>Gauhati University, also known as GU, is a collegiate public state university located in Guwahati, Assam, India. It was established on 26 January 1948 under the provisions of an Act enacted by the Assam Legislative Assembly. It is the oldest university in Northeast India.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  {{-- <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="{{ asset('assets/img/portfolio/1.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/2.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/3.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/4.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/5.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/6.jpg') }}" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div class="copyright text-center">
                    <p>
                        &copy; Copyright <strong>GU</strong>. All Rights Reserved
                    </p>
                    </div>
                    <div class="credits">
                    Designed by Bidyut
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ url('/login')}}">
                        <i class="bi bi-bank2"></i> Admin Login
                    </a>
                </div>
            </div>
        </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script type="text/javascript">
      $(window).on('load', function() {
          $("#preloader").fadeOut();
      });
    </script>
  <!-- Template Main JS File -->
  {{-- <script type="text/javascript" src="{{ asset('assets/js/main.js') }}') }}"></script> --}}
  @yield('js_content')

</body>

</html>