<?php

use App\Models\Saller;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('saller')) {
    function saller()
    {


        return   Auth::guard('saller')->user();
    }
}
if (!function_exists('admin')) {
    function admin()
    {


        return   Auth::guard('web')->user();
    }
}
if (!function_exists('format')) {
    function format($mount)
    {
        if (Session::has('rate_currency') && Session::has('type_currency')) {

            $mount = $mount * (Session::get('rate_currency'));
            $currency = Session::get('type_currency');
        } else {

            $currency = "USD";
            $mount = $mount * 1;
        }

        $formatter = new \NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($mount, $currency);
    }
}


if (!function_exists('store_saller')) {
    function store_saller()
    {

        $saller = saller();
        return Saller::find($saller->id)->store;
    }
}
if (!function_exists('store_name')) {
    function store_name()
    {
    }
}
