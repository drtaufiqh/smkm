{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/instansis/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/instansis') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_user' value='{{ $data->id_user }}' id="id_user">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value='{{ $data->nama }}' id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_kecamatan" class="col-sm-2 col-form-label">Id Kecamatan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_kecamatan' value='{{ $data->id_kecamatan }}' id="id_kecamatan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='alamat_lengkap' value='{{ $data->alamat_lengkap }}' id="alamat_lengkap">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="is_prov" class="col-sm-2 col-form-label">Is Provinsi</label>
        <div class="col-sm-10">
            <select class="form-control" name='is_prov' value="{{ $data->is_prov }}" id="is_prov">
                <option value="">Select Here</option>
                <option value="0" @if ($data->is_prov == "0") selected @endif>0</option>
                <option value="1" @if ($data->is_prov == "1") selected @endif>1</option>
            </select>            
        </div>
    </div>
    <div class="mb-3 row">
        <label for="submit" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->

</main>
@endsection