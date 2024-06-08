<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

  
    protected $table = 'pelanggan';

   
    protected $fillable = [
        'nama_awal',
        'nama_akhir',
        'email',
        'password',
        'mobile_number',
        'alamat',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}
