{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<!-- START FORM -->
<form action='{{ url('/admin/pemilihan_lokasis/'.$data->id) }}' method='post'>
    @csrf 
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('/admin/pemilihan_lokasis') }}" class="btn btn-secondary"><< kembali</a>
        {{-- <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                {{ $data->id }}
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="id_mhs" class="col-sm-2 col-form-label">Id Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_mhs' value='{{ $data->id_mhs }}' id="id_mhs">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_pilihan_1" class="col-sm-2 col-form-label">Id Pilihan 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_pilihan_1' value='{{ $data->id_pilihan_1 }}' id="id_pilihan_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_pilihan_2" class="col-sm-2 col-form-label">Id Pilihan 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_pilihan_2' value='{{ $data->id_pilihan_2 }}' id="id_pilihan_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_pilihan_1" class="col-sm-2 col-form-label">Alasan Pilihan 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_pilihan_1' value='{{ $data->alasan_pilihan_1 }}' id="alasan_pilihan_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_pilihan_2" class="col-sm-2 col-form-label">Alasan Pilihan 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_pilihan_2' value='{{ $data->alasan_pilihan_2 }}' id="alasan_pilihan_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi_ajuan" class="col-sm-2 col-form-label">Id Instansi Ajuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi_ajuan' value='{{ $data->id_instansi_ajuan }}' id="id_instansi_ajuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi_banding" class="col-sm-2 col-form-label">Id Instansi Banding</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi_banding' value='{{ $data->id_instansi_banding }}' id="id_instansi_banding">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_banding" class="col-sm-2 col-form-label">Alasan Banding</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_banding' value='{{ $data->alasan_banding }}' id="alasan_banding">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi" class="col-sm-2 col-form-label">Id Instansi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi' value='{{ $data->id_instansi }}' id="id_instansi">
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <label for="id_kabkota" class="col-sm-2 col-form-label">Id Kab/Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_kabkota' value='{{ $data->id_kabkota }}' id="id_kabkota">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      
    </div>
</form>
    <!-- AKHIR FORM -->
</main>
@endsection