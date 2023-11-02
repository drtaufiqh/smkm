<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianBimbingan extends Model
{
    use HasFactory;

    
    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
