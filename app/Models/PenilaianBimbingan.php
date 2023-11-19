<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianBimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mhs',
        'nilai_k1',
        'nilai_k2',
        'nilai_k3',
        'nilai_k4',
        'nilai_k5'

    ];
    protected $table = 'penilaian_bimbingans';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
