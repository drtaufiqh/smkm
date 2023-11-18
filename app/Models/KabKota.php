<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabKota extends Model
{
    use HasFactory;
    
    protected $fillable = ['kode', 'nama', 'akronim', 'id_prov', 'created at', 'updated at'];
    protected $table = 'kab_kotas'; 
    public $timestamp = false;

    public function prov(){
        return $this->belongsTo(Provinsi::class, 'id_prov');
    }
}
