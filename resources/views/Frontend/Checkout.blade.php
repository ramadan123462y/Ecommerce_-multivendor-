@extends('Frontend.layouts.master')

@section('title')
@endsection
@section('css')
@endsection


@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ trans('checkout') }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> {{ trans('Home') }}</a></li>
                        <li><a href="index.html">{{ trans('Shop') }}</a></li>
                        <li>{{ trans('checkout') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">

                            <form action="{{ url('checkout/store') }}" method="POST">
                                @csrf
                                <li>

                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">{{ trans('Your Personal Details') }} </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('User Name') }}</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="first_name"
                                                                placeholder="First Name">
                                                                <x-inline-validation name="first_name" ></x-inline-validation>
                                                        </div>
                                                        <input type="hidden" name="type" value="billing">
                                                        <input type="hidden" name="total_items"
                                                            value="{{ $total_items }}">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="last_name" placeholder="{{ trans('Last Name') }}">
                                                            <x-inline-validation name="last_name" ></x-inline-validation>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Email Address') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="email" placeholder="Email Address">
                                                        <x-inline-validation name="email" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Phone Number') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="phone_name" placeholder="Phone Number">
                                                        <x-inline-validation name="phone_name" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Mailing Address') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="street_address"
                                                            placeholder="Mailing Address">
                                                            <x-inline-validation name="street_address" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('City') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="city" placeholder="City">
                                                        <x-inline-validation name="city" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Post Code') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="postal_code" placeholder="Post Code">
                                                        <x-inline-validation name="postal_code" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Country') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="country" placeholder="Country">
                                                        <x-inline-validation name="country" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Region/State') }}</label>
                                                    <div class="select-items">
                                                        <select name="state" class="form-control">

                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->country_name }}">
                                                                    {{ $country->country_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        <x-inline-validation name="state" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>{{ trans('My delivery and mailing addresses are the same') }}.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="button" class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">{{ trans('next') }}
                                                        {{ trans('step') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">{{ trans('Shipping Address') }}</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('User Name') }}</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="first_name"
                                                                placeholder="First Name">
                                                                <x-inline-validation name="first_name" ></x-inline-validation>
                                                        </div>
                                                        <input type="hidden" name="type" value="shipping">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="last_name"
                                                                placeholder="{{ trans('Last Name') }}">
                                                                <x-inline-validation name="last_name" ></x-inline-validation>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Email Address') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="email" placeholder="Email Address">
                                                        <x-inline-validation name="email" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Phone Number') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="phone_name"
                                                            placeholder="Phone Number">
                                                            <x-inline-validation name="phone_name" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Mailing Address') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="street_address"
                                                            placeholder="Mailing Address">
                                                            <x-inline-validation name="street_address" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('City') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="city" placeholder="City">
                                                        <x-inline-validation name="city" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Post Code') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="postal_code" placeholder="Post Code">
                                                        <x-inline-validation name="postal_code" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Country') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="country" placeholder="Country">
                                                        <x-inline-validation name="country" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Region/State') }}</label>
                                                    <div class="select-items">
                                                        <select name="state" class="form-control">

                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->country_name }}">
                                                                    {{ $country->country_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        <x-inline-validation name="state" ></x-inline-validation>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>{{ trans('My delivery and mailing addresses are the same') }}.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">{{ trans('next') }}
                                                        {{ trans('step') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>

                            </form>

                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">{{ trans('Payment Info') }}</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Cardholder Name') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Cardholder Name">
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>{{ trans('Card Number') }}</label>
                                                    <div class="form-input form">
                                                        <input id="credit-input" type="text"
                                                            placeholder="0000 0000 0000 0000">
                                                        <img src="assets/images/payment/card.png" alt="card">
                                                    </div>
                                                </div>
                                                <div class="payment-card-info">
                                                    <div class="single-form form-default mm-yy">
                                                        <label>{{ trans('Expiration') }}</label>
                                                        <div class="expiration d-flex">
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="MM">
                                                            </div>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="YYYY">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>CVC/CVV <span><i
                                                                    class="mdi mdi-alert-circle"></i></span></label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="***">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-form form-default button">
                                                    <button class="btn">{{ trans('pay now') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">




                        @livewire('total-oreder')
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection
@section('scripts')
@endsection
