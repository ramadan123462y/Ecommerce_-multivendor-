<!DOCTYPE html>
<html lang="en">

@include('Saller.layouts.head')


<body>
    <!-- ======= Header ======= -->
    @include('Saller.layouts.main_header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('Saller.layouts.main_sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">


        <div class="pagetitle">
            <h1>@yield('page')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">@yield('breadcrumb')
                    </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('Saller.layouts.footer')
    <!-- End Footer -->



    <!-- Vendor JS Files -->
    @include('Saller.layouts.scripts')



</body>

</html>
