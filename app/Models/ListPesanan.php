<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPesanan extends Model
{
    use HasFactory;

  
    protected $table = 'list_pesanan';

  
    protected $fillable = [
        'pesanan_id',
        'menu_id',
        'quantity',
    ];

   
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
