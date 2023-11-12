<!DOCTYPE html>
<html>
<head>
    <title>Shortcut Menu</title>
</head>
<body>
    <h1>Admin Shortcut Menu</h1>
    {{-- @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
        <h2>{{ $pemilihan_lokasi->mahasiswa->nama }}</h2>
    @endforeach --}}
    <ul>
        <li><a href="/admin/bandinglokasi">Admin Banding Lokasi</a></li>
        <li><a href="/admin/dashboard">Admin Dashboard</a></li>
        <li><a href="/admin/database">Admin Database</a></li>
        <li><a href="/admin/penentuanlokasi">Admin Penentuan Lokasi</a></li>
    </ul>

    <h1>BPS Instansi Shortcut Menu</h1>
    <ul>
        <li><a href="/bps-instansi/buatpembimbing">Buat Pembimbing</a></li>
        <li><a href="/bps-instansi/daftarbimbingan">Daftar Bimbingan</a></li>
        <li><a href="/bps-instansi/dashboard">Dashboard</a></li>
        <li><a href="/bps-instansi/editdaftarbimbingan">Edit Daftar Bimbingan</a></li>
        <li><a href="/bps-instansi/mahasiswa">Mahasiswa</a></li>
        <li><a href="/bps-instansi/pembimbinglap">Pembimbing Lapangan</a></li>
        <li><a href="/bps-instansi/presensimahasiswa">Presensi Mahasiswa</a></li>
        <li><a href="/bps-instansi/profil">Profil</a></li>
        <li><a href="/bps-instansi/tabelbimbingan">Tabel Bimbingan</a></li>
    </ul>

    <h1>BPS Provinsi Shortcut Menu</h1>
    <ul>
        <li><a href="/bps-provinsi/approvalmahasiswa">Approval Mahasiswa</a></li>
        <li><a href="/bps-provinsi/bandingmahasiswa">Banding Mahasiswa</a></li>
        <li><a href="/bps-provinsi/dashboard">Dashboard</a></li>
        <li><a href="/bps-provinsi/profil">Profil</a></li>
    </ul>

    <h1>Dosen Pembimbing (Dospem) Shortcut Menu</h1>
    <ul>
        <li><a href="/dospem/dashboard">Dospem Dashboard</a></li>
        <li><a href="/dospem/database-mahasiswa">Database Mahasiswa</a></li>
        <li><a href="/dospem/detail-biodata">Detail Biodata</a></li>
        <li><a href="/dospem/jadwal-bimbingan">Jadwal Bimbingan</a></li>
        <li><a href="/dospem/jurnal-bulanan">Jurnal Bulanan</a></li>
        <li><a href="/dospem/jurnal-harian">Jurnal Harian</a></li>
        <li><a href="/dospem/laporan-akhir-lookup">Laporan Akhir Lookup</a></li>
        <li><a href="/dospem/laporan-akhir">Laporan Akhir</a></li>
        <li><a href="/dospem/log-book-bulanan">Log Book Bulanan</a></li>
        <li><a href="/dospem/log-book-harian">Log Book Harian</a></li>
        <li><a href="/dospem/penilaian-bimbingan1">Penilaian Bimbingan 1</a></li>
        <li><a href="/dospem/penilaian-bimbingan2">Penilaian Bimbingan 2</a></li>
        <li><a href="/dospem/penilaian-laporan1">Penilaian Laporan 1</a></li>
        <li><a href="/dospem/penilaian-laporan2">Penilaian Laporan 2</a></li>
        <li><a href="/dospem/profil">Profil</a></li>
    </ul>
    
    <h1>Mahasiswa Shortcut Menu</h1>
    <ul>
        <li><a href="/mahasiswa/banding-lokasi">Banding Lokasi</a></li>
        <li><a href="/mahasiswa/bimbingan">Bimbingan</a></li>
        <li><a href="/mahasiswa/index">Mahasiswa Index</a></li>
        <li><a href="/mahasiswa/jadwal-bimbingan">Jadwal Bimbingan</a></li>
        <li><a href="/mahasiswa/laporan-akhir">Laporan Akhir</a></li>
        <li><a href="/mahasiswa/log-book-bulanan">Log Book Bulanan</a></li>
        <li><a href="/mahasiswa/log-book-harian">Log Book Harian</a></li>
        <li><a href="/mahasiswa/pemilihan-lokasi">Pemilihan Lokasi</a></li>
    </ul>
    
    <h1>Pembimbing Lapangan (Pemlap) Shortcut Menu</h1>
    <ul>
        <li><a href="/pemlap/dashboard">Pemlap Dashboard</a></li>
        <li><a href="/pemlap/database-mahasiswa">Database Mahasiswa</a></li>
        <li><a href="/pemlap/detail-biodata">Detail Biodata</a></li>
        <li><a href="/pemlap/jurnal-bulanan">Jurnal Bulanan</a></li>
        <li><a href="/pemlap/jurnal-harian">Jurnal Harian</a></li>
        <li><a href="/pemlap/laporan-akhir-lookup">Laporan Akhir Lookup</a></li>
        <li><a href="/pemlap/laporan-akhir">Laporan Akhir</a></li>
        <li><a href="/pemlap/log-book-bulanan">Log Book Bulanan</a></li>
        <li><a href="/pemlap/log-book-harian">Log Book Harian</a></li>
        <li><a href="/pemlap/penilaian-kinerja1">Penilaian Kinerja 1</a></li>
        <li><a href="/pemlap/penilaian-kinerja2">Penilaian Kinerja 2</a></li>
        <li><a href="/pemlap/penilaian-laporan1">Penilaian Laporan 1</a></li>
        <li><a href="/pemlap/penilaian-laporan2">Penilaian Laporan 2</a></li>
        <li><a href="/pemlap/profil">Profil</a></li>
    </ul>
</body>
</html>
