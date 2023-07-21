<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['kamar_id','pengunjung_id','mulai','selesai'];
    public $timestamps = false;

    function pengunjung(){
        return $this->hasOne(Pengunjung::class, 'id', 'pengunjung_id');
    }
    function kamar(){
        return $this->hasOne(Kamar::class, 'id', 'kamar_id');
    }
}
