<?php

namespace App\Models;
use App\Events\ProductStatusChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'id',
        'namaPemesan',
        'asalPemesan',
        'namaProduk',
        'jmlPesanan',
        'ukuran',
        'bahan',
        'warna',
        'desain',
        'jeniSablon',
        'status'
    ];

    protected static function booted()
    {
        static::updated(function ($produk) {
            if ($produk->isDirty('status') && $produk->status == 'selesai') {
                event(new ProductStatusChanged($produk));
            }
        });
    }
    use HasFactory;
}
