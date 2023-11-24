<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalisasi extends Model
{
    use HasFactory;

    protected $table = 'finalisasis';

    protected $fillable = [
        'finalisasi_penentuan_lokasi_admin',
        'finalisasi_banding_lokasi_admin',
        // Kolom-kolom lain yang mungkin ada di tabel ini
    ];

    // Metode untuk memeriksa apakah semua record memiliki nilai 1 pada kolom finalisasi_penentuan_lokasi_admin
    public static function isFinalisasiDone()
    {
        $totalRows = self::count();

        // Jika jumlah baris di tabel adalah 0, kembalikan false
        if ($totalRows === 0) {
            return false;
        }

        // Jika ada baris dan semua record memiliki nilai 1 pada kolom finalisasi_penentuan_lokasi_admin
        return self::where('finalisasi_penentuan_lokasi_admin', '=', 1)->count() === $totalRows;
    }

    public static function isFinalisasiBandingDone()
    {
        $totalRows = self::count();

        // Jika jumlah baris di tabel adalah 0, kembalikan false
        if ($totalRows === 0) {
            return false;
        }

        // Jika ada baris dan semua record memiliki nilai 1 pada kolom finalisasi_penentuan_lokasi_admin
        return self::where('finalisasi_banding_lokasi_admin', '=', 1)->count() === $totalRows;
    }

}
