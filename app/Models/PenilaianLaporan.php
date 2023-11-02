<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianLaporan extends Model
{
    use HasFactory;
    
    public function laporanAkhir()
    {
        return $this->belongsTo(LaporanAkhir::class);
    }
}
