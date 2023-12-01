<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <form action="{{ url('change_currency') }}" method="POST">
                                        @csrf
                                        <select id="select4" onchange ="this.form.submit ()" name="to_currence">
                                            <option value="USD" @selected(Session::get('type_currency') == 'USD')>$ USD</option>
                                            <option value="EUR" @selected(Session::get('type_currency') == 'EUR')>€ EURO</option>
                                            <option value="CAD" @selected(Session::get('type_currency') == 'CAD')>$ CAD</option>
                                            <option value="INR" @selected(Session::get('type_currency') == 'INR')>₹ INR</option>
                                            <option value="CNY" @selected(Session::get('type_currency') == 'CNY')>¥ CNY</option>
                                            <option value="BDT" @selected(Session::get('type_currency') == 'BDT')>৳ BDT</option>
                                        </select>
                                    </form>
                                </div>
                            </li>


                            <li>


                                <div class="select-position">
                                    <select id="select5" onchange="navigateToOption()">
                                      @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <script>
                                    function navigateToOption() {
                                      var selectElement = document.getElementById("select5");
                                      var selectedOption = selectElement.value;
                                      if (selectedOption !== "0") {
                                        window.location.href = selectedOption;
                                      }
                                    }
                                  </script>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="{{ url('/') }}">{{ trans('Home') }}</a></li>
                            <li><a href="about-us.html">{{ trans('About Us') }}</a></li>
                            <li><a href="{{ url('contact') }}">{{ trans('Contact Us') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <div class="user">
                            <i class="lni lni-user"></i>
                            @if (Auth::guard('customer')->check())
                                {{ Auth::guard('customer')->user()->name }}
                            @endif

                        </div>
                        @if (!Auth::guard('customer')->check())
                            <ul class="user-login">
                                <li>
                                    <a href="{{ url('login') }}">{{ trans('Sign In') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('register') }}">{{ trans('Register') }}</a>
                                </li>
                            </ul>
                        @endif

                        @if (Auth::guard('customer')->check())
                            <ul class="user-login">
                                <li>
                                    <a href="{{ url('user/logout') }}">{{ trans('Logout') }}</a>
                                </li>

                            </ul>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ URL::asset('assets/images/logo/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>{{ trans('All') }}</option>
                                        <option value="1">option 01</option>
                                        <option value="2">option 02</option>
                                        <option value="3">option 03</option>
                                        <option value="4">option 04</option>
                                        <option value="5">option 05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="{{ trans('Search') }}">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3> {{ trans('Hotline') }}:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">

                            @if (Auth::guard('customer')->check())
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                @livewire('front.view-cart')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    @yield('header')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>{{ trans('All Categories') }}</span>
                        <ul class="sub-category">


                            @foreach (\App\Models\Categorie::get() as $categorie)
                                <li><a href="{{ url('products_list') }}">{{ $categorie->name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" aria-label="Toggle navigation">{{ trans('Home') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dd-menu active collapsed" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">{{ trans('Shop') }}</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="{{ url('products_list') }}">{{ trans('Products list') }}</a>
                                        </li>
                                </li>
                                <li class="nav-item"><a href="{{ url('cart') }}">{{ trans('Cart') }}</a></li>
                                <li class="nav-item"><a href="{{ url('checkout') }}">{{ trans('Checkout') }}</a></li>
                            </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('contact') }}" aria-label="Toggle navigation">{{ trans('Contact Us') }}</a>
                            </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">{{ trans('Follow Us') }}:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
</header>
