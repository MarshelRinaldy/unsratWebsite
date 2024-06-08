<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

 
    protected $table = 'pesanan';


    protected $fillable = [
        'pelanggan_id',
        'meja',
        'status_pesanan',
    ];


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function listPesanan()
    {
        return $this->hasMany(ListPesanan::class, 'pesanan_id');
    }
}
