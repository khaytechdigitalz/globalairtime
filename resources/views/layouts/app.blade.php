<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ setting('app_name') }}</title>

    <link rel="shortcut icon" href="{{url('public/backend/images/fav.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('public/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/plugin/apexcharts.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/plugin/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/arafat-font.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/plugin/animate.css')}}">
    <link rel="stylesheet" href="{{url('public/backend/css/style.css')}}">

    @yield('styles')
    @stack('style')

    @hook('app:styles')
</head>
 
<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    @include('partials.navbar') 
            
         @yield('content') 
    <!--==================================================================-->
    <script src="{{url('public/backend/js/jquery.min.js')}}"></script>
    <script src="{{url('public/backend/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/backend/js/jquery-ui.js')}}"></script>
    <script src="{{url('public/backend/js/plugin/apexcharts.js')}}"></script>
    <script src="{{url('public/backend/js/plugin/jquery.nice-select.min.jss')}}"></script>
    <script src="{{url('public/backend/js/plugin/waypoint.min.js')}}"></script>
    <script src="{{url('public/backend/js/plugin/wow.min.js')}}"></script>
    <script src="{{url('public/backend/js/plugin/plugin.js')}}"></script>
    <script src="{{url('public/backend/js/main.js')}}"></script>
    <script src="{{ url('public/assets/js/vendor.js') }}"></script>
    <script src="{{ url('public/assets/js/as/app.js') }}"></script>
    @yield('scripts')
    @stack('script')

    @hook('app:scripts')
</body>
</html>


{{-- <!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ setting('app_name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ setting('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

    <link media="all" type="text/css" rel="stylesheet" href="{{ url('public/assets/css/vendor.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ url('public/assets/css/app.css') }}">

    @yield('styles')

    @hook('app:styles')
</head>
<body>
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar.main')

            <div class="content-page">
                <main role="main" class="px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="{{ url('public/assets/js/vendor.js') }}"></script>
    <script src="{{ url('public/assets/js/as/app.js') }}"></script>
    @yield('scripts')

    @hook('app:scripts')
</body>
</html>
--}}
