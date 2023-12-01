<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositieProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(\App\Repositories\Product\CartInterface::class, function () {
            return new \App\Repositories\Product\ProductModel();
        });
    }


    public function boot()
    {
        //
    }
}
