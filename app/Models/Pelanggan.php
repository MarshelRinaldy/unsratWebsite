<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the table associated with the model
    protected $table = 'pelanggan';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'nama_awal',
        'nama_akhir',
        'email',
        'password',
        'mobile_number',
        'alamat',
    ];

    // Define the hidden attributes for arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define the casts for model attributes
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define the relationship with Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}
