<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabKota extends Model
{
    use HasFactory;

    public function prov(){
        return $this->belongsTo(Provinsi::class, 'id_prov');
    }
    
    public function kecamatan(){
        return $this->hasOne(KabKota::class);
    }
}
