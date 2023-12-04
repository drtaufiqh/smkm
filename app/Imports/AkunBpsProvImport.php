<?php

namespace App\Imports;

use Config\Email;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\PemilihanLokasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AkunBpsProvImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // // Mencari user berdasarkan email
        // $user = User::where('email', $row['email'])->first();

        // // Jika user tidak ditemukan, buat user baru
        // if (!$user) {
        //     $user = User::create([
        //         'role' => 'mhs',
        //         'email' => $row['email'],
        //         'username' => $row['nim'],
        //         'password' => bcrypt($row['nim']),
        //     ]);
        // }

        // // Update data user
        // $user->update([
        //     'username' => $row['nim'],
        // ]);

        // // Hapus record Mahasiswa yang ada sebelumnya
        // Mahasiswa::where('id_user', $user->id)->delete();
        // Mahasiswa::where('email', $row['email'])->delete();
    
        // // Insert data Mahasiswa yang baru
        // Mahasiswa::create([
        //     'id_user' => $user->id,
        //     'nama' => $row['nama'],
        //     'nim' => $row['nim'],
        //     'email' => $row['email'],
        //     'jenis_kelamin' => $row['jenis_kelamin'],
        //     'kelas' => $row['kelas'],
        // ]);

        // PemilihanLokasi::create([
        //     'id_mhs' => Mahasiswa::where('id_user', $user->id)->first()->id,
        // ]);
    
        // return $user->mahasiswa; // atau sesuai kebutuhan Anda
    }
}
