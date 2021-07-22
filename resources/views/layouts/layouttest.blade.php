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
  <link href="{{ asset('/assets/css/user.css') }}" rel="stylesheet">

</head>

<body>
<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <h1><a href="{{ url('/') }}">E-VENT</a></h1>
    </div>

    <div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <!-- <li class="menu-active"><a href="#hero">Beranda</a></li> -->
        @if(!auth()->user())
        <li><a class="btn btn-login" href="{{ route('login') }}">Login</a></li>
        <li><a class="btn btn-register" href="{{ route('signup') }}">Sign Up</a></li>
        @else
        <li><a class="btn" href="{{ route('history') }}">History Transactions</a></li>
        <li><a class="btn" href="{{ route('ticket') }}">My Ticket</a></li>
        <li></li>
        <li class="nav-item dropdown no-arrow">
          <a class="btn btn-register dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img class="img-profile rounded-circle" style="height: 20px; width: 20px;" src="{{ asset('assets3/avatar/'.auth()->user()->avatar) }}"></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item text-dark" href="{{ route('profileUser') }}">
              <i class="fa fa-user fa-sm fa-fw mr-2 text-dark"></i>
              Profile
            </a>
            <hr>
            <a class="dropdown-item text-dark" href="{{ url('logout') }}">
              <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-dark"></i>
              Logout
            </a>
          </div>
        </li>
        @endif

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
<!-- <div class="fixed-bottom"> -->
<footer class="fixed-bottom" id="footeruser">
  <div class="footer-top">
    <div class="container">

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      <strong>E-VENT</strong> &copy; 2020. All rights reserved
    </div>
    <div class="credits">
      Designed by <a href="">TeamName</a>
    </div>
  </div>
</footer><!-- #footer -->
<!-- </div> -->
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
