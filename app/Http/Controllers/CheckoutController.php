<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\CheckoutRequest;
use App\Listeners\DeductProduct;
use App\Listeners\DeleteCart;
use App\Models\Cartitem;
use App\Models\Coutrie;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\AddressOrder;
use App\Models\Delivered;
use App\Models\OrderAdmin;
use App\Models\Product;
use App\Models\Saller;
use App\Models\Store;
use App\Notifications\OrederCreatedNotification;
use App\Notifications\SallerOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use ReturnTypeWillChange;

class CheckoutController extends Controller
{
    public $sum;
    public function create()
    {
        $cart = Auth::guard('customer')->user()->cart;
        $total_items = 0;
        $cart_items = $cart->cartitems;
        $this->sum = $this->sum_total($cart_items, $total_items);
        $countries = Coutrie::all();
        return view('Frontend.Checkout', compact('total_items', 'cart_items', 'countries'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = Auth::guard('customer')->user()->cart;
        $cart_items = $cart->cartitems;

        $order_items =  $cart_items->groupBy('product.store_id')->all();
        $total_items = 0;
        $this->sum = $this->sum_total($cart_items, $total_items);
        $mount =  $this->sum;
        $main_order = $this->create_main_order($mount);
        Delivered::create([
            'orderadmin_id' => $main_order->id,
            'x' => 30.399789,
            'y' => -87.776899
        ]);

        foreach ($order_items as $store => $items) {

            // ___________________________________ Create_orders ____________
            $order = $this->create_order($store, $main_order->id);
            // ___________________________________ store_orders_in_array ____________

            // $orders_notification[] = $this->create_order($store);
            $orders_notification[] = $order;


            foreach ($items as $item) {
                $this->create_order_item($order, $item);
            }


            // ___________________________________ create_address_billing ____________
            $this->create_address('billing', $order, $request);
            // ___________________________________ create_address_shipping ____________


            $this->create_address('shipping', $order, $request);
        }





        // _____ Event Send mail Customers send notification tosaller orders   ____________

        event(new OrderCreated($cart, $orders_notification));


        flash()->addSuccess("Order Maked Sucessfully");
        return redirect()->route('order.payments.create', $main_order->id);
    }

    private function create_main_order($mount)
    {

        $main_order =  OrderAdmin::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'total' => $mount,
        ]);
        return $main_order;
    }




    private function create_address($type, $order, $request)
    {

        AddressOrder::create([
            'order_id' => $order->id,
            'type' => $type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_name' => $request->phone_name,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'state' => $request->state,
            'country' => $request->country
        ]);
    }



    private function create_order($store, $main_order_id)
    {


        $order = Order::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'store_id' => $store,
            'total' => 0,
            'payment_method' => 'payment_method',
            'orderadmin_id' => $main_order_id
        ]);
        return $order;
    }
    private function create_order_item($order, $item)
    {


        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'product_name' => $item->product->name,
            'price' => $item->subtotal,
            'quintitie' => $item->quantity
        ]);
    }

    private function sum_total($cart_items, $total_items)
    {

        foreach ($cart_items as $item) {


            $total_items += ($item->subtotal) * ($item->quantity);
        }
        return $total_items;
    }
}
