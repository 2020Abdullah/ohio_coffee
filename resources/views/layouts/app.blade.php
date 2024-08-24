<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <title>OHIO 22 System</title>

    
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/themes/semi-dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css?' . time()) }}">
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <div id="app">
        <x-header/>
        <x-sidebar/>
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
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('assets/vendors/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
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

        // add active url to page target
        var Currentpath = $(location).attr("pathname");
            
        $(".navigation .nav-item").each(function(index, item){
            if($(this).find('a').attr('href').indexOf(Currentpath) !== -1){
                $(".navigation .nav-item").removeClass('active');
                $(this).addClass('active');
            }
        })

    </script>
    
    @include('sweetalert::alert')

    @yield('js')
</body>
</html>
