<?php

namespace App\Imports;

use Config\Email;
use App\Models\User;
use App\Models\Instansi;
use App\Models\Finalisasi;
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
        // Mencari user berdasarkan email
        $user = User::where('email', $row['email'])->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$user) {
            $user = User::create([
                'role' => 'mhs',
                'email' => $row['email'],
                'username' => substr($row['email'], 0, 8),
                'password' => bcrypt('password'),
            ]);
        }

        // Update data user
        $user->update([
            'username' => substr($row['email'], 0, 8),
        ]);

        // Hapus record Instansi yang ada sebelumnya
        Instansi::where('id_user', $user->id)->delete();

        // buat finalisasi
        $finalisasi = new Finalisasi(['created_at' => now()]);
        $finalisasi->save();
    
        // Insert data Instansi yang baru
        Instansi::create([
            'id_user' => $user->id,
            'nama' => $row['nama'],
            'alamat_lengkap' => $row['alamat_lengkap'],
            'kode_kabkota' => $row['kode_kabupatenkota'],
            'id_finalisasi_provinsi' => $finalisasi->id,
            'is_prov' => 1
        ]);
    
        return $user->instansi; // atau sesuai kebutuhan Anda
    }
}
