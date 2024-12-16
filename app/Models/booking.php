<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    protected $guarded =[];

    public function user():BelongsTo{
        return $this->belongsTo(user::class)->withDefault();
    }

    public function produk():BelongsTo{
        return $this->BelongsTo(produk::class)->withDefault();
    }
}
