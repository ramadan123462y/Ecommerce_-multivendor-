<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Listeners\DeductProduct;
use App\Listeners\DeleteCart;
use App\Listeners\SendDatbaseOrdersTosallaer;
use App\Listeners\SendMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreated::class => [
            DeductProduct::class,
            DeleteCart::class,
            SendMail::class,
            SendDatbaseOrdersTosallaer::class
        ],
    ];


    public function boot()
    {
        //
    }


    public function shouldDiscoverEvents()
    {
        return false;
    }
}
