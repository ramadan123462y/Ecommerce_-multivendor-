<?php

use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TranactionController;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {


    Route::view('admin/login', 'Auth.loginAdmin');
    Route::post('admin/check', [AuthAdminController::class, 'login']);
});


Route::group(['prefix' => 'admin', 'middleware' => 'IsAdmine'], function () {


    // ________________________profile________________________

    Route::get('dashboard', [HomeController::class, 'dashboard_Admin']);
    Route::get('profile', [ProfileController::class, 'edit_profile_admin']);
    Route::post('update', [ProfileController::class, 'update_profile_admin']);
    Route::post('update_password', [ProfileController::class, 'update_password_admin']);
    Route::post('logout', [AuthAdminController::class, 'destroy']);

    // ________________________categories_____________________
    Route::group(['prefix' => 'categorie'], function () {
        Route::view('create', 'Admin.Category.AddCategory');
        Route::view('/', 'Admin.Category.process_categorie');
        Route::get('edit/{id}', [CategorieController::class, 'edit']);
        Route::post('update', [CategorieController::class, 'update']);
    });
    // ________________________products_______________________

    Route::resource('product', ProductController::class);
    Route::get('product/delete/{id}', [ProductController::class, 'destroy']);

    // ________________________sliders________________________

    Route::resource('slider', SliderController::class);
    // ________________________brands________________________
    Route::view('brand', 'Admin.Brand.brand');
    // ________________________colores________________________
    Route::view('colore', 'Admin.colore');
    // ________________________ orders ________________________
    Route::get('orders', [OrderController::class, 'main_orders_admin']);
    // ________________________ Transactions Stripe  ________________________


    Route::get('Transactions', [TranactionController::class, 'index']);


    // ________________________ Creaditional Stripe  ________________________

    Route::get('credential', [CredentialController::class, 'create_Credential']);


    Route::post('credential/store', [CredentialController::class, 'store']);
    // ________________________ Get Location   ________________________


    Route::get('location_order/{id_order}', [OrderController::class, 'show_map']);
    // ________________________ Update Order  ________________________

    Route::post('update_order', [OrderController::class, 'update_order']);
});
