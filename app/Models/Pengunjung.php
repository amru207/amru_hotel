<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat','email','no_hp'];
    public $timestamps = false;

    function kamar(){
        // return $this->belongsTo(Booking::class, 'pengunjung_id', 'id');
        return $this->hasOne(Booking::class, 'pengunjung_id', 'id');
    }

}
