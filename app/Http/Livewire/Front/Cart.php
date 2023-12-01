<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Cartitem;

use App\Models\Customer;
use GrahamCampbell\ResultType\Success;

class Cart extends Component
{
    public $products = [];

    public function render()
    {

        return view('livewire.front.cart');
    }

    public function add_cart($product_id, $price, $colore_id = null, $quantity = 1)
    {


        if (!(Auth::guard('customer')->check())) {

            flash()->addError("Please login First");

            return redirect('login');
        }


        if (!(CartModel::where('customer_id', Auth::guard('customer')->user()->id)->first())) {

            $cart = CartModel::create([

                'customer_id' => Auth::guard('customer')->user()->id

            ]);
        }

        $cart_id = Customer::find(Auth::guard('customer')->user()->id)->cart->id;

        $product = Product::find($product_id);


        if ($product->quantity < $quantity) {

            flash()->addError("Product mount   is least ");
        } else {

            if (Cartitem::where('cart_id', $cart_id)->where('product_id', $product_id)->first()) {
                flash()->addError("Product already  in cart");
            } else {

                Cartitem::create([
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'colore_id'=>null,
                    'quantity' => $quantity,
                    'subtotal' => $price
                ]);

                // event----cart--------------

                $this->emit('view_cart');
                // event----cart--------------
                flash()->addSuccess("Prodcut Aded Sucessfully");
            }
        }
    }
}
