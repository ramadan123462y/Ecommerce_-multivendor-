<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalOreder extends Component
{

    public $cart_items;
    public  $total_items;

    protected $listeners = ['viewcarttotal' => 'render'];
    public function render()
    {
        $cart = Auth::guard('customer')->user()->cart;

        $total_items = 0;
        if ($cart) {

            $cart_items = $cart->cartitems;

            $this->cart_items =  $cart_items;


            $total_items = 0;


            foreach ($this->cart_items as $item) {


                $total_items += ($item->subtotal) * ($item->quantity);
            }
            $this->total_items = $total_items;
        }


        return view('livewire.total-oreder', ['cart_items', $cart_items, 'total_items', $total_items]);
    }
}
