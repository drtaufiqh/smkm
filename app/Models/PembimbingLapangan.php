<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'jenis_kelamin',
        'nip_lama',
        'nip_baru',
        'golongan',
        'jabatan',
        'email',
        'no_hp',
        'id_instansi',
        'foto'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }
}
