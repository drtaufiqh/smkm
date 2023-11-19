{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/laporan_akhirs/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/laporan_akhirs') }}" class="btn btn-secondary"> << Kembali</a>


    
    {{-- ini contoh input type text --}}
  
    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label" disable>ID Mahasiswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_mhs' value="{{ $data->id_mhs }}" id="id_mhs" readonly disabled>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="laporan_awal" class="col-sm-2 col-form-label">Laporan Awal</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='laporan_awal' value="{{ $data->laporan_awal }}"  id="laporan_awal">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="komentar_pemlap " class="col-sm-2 col-form-label">Komentar Pemlap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='komentar_pemlap' value="{{ $data->komentar_pemlap }}"  id="komentar_pemlap">
        </div>
    </div>

    
    <div class="mb-3 row">
        <label for="approval_awal_pemlap" class="col-sm-2 col-form-label">Approval Awal Pemlap</label>
        <div class="col-sm-10">
            <select class="form-control" name='approval_awal_pemlap' value="{{ $data->approval_awal_pemlap }}" id="approval_awal_pemlap">
                <option value="">Pilih Status</option>
                <option value=0 @if ($data->approval_awal_pemlap === 0) selected @endif>Tidak Setuju</option>
                <option value=1 @if ($data->approval_awal_pemlap === 1) selected @endif>Setuju</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="approval_awal_dospem" class="col-sm-2 col-form-label">Approval Awal Dospem</label>
        <div class="col-sm-10">
            <select class="form-control" name='approval_awal_dospem' value="{{ $data->approval_awal_dospem }}" id="approval_awal_dospem">
                <option value="">Pilih Status</option>
                <option value=0 @if ($data->approval_awal_dospem === 0) selected @endif>Tidak Setuju</option>
                <option value=1 @if ($data->approval_awal_dospem === 1) selected @endif>Setuju</option>
            </select>
        </div>
    </div>

    
   
    <div class="mb-3 row">
        <label for="laporan_final" class="col-sm-2 col-form-label">Laporan Final</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='laporan_final' value="{{ $data->laporan_final }}" id="laporan_final">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="approval_akhir_pemlap" class="col-sm-2 col-form-label">Approval Akhir Pemlap</label>
        <div class="col-sm-10">
            <select class="form-control" name='approval_akhir_pemlap' value="{{ $data->approval_akhir_pemlap}}" id="approval_akhir_pemlap">
                <option value="">Pilih Status</option>
                <option value=0 @if ($data->approval_akhir_pemlap === 0) selected @endif>Tidak Setuju</option>
                <option value=1 @if ($data->approval_akhir_pemlap === 1) selected @endif>Setuju</option>
            </select>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="approval_akhir_dospem" class="col-sm-2 col-form-label">Approval Akhir Dospem</label>
        <div class="col-sm-10">
            <select class="form-control" name='approval_akhir_dospem' value="{{ $data->approval_akhir_dospem }}" id="approval_akhir_dospem">
                <option value="">Pilih Status</option>
                <option value=0 @if ($data->approval_akhir_dospem === 0) selected @endif>Tidak Setuju</option>
                <option value=1 @if ($data->approval_akhir_dospem === 1) selected @endif>Setuju</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="approval_akhir_kampus" class="col-sm-2 col-form-label">Approval Akhir Kampus</label>
        <div class="col-sm-10">
            <select class="form-control" name='approval_akhir_kampus' value="{{ $data->approval_akhir_kampus }}" id="approval_akhir_kampus">
                <option value="">Pilih Status</option>
                <option value=0 @if ($data->approval_akhir_kampus === 0) selected @endif>Tidak Setuju</option>
                <option value=1 @if ($data->approval_akhir_kampus === 1) selected @endif>Setuju</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_akhir_pemlap" class="col-sm-2 col-form-label">Nilai Akhir Pemlap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_akhir_pemlap' value="{{ $data->nilai_akhir_pemlap }}"  id="nilai_akhir_pemlap">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_akhir_dospem " class="col-sm-2 col-form-label">Nilai Akhir Dospem</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_akhir_dospem' value="{{ $data->nilai_akhir_dospem }}" id="nilai_akhir_dospem ">
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

</main>
@endsection