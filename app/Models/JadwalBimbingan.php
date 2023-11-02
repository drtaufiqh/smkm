<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;

    public function dosenPembimbing(){
        return $this->belongsTo(DosenPembimbing::class);
    }
}
