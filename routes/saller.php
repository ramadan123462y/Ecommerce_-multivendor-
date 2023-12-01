<?php

use App\Http\Controllers\Auth\AuthSallerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Saller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




//   ________________________auth  profile_____________________
Route::group(['prefix' => 'saller', 'middleware' => 'guest'], function () {
    Route::view('register', 'Auth.RegisterSaller');
    Route::view('login', 'Auth.LoginSaller');
});

Route::post('saller/check', [AuthSallerController::class, 'login']);
Route::post('saller/save', [AuthSallerController::class, 'register']);

// ________________________Authorization___________________


Route::group(['prefix' => 'saller', 'middleware' => 'IsSaller'], function () {


    // ________________________profile________________________


    Route::post('logout', [AuthSallerController::class, 'destroy']);
    Route::get('profile', [ProfileController::class, 'edit_profile_saller']);
    Route::post('profile/update', [ProfileController::class, 'update_profile_saller']);
    Route::post('profile/updatepassword', [ProfileController::class, 'update_password_saller']);
    Route::get('dashboard', [HomeController::class, 'dashboard_Saller']);


    // ________________________product________________________
    Route::resource('product', ProductController::class);
    Route::get('product/delete/{id}', [ProductController::class, 'destroy']);


    // ________________________ orders ________________________

    Route::get('orders', [OrderController::class, 'index_saller']);
});
