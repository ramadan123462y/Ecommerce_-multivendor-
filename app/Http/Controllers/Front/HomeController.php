<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Store;
use App\Services\CurrencyService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class HomeController extends Controller
{

    public function index()
    {


        $products = Product::with('images', 'categorie')->Active()->latest()->take(8)->get();
        $sliders = Slider::all();
        return view('Frontend.index', compact('products', 'sliders'));
    }


    public function dashboard_Admin()
    {

        $last_orders = OrderItem::latest()->take(8)->get();





        return view('Admin.dashboard', compact('last_orders'));
    }


    public function dashboard_Saller()
    {
        $ids = store_saller()->orders()->pluck('id');
        $last_orders = OrderItem::wherein('order_id', $ids)->latest()->take(8)->get();
        return view('Saller.dashboard', compact('last_orders'));
    }
}
