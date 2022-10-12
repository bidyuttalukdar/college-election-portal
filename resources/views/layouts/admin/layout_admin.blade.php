<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
	<link href="{{ asset('assets/images/emblem.png') }}" rel="icon">
    <link href="{{ asset('assets/img/emblem.png') }}" rel="emblem-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @yield('css_content')
</head>

<body>
    <style>
        .header {
            max-width: 100% !important;
        }

        .box_border {
            box-shadow: 5px 10px gainsboro;
        }

        .color_white {
            color: white;
        }

        .color_black {
            color: #012970;
        }

        .color-red{
            color:red;
        }
        .color-green{
            color: green;
        }
        .dataTable-table>thead>tr>th {
            vertical-align: middle;
            background-color: aliceblue;
            color: #6687b8;
        }

        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            border: 4px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 45px;
            height: 45px;
            animation: spin 2s linear infinite;
        }

        .web-text{
            color:#012970;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    <!-- ======= Header ======= -->
    @include('layouts.admin.admin_header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.admin.admin_sidebar')
    <!-- End Sidebar-->

    <!----==== Main ===----->
    <main id="main" class="main">
        @yield('admin_content')
		
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.admin.admin_footer')
    <!-- End Footer -->

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
	
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    
	
	
	<!-- JS Files -->

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut();
        });
    </script>

    @yield('js_content')
</body>

</html>
