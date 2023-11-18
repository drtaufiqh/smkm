{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('penilaians/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('penilaians') }}" class="btn btn-secondary"> << Kembali</a>


    
    {{-- ini contoh input type text --}}
  
    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">ID Mahasiswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_mhs' value="{{ $data->id_mhs }}" id="id_mhs" readonly disabled>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_laporan_dospem" class="col-sm-2 col-form-label">Nilai Laporan Dospem</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_laporan_dospem' value="{{ $data->nilai_laporan_dospem }}" id="nilai_laporan_dospem">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_laporan_pemlap" class="col-sm-2 col-form-label">Nilai Laporan Pemlap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_laporan_pemlap' value="{{ $data->nilai_laporan_pemlap}}" id="nilai_laporan_pemlap">
        </div>
    </div>

    
    <div class="mb-3 row">
        <label for="nilai_kinerja" class="col-sm-2 col-form-label">Nilai Kinerja</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_kinerja' value="{{ $data->nilai_kinerja}}" id="nilai_kinerja">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_bimbingan" class="col-sm-2 col-form-label">Nilai Bimbingan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_bimbingan' value="{{ $data->nilai_bimbingan}}"id="nilai_bimbingan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_akhir" class="col-sm-2 col-form-label">Nilai Akhir</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_akhir' value="{{ $data->nilai_akhir}}"id="nilai_akhir">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="created_at" class="col-sm-2 col-form-label">Created at</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='created_at' value="{{ $data->created_at}}" id="created_at">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="updated_at" class="col-sm-2 col-form-label">Updated at</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='updated_at' value="{{ $data->updated_at}}"  id="updated_at">
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
<main></main>
@endsection