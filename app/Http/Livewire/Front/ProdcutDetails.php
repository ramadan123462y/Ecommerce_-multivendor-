<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;
use App\Models\Cartitem;

use App\Models\Customer;
use GrahamCampbell\ResultType\Success;

class ProdcutDetails extends Component
{

    public $product;
    public $colore_id;
    public $quantity;




    protected $rules = [
        'colore_id' => 'required',
        'quantity' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.front.prodcut-details');
    }


    public function add_cart($product_id, $price)
    {



        $this->validate();





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


        if ($product->quantity < $this->quantity) {

            flash()->addError("Product mount   is least ");
        } else {
            if ($item = Cartitem::where('cart_id', $cart_id)->where('product_id', $product_id)->first()) {

                $item->update([

                    'colore_id' => $this->colore_id,
                    'quantity' => $this->quantity,
                    'subtotal' => $price * $this->quantity

                ]);

                flash()->addSuccess("Product Updated  in cart");
            } else {
                Cartitem::create([
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'colore_id' => $this->colore_id,
                    'quantity' => $this->quantity,
                    'subtotal' => $price * $this->quantity
                ]);


                flash()->addSuccess("Prodcut Aded Sucessfully");
            }
        }

        // event----cart--------------

        $this->emit('view_cart');

        // event----cart--------------
    }
}
