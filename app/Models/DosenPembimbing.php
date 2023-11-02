<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class); //untuk mendefinisikan hubungan antara tabel mahasiswas dan users,
    }
}
