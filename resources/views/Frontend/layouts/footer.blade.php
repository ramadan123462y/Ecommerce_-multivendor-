<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ URL::asset('assets/images/logo/white-logo.svg') }}" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                {{ trans('Subscribe to our Newsletter') }}
                                <span>{{ trans('Get all the latest information, Sales and Offers') }}.</span>
                            </h4>
                            <div class="newsletter-form-head">
                                <form action="#" method="get" target="_blank" class="newsletter-form">
                                    <input name="EMAIL" placeholder="{{ trans('Email address here') }}..." type="email">
                                    <div class="button">
                                        <button class="btn">{{ trans('Subscribe') }}<span class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>{{ trans('Get In Touch With Us') }}</h3>
                            <p class="phone">{{ trans('Phone') }}: +1 (900) 33 169 7720</p>
                            <ul>
                                <li><span>{{ trans('Monday-Friday') }}: </span> 9.00 am - 8.00 pm</li>
                                <li><span>{{ trans('Saturday') }}: </span> 10.00 am - 6.00 pm</li>
                            </ul>
                            <p class="mail">
                                <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer our-app">
                            <h3>{{ trans('Our Mobile App') }}</h3>
                            <ul class="app-btn">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-apple"></i>
                                        <span class="small-title">{{ trans('Download on the') }}</span>
                                        <span class="big-title">{{ trans('App Store') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-play-store"></i>
                                        <span class="small-title">{{ trans('Download on the') }}</span>
                                        <span class="big-title">{{ trans('Google Play') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>{{ trans('Information') }}</h3>
                            <ul>
                                <li><a href="javascript:void(0)">{{ trans('About Us') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Contact Us') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Downloads') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Sitemap') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('FAQs Page') }}</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>{{ trans('Shop Departments') }}</h3>
                            <ul>
                                <li><a href="javascript:void(0)">{{ trans('Computers & Accessories') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Smartphones & Tablets') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('TV, Video & Audio') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Cameras, Photo & Video') }}</a></li>
                                <li><a href="javascript:void(0)">{{ trans('Headphones') }}</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        <div class="payment-gateway">
                            <span>{{ trans('We Accept') }}:</span>
                            <img src="{{ URL::asset('assets/images/footer/credit-cards-footer.png') }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>{{ trans('Designed and Developed by') }}<a href="https://graygrids.com/" rel="nofollow"
                                    target="_blank">{{ trans('GrayGrids') }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="socila">
                            <li>
                                <span>{{ trans('Follow Us On') }}:</span>
                            </li>
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
