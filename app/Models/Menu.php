<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

   
    protected $table = 'menu';

 
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'image',
        'status_menu',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function listPesanan()
    {
        return $this->hasMany(ListPesanan::class, 'menu_id');
    }
}
