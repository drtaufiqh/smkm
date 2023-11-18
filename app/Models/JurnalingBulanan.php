<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalingBulanan extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'id',
    //     'id_mhs',
    //     'id_penilai',
    //     'periode',
    //     'uraian_kegiatan',
    //     'satuan',
    //     'kuantitas_target',
    //     'kuantitas_realisasi',
    //     'tingkat_kuantitas',
    //     'keterangan'
    // ];
    protected $guarded = ['id'];
    protected $table = 'jurnaling_bulanans';


    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    
    public function pembimbingLapangan(){
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
