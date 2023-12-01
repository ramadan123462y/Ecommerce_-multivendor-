<?php

namespace App\Providers;

use App\Http\Controllers\Front\CartController;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{

    public function register()
    {
        app()->bind('cart', function () {
            return new CartController;
        });
    }


    public function boot()
    {
        //
    }
}
