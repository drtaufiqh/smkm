<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'akronim', 'created at', 'updated at'];
    protected $table = 'provinsis'; 
    // public $timestamp = false;
    
    // protected $primaryKey = 'kode'; // Primary key custom
    // public $incrementing = false; // Tidak menggunakan incrementing
    // protected $keyType = 'string'; // Tipe data primary key
}
