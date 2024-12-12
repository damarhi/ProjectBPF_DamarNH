<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pengguna extends Model
{
    /** @use HasFactory<\Database\Factories\PenggunaFactory> */
    use HasFactory;
    protected $guarded =[];
    
    public function transaksi() : hasMany {
        return $this ->hasMany(transaksi::class);
    }
}
