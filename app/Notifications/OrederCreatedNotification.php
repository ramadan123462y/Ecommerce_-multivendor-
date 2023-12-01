<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrederCreatedNotification extends Notification
{
    use Queueable;


    public function __construct()
    {

    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Order')
            ->greeting('Mr'.$notifiable->name)
            ->line('A New Order')
            ->action('Go To Details', url('/'))
            ->line('Thank you for using our Ecommerce!');
    }


    public function toArray($notifiable)
    {
        return [];
    }
}
