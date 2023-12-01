<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Store;
use App\Notifications\SallerOrders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendDatbaseOrdersTosallaer
{

    public function __construct()
    {
        //
    }


    public function handle(OrderCreated $event)
    {
        foreach ($event->orders_notification as $order) {

            Notification::send(Store::find($order->store_id), new SallerOrders($order));
        }
    }
}
