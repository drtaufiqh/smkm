<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function jurnalingBulanan(){
        return $this->hasMany(JurnalingBulanan::class);
    }

    public function jurnalingHarian(){
        return $this->hasMany(JurnalingHarian::class);
    }
}
