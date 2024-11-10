<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam_id',
        'Tanggal_transaksi',
        'Nama_pembeli',
        'Jumlah_barang',
        'Total_pembayaran'
    ];
    
    public function jam()
    {
        return $this->belongsTo(Jam::class);
    }

}
