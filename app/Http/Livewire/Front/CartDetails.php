<?php

namespace App\Http\Livewire\Front;

use App\Models\Cart as ModelCart;
use App\Models\Cartitem;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartDetails extends Component
{
    public $cart_items = [];
    public $total_items = 0;

    protected $listeners = ['render' => 'render'];


    public function render()
    {
        $cart = ModelCart::where('customer_id', Auth::guard('customer')->user()->id)->first();
        $total_items = 0;
        $cart_items = [];
        if ($cart) {

            $cart_items = $cart->cartitems;

            $this->cart_items =  $cart_items;


            $total_items = 0;


            foreach ($this->cart_items as $item) {


                $total_items += ($item->subtotal) * ($item->quantity);
            }
            $this->total_items = $total_items;
        }


        return view('livewire.front.cart-details', ['cart_items', $cart_items, 'total_items', $total_items]);
    }




    public function increase_quantity($id_cartitem)
    {

        $cart_item = Cartitem::find($id_cartitem);
        $quantity = $cart_item->quantity;

        $cart_item->update([
            'quantity' => $quantity + 1,

        ]);


        $this->emit('view_cart');

        flash()->addSuccess("Increasement Sucessfully");
    }
    public function decrease_quantity($id_cartitem)
    {

        $cart_item = Cartitem::find($id_cartitem);
        $quantity = $cart_item->quantity;
        $cart_item->update([
            'quantity' => $quantity - 1
        ]);


        $this->emit('view_cart');
        flash()->addSuccess("Decrease Sucessfully");
    }


    public function delete_item($id_cartitem)
    {

        $item = Cartitem::find($id_cartitem);
        $item->delete();

        $this->emit('view_cart');
        flash()->addSuccess("Deleted Sucessfully");
    }
}
