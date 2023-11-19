<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mhs',
        'nilai_k1',
        'nilai_k2',
        'nilai_k3',
        'nilai_k4',
        'nilai_k5',
        'nilai_k6',
        'nilai_k7',
        'nilai_k8',
        'nilai_k9',
        'nilai_k10'

    ];
    protected $table = 'penilaian_kinerjas';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
