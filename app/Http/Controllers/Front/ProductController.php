<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show($slug)
    {


        $product = Product::where('slug', $slug)->first();

        if (!$product) {

            abort(404);
        }
        return view('Frontend.prodcut_details', compact('product'));
    }
}
