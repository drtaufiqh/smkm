<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKendali extends Model
{
    use HasFactory;

    public function jadwalBimbingan(){
        return $this->belongsTo(JadwalBimbingan::class);
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
}
