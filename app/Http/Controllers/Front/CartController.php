<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        //
    }
    public function add_cart(Request $request)
    {
        if (!(Auth::guard('customer')->check())) {

            flash()->addError("Please login First");
            return redirect()->back();
        }


        if (!(Cart::where('customer_id', Auth::guard('customer')->user()->id)->first())) {

            $cart = Cart::create([

                'customer_id' => Auth::guard('customer')->user()->id

            ]);
        }

        $cart_id = Customer::find(Auth::guard('customer')->user()->id)->cart->id;


        Cartitem::create([
            'cart_id' => $cart_id,
            'product_id' => $request->product_id,
            'colore_id' => isset($request->colore_id) ? $request->colore_id : null,
            'quantity' => isset($request->quantity) ? $request->quantity : 1,
            'subtotal'=> isset($request->quantity) ? $request->quantity : 1
        ]);
    }






















    public function create()
    {
        //
    }


    // public function store(Request $request)
    // {
    //     if (!(Auth::guard('customer')->check())) {

    //         flash()->addError("Please login First");
    //         return redirect()->back();
    //     }


    //     if (!(Cart::where('customer_id', Auth::guard('customer')->user()->id)->first()->id)) {

    //         $cart = Cart::create([

    //             'customer_id' => Auth::guard('customer')->user()->id

    //         ]);
    //     }else{
    //   return      Customer::find(Auth::guard('customer')->user()->id)->cart;



    //     }
    // }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
