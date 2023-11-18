<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'id_user',
        'jenis_kelamin',
        'nip_lama',
        'nip_baru',
        'email',
        'no_hp',
        'foto'
    ];
    protected $table = 'dosen_pembimbings';

    
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'info'); //untuk mendefinisikan hubungan antara tabel mahasiswas dan users,
    }
}
