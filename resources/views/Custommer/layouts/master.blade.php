<!DOCTYPE html>
<html lang="en">

@include('Admin.layouts.head')


<body>
    <!-- ======= Header ======= -->
    @include('Admin.layouts.main_header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('Admin.layouts.main_sidebar')
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
    @include('Admin.layouts.footer')
    <!-- End Footer -->



    <!-- Vendor JS Files -->
    @include('Admin.layouts.scripts')



</body>

</html>
