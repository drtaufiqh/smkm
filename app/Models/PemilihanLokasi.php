<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilihanLokasi extends Model
{
    use HasFactory;

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pilihan1(){
        return $this->belongsTo(Instansi::class, 'id_pilihan_1');
    }

    public function pilihan2(){
        return $this->belongsTo(Instansi::class, 'id_pilihan_2');
    }

    public function instansiAjuan(){
        return $this->belongsTo(Instansi::class, 'id_instansi_ajuan');
    }

    public function instansiBanding(){
        return $this->belongsTo(Instansi::class, 'id_instansi_banding');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }
}
