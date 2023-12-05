<?php

namespace App\Http\Controllers;

use App\Models\Finalisasi;
use App\Models\KabKota;
use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Mahasiswa;
use App\Models\KartuKendali;
use App\Models\LaporanAkhir;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JadwalBimbingan;
use App\Models\JurnalingHarian;
use App\Models\JurnalingBulanan;
use App\Models\PemilihanLokasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Ramsey\Collection\Set;

class RoleMahasiswaController extends Controller
{
    public function bandingLokasi()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        if ($pemilihan_lokasi->id_instansi_banding) {
            return redirect()->to('/mahasiswa/submitted-banding-lokasi');
        }

        $mahasiswas = Mahasiswa::all();
        $provId = $mhs->instansi->kabKota->provinsi->id;
        $instansis = Instansi::whereHas('kabKota.provinsi', function ($query) use ($provId) {
            $query->where('id', $provId);
        })->get();
        $pemilihan_lokasis = PemilihanLokasi::all();
        return view('mahasiswa.banding-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'provinsis' => Provinsi::all(),
            'kab_kotas' => KabKota::all(),
            'mahasiswas' => $mahasiswas,
            'instansis' => $instansis,
            'pemilihan_lokasis' => $pemilihan_lokasis
        ]);
    }

    public function bimbingan()
    {
        $jadwal_bimbingans = JadwalBimbingan::all();
        $kartu_kendalis = KartuKendali::all();

        return view('mahasiswa.bimbingan', [
            'title' => 'Bimbingan | Mahasiswa',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => 'jadwal',
            'jadwal_bimbingans' => $jadwal_bimbingans,
            'kartu_kendalis' => $kartu_kendalis
        ]);
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $jurnal = JurnalingHarian::whereNotNull('tanggal')->get();
        $finalisasi = Finalisasi::isFinalisasiPenentuanBpsProvDone();
        $sudah_magang = Finalisasi::isFinalisasiBandingBpsProvDone();

        $jurnalCount = $jurnal->count();

        return view('mahasiswa.index', [
            'title' => 'Dashboard | Mahasiswa',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'jurnaling_harians' => JurnalingHarian::all(),
            'mahasiswas' => $mahasiswas,
            'jurnal' => $jurnal,
            'jurnalCount' => $jurnalCount,
            'finalisasi' => $finalisasi,
            'sudah_magang' => $sudah_magang
        ]);
    }

    public function password()
    {
        return view('mahasiswa.password', [
            'title' => 'Profil | Mahasiswa',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }

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
            return redirect()->to('/mahasiswa/password')->with('failed', 'Password lama salah');
        }

        $request->validate([
            'password_baru' => ['required'],
            'ulangi_password_baru' => ['required', 'same:password_baru']
        ], [
            'password_baru.required' => "Masukkan Password Baru",
            'ulangi_password_baru.required' => "Masukkan Konfirmasi Password",
            'ulangi_password_baru.same' => "Konfirmasi Password tidak sama dengan Password baru"
        ]);

        $data = [
            'password' => bcrypt($request->input('password_baru'))
        ];

        $user->update($data);
        return redirect()->to('/mahasiswa/password')->with('success', 'Berhasil mengubah password');
    }

    public function jadwalBimbingan()
    {
        $jadwal_bimbingans = JadwalBimbingan::all();

        return view('mahasiswa.jadwal-bimbingan', [
            'title' => 'Jadwal Bimbingan',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => 'jadwal',
            'jadwal_bimbingans' => $jadwal_bimbingans,

        ]);
    }

    public function laporanAkhir()
    {
        $mahasiswas = Mahasiswa::all();
        $laporan_akhirs = LaporanAkhir::all();
        $pemilihan_lokasis = PemilihanLokasi::all();

        return view('mahasiswa.laporan-akhir', [
            'title' => 'Laporan Akhir | Mahasiswa',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => '',
            'mahasiswas' => $mahasiswas,
            'laporan_akhirs' => $laporan_akhirs,
            'pemilihan_lokasis' => $pemilihan_lokasis
        ]);
    }

    public function logBookBulanan()
    {
        return view('mahasiswa.log-book-bulanan', [
            'title' => 'Log Book | Mahasiswa',
            'sidebar' => 'log book',
            'circle_sidebar' => 'bulanan',
            'jurnaling_bulanans' => JurnalingBulanan::all()
        ]);
    }

    public function logBookHarian()
    {
        return view('mahasiswa.log-book-harian', [
            'title' => 'Log Book | Mahasiswa',
            'sidebar' => 'log book',
            'circle_sidebar' => 'harian',
            'jurnaling_harians' => JurnalingHarian::all()
        ]);
    }

    public function pemilihanLokasi()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        if (optional($pemilihan_lokasi)->pilihan1) {
            return redirect()->to('/mahasiswa/submitted-pemilihan-lokasi');
        }
        return view('mahasiswa.pemilihan-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'provinsis' => Provinsi::all(),
            'kab_kotas' => KabKota::all(),
            'instansis' => Instansi::all()
        ]);
    }

    public function submittedPemilihanLokasi(Request $request, $id_user)
    {
        $request->validate([
            'alamat_1' => ['required', 'not_regex:/-/'],
            'id_pilihan_1' => ['required'],
            'id_pilihan_2' => ['required']
        ], [
            'alamat_1.*' => 'Anda belum mengisi alamat, silakan ke edit alamat di Profil Akun.',
            'id_pilihan_1.required' => 'Pilihan 1 tidak boleh kosong.',
            'id_pilihan_2.required' => 'Pilihan 2 tidak boleh kosong.'
        ]);
        $data = [
            'id_mhs' => $id_user,
            'id_pilihan_1' => $request->input('id_pilihan_1'),
            'id_pilihan_2' => $request->input('id_pilihan_2'),
            // 'alasan_pilihan_1' => $request->input('alasan_pilihan_1'),
            // 'alasan_pilihan_2' => $request->input('alasan_pilihan_2')
        ];

        PemilihanLokasi::where('id_mhs', $id_user)->update($data);
        return redirect()->to('/mahasiswa/submitted-pemilihan-lokasi');
    }

    public function waitingPemilihanLokasi()
    {
        $finalisasiPenentuanBpsProvDone = Finalisasi::isFinalisasiPenentuanBpsProvDone();
        if ($finalisasiPenentuanBpsProvDone) {
            return redirect()->to('/mahasiswa/banding-lokasi');
        }

        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        return view('mahasiswa.submitted-pemilihan-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }


    public function submittedBandingLokasi(Request $request, $id_user)
    {
        $data = [
            'id_instansi_banding' => $request->input('id_instansi_banding'),
            'alasan_banding' => $request->input('alasan_banding')
        ];

        PemilihanLokasi::where('id_mhs', $id_user)->update($data);
        Mahasiswa::find($id_user)->update(['id_instansi' => null]);
        return redirect()->to('/mahasiswa/submitted-banding-lokasi');
    }

    public function waitingBandingLokasi()
    {
        $finalisasiBandingBpsProvDone = Finalisasi::isFinalisasiBandingBpsProvDone();
        if ($finalisasiBandingBpsProvDone) {
            return redirect()->to('/mahasiswa/lokasi-magang');
        }

        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();

        return view('mahasiswa.submitted-banding-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }

    public function lokasiFiks()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        $mhs->update(['is_final' => true]);

        return view('mahasiswa.lokasi-fiks', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }

    public function lokasiMagang()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();

        return view('mahasiswa.lokasi-magang', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }

    public function profil()
    {
        return view('mahasiswa.profil', [
            'title' => 'Profil | Mahasiswa',
            'sidebar' => '',
            'circle_sidebar' => '',
            'provinsis' => Provinsi::all()
        ]);
    }

    public function editProfil(Request $request, $id_user)
    {
        $request->validate([
            'nama' => ['required'],
            'nim' => ['required'],
            'kelas' => 'required',
            'email' => ['required', 'email'],
            'no_hp' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat_1' => ['required'],
            'id_kab_kota_alamat_1' => ['required'],
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'nim.required' => 'NIM tidak boleh kosong!',
            'kelas.required' => 'Kelas tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Format email salah!',
            'no_hp.required' => 'No HP tidak boleh kosong!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
            'alamat_1.required' => 'Alamat Domisili Utama tidak boleh kosong!',
            'id_kab_kota_alamat_1.required' => 'Kabupaten Domisili Utama tidak boleh kosong!',
        ]);
        $data = [
            'foto' => $request->input('foto'),
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas' => $request->input('kelas'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat_1' => $request->input('alamat_1'),
            'id_kab_kota_alamat_1' => $request->input('id_kab_kota_alamat_1'),
            'alamat_2' => $request->input('alamat_2'),
            'id_kab_kota_alamat_2' => $request->input('id_kab_kota_alamat_2'),
            'bank' => $request->input('bank'),
            'an_bank' => $request->input('an_bank'),
            'no_rek' => $request->input('no_rek')
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            // Menyimpan foto ke penyimpanan file (storage)
            $pathFoto = $foto->storeAs('public/assets/img/', $namaFoto);

            // Mendapatkan path foto yang disimpan
            $pathFotoPublik = Storage::url($pathFoto);

            // Memperbarui path foto dalam $data
            $data['foto'] = $pathFotoPublik;
        }
        // else {
        //     // Jika tidak ada file foto yang diunggah, gunakan foto yang ada di database
        //     $data['foto'] = Auth::user()->info()->foto;
        // }

        $mhs = Mahasiswa::where('id', $id_user)->first();
        $mhs->update($data);
        $mhs->user->update(['email' => $data['email']]);
        if (Auth::user()->role == "admin") {
            return redirect('/admin/mahasiswa/detail/' . $id_user)->with(['success' => 'Data berhasil diubah']);
        }
        return redirect()->to('/mahasiswa/profil')->with(['success' => 'Data berhasil diubah']);
    }
}
