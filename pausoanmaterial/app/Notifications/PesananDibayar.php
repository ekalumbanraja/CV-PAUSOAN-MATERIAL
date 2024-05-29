<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PesananDibayar extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['database']; // Menggunakan driver database
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Pesanan Anda telah diproses.',
            'link' => '/transaction' 
        ];
    }
}