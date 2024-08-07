<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ketProduksi extends Model
{
    protected $table = 'ketproduksi';
    protected $fillable=[
        'id_produk',
        'keterangan'
    ];
    use HasFactory;
}
