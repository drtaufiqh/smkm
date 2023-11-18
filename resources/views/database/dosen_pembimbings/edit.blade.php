{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('dosen_pembimbings/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('dosen_pembimbings') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_user" class="col-sm-2 col-form-label">id_user_user</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id_user' value="{{ $data->id_user }}" id="id_user">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        <select class="form-control" name='jenis_kelamin' value="{{ $data->jenis_kelamin }}" id="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki-laki" @if ($data->jenis_kelamin === "laki-laki") selected @endif>Laki-laki</option>
                <option value="perempuan" @if ($data->jenis_kelamin === "perempuan") selected @endif>Perempuan</option>
                <!-- Add more options as needed -->
        </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">NIP Lama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nip_lama' value="{{ $data->nip_lama }}" id="nip_lama">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">NIP Baru</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nip_baru' value="{{ $data->nip_baru }}" id="nip_baru">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ $data->email }}" id="email">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">Nomor Handphone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='no_hp' value="{{ $data->no_hp }}" id="no_hp">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kolom_text_contoh" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='foto' value="{{ $data->foto }}" id="foto">
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