<?php

namespace App\Listeners;

use App\Events\ProductStatusChanged;
use App\Models\User;
use App\Notifications\ProductStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductStatusNotification
{
    public function __construct()
    {
        //
    }

    public function handle(ProductStatusChanged $event)
    {
        \Log::info("Listener dipanggil untuk produk: " . $event->produk->id);
        $user = User::where('role', '=', 'quality control')->first();

        if ($user) {
            \Log::info("Mengirim notifikasi ke user: " . $user->id);
            $user->notify(new ProductStatusNotification($event->produk));
        } else {
            \Log::warning("Tidak ada user dengan role 'quality control'");
        }
    }

}
