<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kecamatanAlamat1(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan_alamat_1');
    }

    public function kecamatanAlamat2(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan_alamat_2');
    }

    public function dosenPembimbing(){
        return $this->belongsTo(DosenPembimbing::class,'id_dosen_pembimbing');
    }

    public function pembimbingLapangan(){
        return $this->belongsTo(PembimbingLapangan::class,'id_pembimbing_lapangan');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class,'id_instansi');
    }

    public function penilaian(){
        return $this->hasOne(Penilaian::class);
    }

    public function penilaianBimbingan(){
        return $this->hasOne(PenilaianBimbingan::class);
    }

    public function penilaianKinerja(){
        return $this->hasOne(PenilaianKinerja::class);
    }

    public function penilaianLaporan(){
        return $this->hasOne(PenilaianKinerja::class)->hasOne(PenilaianLaporan::class);
    }

    public function laporanAkhir(){
        return $this->hasOne(LaporanAkhir::class);
    }

    public function pemilihanLokasi(){
        return $this->hasOne(PemilihanLokasi::class);
    }

    public function jurnalingBulanan(){
        return $this->hasMany(JurnalingBulanan::class);
    }

    public function jurnalingHarian(){
        return $this->hasMany(JurnalingHarian::class);
    }
}
