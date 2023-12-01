<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart as ModelCart;
use App\Models\Cartitem;
use App\Models\Customer;

class ViewCart extends Component
{
    protected $listeners = ['view_cart' => 'render'];

    public $cart_items = [];
    public $count_items = 0;
    public $total_items = 0;



    public function render()
    {
        $cart = ModelCart::where('customer_id', Auth::guard('customer')->user()->id)->first();
        $total_items = 0;
        if ($cart) {
            $cart_items = $cart->cartitems;
            $this->cart_items =  $cart_items;
            $count_items = $cart->cartitems()->count();
            $this->count_items =  $count_items;
            $total_items = 0;
            foreach ($this->cart_items as $item) {
                $total_items += ($item->subtotal) * ($item->quantity);
            }
            $this->total_items = $total_items;

        }

        return view('livewire.front.view-cart', ['total_items',$total_items]);
    }

    public function delete_item($id_cartitem)
    {

        $item = Cartitem::find($id_cartitem);
        $item->delete();
        $this->emit('render');
        $this->emit('viewcarttotal');
        flash()->addSuccess("Deleted Sucessfully");
    }
}
