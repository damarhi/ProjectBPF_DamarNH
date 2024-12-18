<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;


class transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiFactory> */
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
            'Users' => ['Users.id','transaksis.user_id'],
            'produks' => ['produks.id','transaksis.produk_id'],
        ],
    ];
}
