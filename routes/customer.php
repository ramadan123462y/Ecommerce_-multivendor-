<?php

use App\Http\Controllers\Auth\AuthCustomerController;
use App\Http\Controllers\Auth\SocailAuthController;
use App\Http\Controllers\ChangeCurrency;
use App\Http\Controllers\ChangeCurrencyController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\StripeController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




// ________________________ Auth With Google ________________________


Route::get('create_login_google', [SocailAuthController::class, 'create_login_google']);
Route::get('callback_login_google', [SocailAuthController::class, 'callback_login_google']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        // ________________________Payment Strip________________________

        // create($main_order)__________________________
        Route::get('order/pay/{main_order}', [StripeController::class, 'create'])->name('order.payments.create');


        Route::post('CreatePaymentIntent/{order_id}', [StripeController::class, 'CreatePaymentIntent'])->name('create.Payment.Intent');

        Route::get('paymetorder_status/{id_order}', [StripeController::class, 'retrive'])->name('paymet.order.status');


        // ________________________Change Currency________________________

        Route::post('change_currency', [ChangeCurrencyController::class, 'Change_Currency']);
        // ________________________ Contact _____________________


        Route::view('contact', 'Frontend.contact');
        Route::post('contact/store', [ContactController::class, 'store']);


        // ________________________Auth_customer________________________
        Route::view('login', 'Auth.LoginCustomer');
        Route::view('register', 'Auth.RegisterCustomer');



        Route::post('user/register', [AuthCustomerController::class, 'register']);
        Route::post('user/login', [AuthCustomerController::class, 'login']);
        // ________________________product details_____________________

        Route::get('prodcut_details/{slug}', [ProductController::class, 'show']);
        // ________________________ List_Products _____________________

        Route::view('products_list', 'Frontend.Product_list');


        // ______________________________Home____________________________
        Route::group(['controller' => HomeController::class], function () {

            Route::get('/', 'index');
        });


        //____________________________Authorization______________________
        Route::group(['middleware' => 'IsCustomer'], function () {

            Route::get('user/logout', [AuthCustomerController::class, 'destroy']);

            // _______________cart_______________________________________
            Route::view('cart', 'Frontend.Cart');

            // ____________________________Checkout______________________
            Route::group(['prefix' => 'checkout', 'controller' => CheckoutController::class], function () {


                Route::get('/', 'create');

                Route::post('store', 'store');
            });
        });
    }
);
