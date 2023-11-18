<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'jam',
        'lokasi',
        'satuan',
        'link',
        'id_dosen_pembimbing'
    ];
    protected $table = 'jadwal_bimbingans';


    public function dosenPembimbing(){
        return $this->belongsTo(DosenPembimbing::class, 'id_dosen_pembimbing');
    }
}
