{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/penilaian_bimbingans') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/penilaian_bimbingans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_mhs' value="{{ Session::get('id_mhs') }}" id="id_mhs">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mahasiswa )
                    <option value="{{ $mahasiswa->id }}" @if (Session::get('id_mhs') == $mahasiswa->id) selected @endif>{{ $mahasiswa->nim }}-{{ $mahasiswa->nama }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>


    {{-- kolom nilai kriteria kinerja --}}
    <div class="mb-3 row">
        <label for="nilai_k1" class="col-sm-2 col-form-label">Nilai Kriteria 1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k1' value="{{ Session::get('nilai_k1') }}" id="nilai_k1">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k2" class="col-sm-2 col-form-label">Nilai Kriteria 2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k2' value="{{ Session::get('nilai_k2') }}" id="nilai_k2">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k3" class="col-sm-2 col-form-label">Nilai Kriteria 3</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k3' value="{{ Session::get('nilai_k3') }}" id="nilai_k3">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k4" class="col-sm-2 col-form-label">Nilai Kriteria 4</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k4' value="{{ Session::get('nilai_k4') }}" id="nilai_k4">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k5" class="col-sm-2 col-form-label">Nilai Kriteria 5</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k5' value="{{ Session::get('nilai_k5') }}" id="nilai_k5">
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