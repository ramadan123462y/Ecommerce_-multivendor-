<?php

namespace App\Listeners;

use App\Notifications\OrederCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendMail
{

    public function __construct()
    {
        //
    }


    public function handle($event)
    {

        Notification::send(Auth::guard('customer')->user(), new OrederCreatedNotification());
    }
}
