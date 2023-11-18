{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('kab_kotas/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('kab_kotas') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kode' value='{{ $data->kode }}' id="kode">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value='{{ $data->nama }}' id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="akronim" class="col-sm-2 col-form-label">Akronim</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='akronim' value='{{ $data->akronim }}' id="akronim">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_kabkota" class="col-sm-2 col-form-label">Id Provinsi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_prov' value='{{ $data->id_prov }}' id="id_prov">
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