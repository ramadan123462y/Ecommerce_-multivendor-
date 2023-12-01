<!DOCTYPE html>
<html class="no-js" lang="zxx">

<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>@yield('title')</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

<head>
    @include('Frontend.layouts.head')

    @yield('css')
</head>




<body>


    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @include('Frontend.layouts.header')


    @yield('content')

    @include('Frontend.layouts.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    @include('Frontend.layouts.scripts')


    @yield('scripts')
</body>

</html>
