<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    
    protected $fillable = ['kode', 'nama', 'akronim', 'id_kabkota', 'created at', 'updated at'];
    protected $table = 'kecamatans'; 
    public $timestamp = false;

    public function kabKota(){
        return $this->belongsTo(KabKota::class, 'id_kabkota');
    }
}
