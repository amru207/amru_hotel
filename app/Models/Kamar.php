<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = ['no_kamar','wifi','ac','jumlah_kasur','harga'];
    public $timestamps = false;

    function pengunjungs(){
        return $this->hasMany(Booking::class, 'pengunjung_id', 'id');
    }
}
