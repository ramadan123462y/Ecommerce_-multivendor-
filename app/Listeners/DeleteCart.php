<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeleteCart
{

    public function __construct()
    {
        //
    }


    public function handle(OrderCreated $event)
    {
        DB::table('cartitems')->where('cart_id', $event->cart->id)->delete();
    }
}
