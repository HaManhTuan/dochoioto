<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/jquery.bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/owl.carousel/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/jquery-ui/jquery-ui.css') }}" />
     <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/lib/fancyBox/jquery.fancybox.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/assets/css/option2.css') }}" />
    <script type="text/javascript" src="{{ asset('public/frontend/assets/lib/jquery/jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/assets/lib/jquery-ui/jquery-ui.min.js')}}"></script>
    <title>Đồ chơi ô tô</title>
</head>
<body class="home option2">
<!-- HEADER -->
@include('layouts.frontend.header')
<!-- end header -->
<!-- Home slideder-->

<!-- END Home slideder-->
@yield('content')
<!-- Footer -->
@include('layouts.frontend.footer')
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/select2/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/jquery.bxslider/jquery.bxslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/owl.carousel/owl.carousel.min.js') }}"></script>
<!-- COUNTDOWN -->
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/countdown/jquery.plugin.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/countdown/jquery.countdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/jquery.elevatezoom.js') }}"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="{{ asset('public/frontend/assets/js/jquery.actual.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/lib/fancyBox/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/assets/js/theme-script.js') }}"></script>
</body>
</html>