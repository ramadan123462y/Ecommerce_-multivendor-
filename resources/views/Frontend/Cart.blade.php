@extends('Frontend.layouts.master')

@section('title')
@endsection
@section('css')


<style>

    icon-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            vertical-align: middle;
        }

        .icon-sm {
            width: 2rem;
            height: 2rem;

        }
    </style>
    @livewireStyles
@endsection


@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ trans('Cart') }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> {{ trans('Home') }}</a></li>
                    <li><a href="index.html">{{ trans('Shop') }}</a></li>
                    <li>{{ trans('Cart') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
@livewire('front.cart-details')
<!--/ End Shopping Cart -->
@endsection

@section('scripts')
@livewireScripts
@endsection


