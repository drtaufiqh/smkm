<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable =['id_mhs','nilai_laporan_dospem','nilai_laporan_pemlap','nilai_kinerja','nilai_bimbingan','nilai_akhir','created_at','updated_at'];
    protected $table ='penilaians';
    public static $rules = [
        'id_mhs' => 'exists:mahasiswas,id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
