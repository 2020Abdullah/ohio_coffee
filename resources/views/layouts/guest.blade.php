<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title page -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/semi-dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/authentication.css?' . time()) }}">
    @yield('css')
</head>
<body class="pace-done vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div id="app">
        <!-- content -->
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                        @yield('page-title')
                    </div>
                    <div class="content-body">
                        @yield('content')
                    </div>
                </div>
            </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    @yield('js')
</body>
</html>
