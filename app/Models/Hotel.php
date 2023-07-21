<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat','harga','deskripsi'];
    public $timestamps = false;

    function pengunjungs(){
        return $this->hasMany(Booking::class, 'pengunjung_id', 'id');
    }
}
