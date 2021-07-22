<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('/assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('/assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/lib/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('/assets/css/home.css') }}" rel="stylesheet">

</head>

<body>
<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <h1><a href="{{ url('/') }}">SITE NAME</a></h1>
    </div>

    <div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <!-- <li class="menu-active"><a href="#hero">Beranda</a></li> -->
        <li><a class="btn btn-login" href="#services">Login</a></li>
        <li><a class="btn btn-register" href="#contact">Sign Up</a></li>

      </ul>
    </nav> <!-- #nav-menu-container -->
    </div>

  </div>
</header>

<section>
    <main>
      @yield('content')
    </main>
</section>

<!--==========================
  Footer
============================-->
<footer id="footeruser">
  <div class="footer-top">
    <div class="container">

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      <strong>Sitename</strong> &copy; 2020. All rights reserved
    </div>
    <div class="credits">
      Designed by <a href="">TeamName</a>
    </div>
  </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('assets/lib/sweetalert/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/lib/select2/select2.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('assets/js/home.js') }}"></script>

</body>
</html>