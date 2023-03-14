<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title') - {{ setting('app_name') }}</title>

    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="{{url('public/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/plugin/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/plugin/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/plugin/slick.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/arafat-font.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/plugin/animate.css')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/style.css')}}">
    @stack('style')
</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

     
        @yield('content') 
    <!--==================================================================-->
    <script src="{{url('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{url('public/frontend/js/jquery-ui.js')}}"></script>
    <script src="{{url('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/frontend/js/fontawesome.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/slick.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/counter.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/waypoint.min.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/wow.min.js')}}"></script>
    <script src="{{url('public/frontend/js/plugin/plugin.js')}}"></script>
    <script src="{{url('public/frontend/js/main.js')}}"></script>
    @stack('script')

</body>

</html>
