<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hien Luong Audio - @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Hien Luong Audio - Pro Audio">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap Min Css -->
    <link rel="stylesheet" href="/assets/theme/css/vendor/bootstrap.min.css">
    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="/assets/theme/css/vendor/font-awesome.min.css">
    <!-- Material Design Font Css -->
    <link rel="stylesheet" href="/assets/theme/css/vendor/material-design-iconic-font.min.css">
    <!-- Animate Css -->
    <link rel="stylesheet" href="/assets/theme/css/vendor/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/theme/css/plugins/magnific-popup.css">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="/assets/theme/css/plugins/jquery-ui.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/assets/theme/css/plugins/plugins.css">


    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/theme/css/style.css">
    <!-- jQuery JS -->
    <script src="/assets/theme/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Alpinejs --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.4.2/cdn.min.js" integrity="sha512-Ggh9DYKMB04uOmJlra3yKB/Fk/mxjbehmixi/Jy+omCWFGNZEBwGkPz0+R+zgzZfGsHBGB8e4UsYedB32MJ/QQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('theme.layouts.header')

<main>
    @yield('content') 
</main>

@include('theme.layouts.footer')
<!-- JS
============================================ -->

    <!-- jQuery JS -->
    <!-- <script src="/assets/theme/js/vendor/jquery-3.6.0.min.js"></script> -->
    <!-- jQuery Migrate JS -->
    <script src="/assets/theme/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="/assets/theme/js/vendor/modernizr-3.8.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/theme/js/vendor/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="/assets/theme/js/plugins/plugins.js"></script>
    <!-- Jquery ui JS -->
    <script src="/assets/theme/js/plugins/jquery.ui.js"></script>
    <!-- Mailchimp JS -->
    <script src="/assets/theme/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Magnific Popup JS -->
    <script src="/assets/theme/js/plugins/jquery.magnific-popup.min.js"></script>
    <!-- Slick JS -->
    <script src="/assets/theme/js/plugins/slick.min.js"></script>
    <!-- Modal JS -->
    <script src="/assets/theme/js/plugins/modal.min.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="/assets/theme/js/plugins/sticky-sidebar.min.js"></script>
    <!-- Countdown JS -->
    <script src="/assets/theme/js/plugins/countdown.min.js"></script>
    <!-- jQuery Nice Select JS -->
    <script src="/assets/theme/js/plugins/jquery.nice-select.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/theme/js/main.js"></script>
    
</body>
</html>