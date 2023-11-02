<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalingHarian extends Model
{
    use HasFactory;

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    
    public function pembimbingLapangan(){
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
