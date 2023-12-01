@extends('Frontend.layouts.master')

@section('title')
@endsection
@section('css')
    @livewireStyles
@endsection


@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ trans('Shop Grid') }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> {{ trans('Home') }}</a></li>
                        <li><a href="javascript:void(0)">{{ trans('Shop') }}</a></li>
                        <li>{{ trans('Shop Grid') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Product Grids -->



    @livewire('productdetails')

    <!-- End Product Grids -->


    @livewireScripts
@endsection
@section('scripts')
@endsection
