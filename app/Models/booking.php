<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use SearchableTrait;
    use HasFactory;
    protected $guarded =[];

    public function user():BelongsTo{
        return $this->belongsTo(user::class)->withDefault();
    }

    public function produk():BelongsTo{
        return $this->BelongsTo(produk::class)->withDefault();
    }

    protected $searchable = [
        'columns' => [
            'Users.name' => 10,
            'Users.nik' => 10,
            'produks.jenis' => 10,

        ],
        'joins' => [
            'Users' => ['Users.id','bookings.user_id'],
            'produks' => ['produks.id','bookings.produk_id'],
        ],
    ];
}
