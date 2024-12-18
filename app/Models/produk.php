<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */

    use HasFactory;
    protected $guarded =[];

    protected $fillable =[
            'harga_asli',
            'harga_jual',
            'stok_sekarang',
            'stok_terjual',
            'jenis',
            'foto',
    ];

    public function transaksi() : hasMany {
        return $this ->hasMany(transaksi::class);
    }
    public function booking() : hasMany {
        return $this ->hasMany(booking::class);
    }
}
