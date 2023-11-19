{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<!-- START FORM -->
<form action='{{ url('/admin/kecamatans/'.$data->id) }}' method='post'>
    @csrf 
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('/admin/kecamatans') }}" class="btn btn-secondary"><< kembali</a>
        {{-- <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                {{ $data->id }}
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
            <label for="id_kabkota" class="col-sm-2 col-form-label">Id Kab/Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_kabkota' value='{{ $data->id_kabkota }}' id="id_kabkota">
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