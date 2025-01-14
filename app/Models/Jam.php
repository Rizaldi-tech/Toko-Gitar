<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    protected $fillable = [
        'Gambar',
        'Merek',
        'Nama',
        'Stok',
        'Harga'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

}
