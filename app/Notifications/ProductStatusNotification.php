<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ProductStatusNotification extends Notification
{
    use Queueable;

    private $produk;

    public function __construct($produk)
    {
        $this->produk = $produk;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Produk {$this->produk->id} sudah {$this->produk->status}",
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => "Produk {$this->produk->id} sudah {$this->produk->status}",
        ]);
    }
}