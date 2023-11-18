<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
    protected $fillable = ['id_user', 'nama', 'id_kecamatan', 'alamat_lengkap', 'is_prov', 'created_at', 'updated_at'];
    protected $tables = 'instansis';
    public static $rules = [
        'id_user' => 'exists:users,id',
    ];
}
