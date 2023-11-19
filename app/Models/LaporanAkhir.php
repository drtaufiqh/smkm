<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkhir extends Model
{
    use HasFactory;
    
    protected $fillable =['id_mhs','laporan_awal','komentar_pemlap','approval_awal_pemlap','approval_awal_dospem','laporan_final','approval_akhir_pemlap','approval_akhir_dospem','approval_akhir_kampus','nilai_akhir_pemlap','nilai_akhir_dospem','created_at','updated_at'];
    protected $table ='laporan_akhirs';
    public static $rules = [
        'id_mhs' => 'exists:mahasiswas,id',
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }
}
