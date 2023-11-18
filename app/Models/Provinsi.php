<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'akronim', 'created at', 'updated at'];
    protected $table = 'provinsis'; 
    public $timestamp = false;
}
