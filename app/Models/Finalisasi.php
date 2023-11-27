<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Finalisasi extends Model
{
    use HasFactory;

    protected $table = 'finalisasis';

    protected $fillable = [
        'finalisasi_pemilihan_lokasi_bpsprov',
        // Kolom-kolom lain yang mungkin ada di tabel ini
    ];

    public static function isFinalisasiDone()
    {
        $totalRows = self::count();

        // Jika jumlah baris di tabel adalah 0, kembalikan false
        if ($totalRows === 0) {
            return false;
        }

        return self::where('finalisasi_pemilihan_lokasi_bpsprov', '=', 1)->count() === $totalRows;
    }
}