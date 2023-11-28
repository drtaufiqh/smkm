<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'id_user',
    //     'nama',
    //     'nim',
    //     'email',
    //     'no_hp',
    //     'foto',
    //     'jenis_kelamin',
    //     'alamat_1',
    //     'id_kecamatan_alamat_1',
    //     'alamat_2',
    //     'id_kecamatan_alamat_2',
    //     'bank',
    //     'an_bank',
    //     'no_rek',
    //     'id_dosen_pembimbing',
    //     'id_pembimbing_lapangan',
    //     'id_instansi',
    //     'created_at',
    //     'update_at'
    // ];
    protected $guarded = 0;
    protected $tables = 'mahasiswa';
    public static $rules = [
        'id_user' => 'exists:users,id',
        'id_kecamatan_alamat_1' => 'exists:kecamatans,id',
        'id_kecamatan_alamat_2' => 'exists:kecamatans,id',
        'id_dosen_pembimbing' => 'exists:dosen_pembimbings,id',
        'id_pembimbing_lapangan' => 'exists:pembimbing_lapangans,id',
        'id_instansi' => 'exists:instansis,id'
    ];

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
}
