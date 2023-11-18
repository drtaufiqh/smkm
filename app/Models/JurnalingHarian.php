<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalingHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mhs',
        'id_penilai',
        'tanggal',
        'deskripsi_pekerjaan',
        'kuantitas_volume',
        'kuantitas_satuan',
        'durasi_waktu',
        'pemberi_tugas',
        'status_penyelesaian',
        'status_final_mhs',
        'status_final_penilai'
    ];
    protected $table = 'jurnaling_harians';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class, 'id_penilai');
    }
}
