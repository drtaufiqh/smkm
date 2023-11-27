<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'id_user' => $row[1],
            'nama' => $row[2],
            'nim' => $row[3],
            'email' => $row[4],
            'no_hp' => $row[5],
            'foto' => $row[6],
            'jenis_kelamin' => $row[7],
            'alamat_1' => $row[8],
            'id_kecamatan_alamat_1' => $row[9],
            'kecamatan_1' => $row[10],
            'alamat_2' => $row[11],
            'id_kecamatan_alamat_2' => $row[12],
            'kecamatan_2' => $row[13],
            'bank' => $row[14],
            'an_bank' => $row[15],
            'no_rek' => $row[16],
            'id_dosen_pembimbing' => $row[17],
            'id_pembimbing_lapangan' => $row[18],
            'id_instansi' => $row[19],
        ]);
    }
}
