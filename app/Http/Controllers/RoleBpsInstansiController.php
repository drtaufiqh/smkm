<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PembimbingLapangan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class RoleBpsInstansiController extends Controller
{
    public function dashboard()
    {
        $mhs1 = Mahasiswa::whereNotNull('id_pembimbing_lapangan')->get();
        $mhs2 = Mahasiswa::whereNull('id_pembimbing_lapangan')->get();
        $pl1 = Mahasiswa::all();
        $pl2 = PembimbingLapangan::all();

        $mhs1Count = $mhs1->count();
        $mhs2Count = $mhs2->count();
        $pl1Count = $pl1->count();
        $pl2Count = $pl2->count();

        return view('bps-instansi.dashboard', [
            'title' => 'Dashboard | Instansi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'mhs1' => $mhs1,
            'mhs2' => $mhs2,
            'pl1' => $pl1,
            'pl2' => $pl2,
            'mhs1Count' => $mhs1Count,
            'mhs2Count' => $mhs2Count,
            'pl1Count' => $pl1Count,
            'pl2Count' => $pl2Count
        ]);
    }

    public function mahasiswa()
    {
        return view('bps-instansi.mahasiswa', [
            'title' => 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function presensiMahasiswa()
    {
        return view('bps-instansi.presensimahasiswa', [
            'title' => 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function pembimbingLap()
    {
        return view('bps-instansi.pembimbinglap', [
            'title' => 'Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => '',
            'pembimbing_lapangans' => PembimbingLapangan::all()
        ]);
    }

    public function buatPembimbing()
    {
        return view('bps-instansi.buatpembimbing', [
            'title' => 'Akun Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => ''
        ]);
    }

    public function daftarBimbingan()
    {
        return view('bps-instansi.daftarbimbingan', [
            'title' => 'Daftar Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function editDaftarBimbingan()
    {
        return view('bps-instansi.editdaftarbimbingan', [
            'title' => 'Edit Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function tabelBimbingan()
    {
        return view('bps-instansi.tabelbimbingan', [
            'title' => 'Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => '',
            'pembimbing_lapangans' => PembimbingLapangan::all(),
        ]);
    }

    public function profil()
    {
        return view('bps-instansi.profil', [
            'title' => 'Profil | Instansi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }

    public function password()
    {
        return view('bps-instansi.password', [
            'title' => 'Profil | BPS Provinsi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }

    // public function ubah_password(Request $request, $id_user)
    // {
    //     $data = [
    //         'password' => $request->input('password_baru')
    //     ];

    //     User::where('id',$id_user)->update($data);
    //     return redirect()->to('/bps-instansi/password')->with('success', 'Berhasil mengubah password');
    // }

    public function ubah_password(Request $request, $id_user)
    {
        $user = User::find($id_user);
        $email = $request->input('email');
        $password_lama = $request->input('password_lama');
        
        // if(bcrypt($request->input('password_lama')) != $user->password){
        //     return redirect()->to('/mahasiswa/password')->with('failed', 'Password lama salah');
        // }

        // if (Auth::user()->getAuthPassword() != bcrypt($request->input('password_lama'))) {
        //     // Password benar
        // } 

        if (!Auth::attempt(['email' => $email, 'password' => $password_lama])) {
            return redirect()->to('/bps-instansi/password')->with('failed', 'Password lama salah');
        }

        $request->validate([
            'password_baru'=>['required'],
            'ulangi_password_baru'=>['required','same:password_baru']
        ], [
            'password_baru.required' => "Masukkan Password Baru",
            'ulangi_password_baru.required' => "Masukkan Konfirmasi Password",
            'ulangi_password_baru.same' => "Konfirmasi Password tidak sama dengan Password baru"
        ]);

        $data = [
            'password' => bcrypt($request->input('password_baru'))
        ];

        $user->update($data);
        return redirect()->to('/bps-instansi/password')->with('success', 'Berhasil mengubah password');
    }
}
