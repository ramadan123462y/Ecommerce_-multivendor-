<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ChangeCurrencyController extends Controller
{
    public $currencyService;



    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function Change_Currency(Request $request)
    {


        if (!Cache::has($request->to_currence)) {
            $rate_currency = $this->currencyService->Convert_Currency('USD', $request->to_currence);
            Cache::put($request->to_currence, $rate_currency, now()->addMinutes(60));
            Session::put('rate_currency', $rate_currency);
            Session::put('type_currency', $request->to_currence);
        } else {
            Cache::get($request->to_currence);
            Session::put('rate_currency', Cache::get($request->to_currence));
            Session::put('type_currency', $request->to_currence);
        }
        return  redirect()->back();
    }
}
