{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('penilaians') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('penilaians') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    {{-- ini contoh input type text --}}
    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">ID Mahasiswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_mhs' value="{{ Session::get('id_mhs') }}" id="id_mhs">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_laporan_dospem" class="col-sm-2 col-form-label">Nilai Laporan Dospem</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_laporan_dospem' value="{{ Session::get('nilai_laporan_dospem') }}" id="nilai_laporan_dospem">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_laporan_pemlap" class="col-sm-2 col-form-label">Nilai Laporan Pemlap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_laporan_pemlap' value="{{ Session::get('nilai_laporan_pemlap') }}" id="nilai_laporan_pemlap">
        </div>
    </div>

    
    <div class="mb-3 row">
        <label for="nilai_kinerja" class="col-sm-2 col-form-label">Nilai Kinerja</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_kinerja' value="{{ Session::get('nilai_kinerja') }}" id="nilai_kinerja">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_bimbingan" class="col-sm-2 col-form-label">Nilai Bimbingan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_bimbingan' value="{{ Session::get('nilai_bimbingan') }}" id="nilai_bimbingan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_akhir" class="col-sm-2 col-form-label">Nilai Akhir</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_akhir' value="{{ Session::get('nilai_akhir') }}" id="nilai_akhir">
        </div>
    </div>


   


    {{-- ini tombol simpan --}}
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
</main>
@endsection