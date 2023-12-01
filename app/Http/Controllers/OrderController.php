<?php

namespace App\Http\Controllers;

use App\Models\Delivered;
use App\Models\Order;
use App\Models\OrderAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index_saller()
    {
        $orders = Order::where('store_id', store_saller()->id)->with('customer', 'orderitems')->paginate(7);
        $orders->each(function ($order) {
            $order->total = $order->orderitems->sum(function ($orderitem) {
                return $orderitem->price * $orderitem->quintitie;
            });
        });
        return view('Saller.Orders.order', compact('orders'));
    }

    public function main_orders_admin()
    {
        $orders = OrderAdmin::with('customer')->paginate(7);
        return view('Admin.Orders.main_orders', compact('orders'));
    }

    public function show_map($id_order)

    {

        $order_delivered = OrderAdmin::with('delivered')->find($id_order)->delivered;

        return view('Admin.map_order', compact('order_delivered'));
    }

    public function update_order(Request $request)
    {

        $delivered = Delivered::where('orderadmin_id', $request->order_id)->first();

        $delivered->update([

            'x' => isset($request->x) ? $request->x : $delivered->x,
            'y' => isset($request->y) ? $request->y : $delivered->y,
            'status' => $request->status

        ]);
        flash()->addSuccess("Updated Sucessfully......! ");
        return redirect()->back();
    }
}
