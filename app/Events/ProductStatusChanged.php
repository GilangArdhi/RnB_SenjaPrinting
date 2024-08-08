<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Produk;

class ProductStatusChanged implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $produk;

    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
        \Log::info("Event ProductStatusChanged dipanggil untuk produk: " . $produk->id);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('product-status');
    }
}
