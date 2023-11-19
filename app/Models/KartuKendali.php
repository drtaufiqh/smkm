<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKendali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_bimbingan','id_mhs','pokok_bahasan', 'diketahui'
    ];

    public function bimbingan(){
        return $this->belongsTo(JadwalBimbingan::class, 'id_bimbingan');
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
