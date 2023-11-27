<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilihanLokasi extends Model
{
    use HasFactory;

    protected $fillable = ['id_mhs', 'id_pilihan_1', 'id_pilihan_2', 'alasan_pilihan_1', 'alasan_pilihan_2', 'id_instansi_ajuan', 'id_instansi_banding', 'alasan_banding', 'id_instansi', 'id_pengalihan', 'id_keterangan', 'created at', 'updated at'];
    protected $table = 'pemilihan_lokasis'; 
    public $timestamp = false;

    public static $rules = [
        'id_mhs' => 'exists:mahasiswas,id'
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
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

    public function instansiPengalihan(){
        return $this->belongsTo(Instansi::class, 'id_pengalihan');
    }

   
}
