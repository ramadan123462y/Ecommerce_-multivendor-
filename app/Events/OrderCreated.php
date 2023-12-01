<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $cart;
    public $orders_notification;


    public function __construct($cart, $orders_notification)
    {
        $this->cart = $cart;
        $this->orders_notification = $orders_notification;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
