<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeductProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(OrderCreated $event)

    {
        foreach ($event->cart->cartitems as $item) {
            $product = Product::find($item->product_id);
            $product->update([

                'quantity' => ($product->quantity) - ($item->quantity)

            ]);
        }
    }
}
