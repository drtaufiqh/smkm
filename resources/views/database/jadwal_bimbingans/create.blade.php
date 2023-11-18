{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/jadwal_bimbingans') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/jadwal_bimbingans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal' value="{{ Session::get('tanggal') }}" id="tanggal">
        </div>
    </div>

 <div class="mb-3 row">
        <label for="jam" class="col-sm-2 col-form-label">jam</label>
        <div class="col-sm-10">
            <input type="time" class="form-control" name='jam' value="{{ Session::get('jam') }}" id="jam">
        </div>
    </div>

   <div class="mb-3 row">
        <label for="lokasi" class="col-sm-2 col-form-label">Tipe lokasi bimbingan</label>
        <div class="col-sm-10">
            <select class="form-control" name='lokasi' value="{{ Session::get('lokasi') }}" id="lokasi">
                <option value="">Pilih tipe lokasi bimbingan</option>
                <option value="online" @if (Session::get('lokasi') === "online") selected @endif>online</option>
                <option value="offline" @if (Session::get('lokasi') === "offline") selected @endif>offline</option>
            </select>
        </div>
    </div>

 <div class="mb-3 row">
        <label for="link" class="col-sm-2 col-form-label">link</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='link' value="{{ Session::get('link') }}" id="link">
        </div>
    </div>

 <div class="mb-3 row">
        <label for="id_dosen_pembimbing" class="col-sm-2 col-form-label">id_dosen_pembimbing</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_dosen_pembimbing' value="{{ Session::get('id_dosen_pembimbing') }}" id="id_dosen_pembimbing">
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