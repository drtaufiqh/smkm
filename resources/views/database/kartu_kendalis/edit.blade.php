{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('kartu_kendalis/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('kartu_kendalis') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_bimbingan" class="col-sm-2 col-form-label">id_bimbingan</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id_bimbingan' value="{{ $data->id_bimbingan }}" id="id_bimbingan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_mhs' value="{{ $data->id_mhs }}" id="id_mhs">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mahasiswa )
                    <option value="{{ $mahasiswa->id }}" @if ($data->id_mhs === $mahasiswa->id) selected @endif>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>

    {{-- ini contoh input type text --}}
    <div class="mb-3 row">
        <label for="pokok_bahasan" class="col-sm-2 col-form-label">Pokok Bahasan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='pokok_bahasan' value="{{ $data->pokok_bahasan }}" id="pokok_bahasan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Diketahui</label>
        <div class="col-sm-10">
            <select class="form-control" name='diketahui' value="{{ $data->diketahui }}" id="diketahui">
                <option value="">Pilih Status</option>
                <option value="0" @if ($data->diketahui == 0) selected @endif>Belum Disetujui</option>
                <option value="1" @if ($data->diketahui == 1) selected @endif>Disetujui</option>
            </select>
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