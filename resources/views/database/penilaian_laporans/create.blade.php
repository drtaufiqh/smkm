{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('penilaian_laporans') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('penilaian_laporans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    {{-- <div class="mb-3 row">
        <label for="id_laporan" class="col-sm-2 col-form-label">ID Laporan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_laporan' value="{{ Session::get('id_laporan') }}" id="id_laporan">
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">ID Laporan</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_laporan' value="{{ Session::get('id_laporan') }}" id="id_laporan">
                <option value="">Pilih ID Laporan</option>
                @foreach ($penilaian_laporans as $penilaian_laporan )
                    <option value="{{ $penilaian_laporan->id }}" @if (Session::get('id_laporan') == $penilaian_laporan->id) selected @endif>{{ $penilaian_laporan->id }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='penilai' value="{{ Session::get('penilai') }}" id="penilai">
                <option value="">Pilih Penilai</option>
                <option value="dospem" @if (Session::get('penilai') === "dospem") selected @endif>Dosen Pembimbing</option>
                <option value="pemlap" @if (Session::get('penilai') === "pemlap") selected @endif>Pembimbing Lapangan</option>
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

    <div class="mb-3 row">
        <label for="nilai_k6" class="col-sm-2 col-form-label">Nilai Kriteria 6</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k6' value="{{ Session::get('nilai_k6') }}" id="nilai_k6">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k7" class="col-sm-2 col-form-label">Nilai Kriteria 7</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k7' value="{{ Session::get('nilai_k7') }}" id="nilai_k7">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k8" class="col-sm-2 col-form-label">Nilai Kriteria 8</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k8' value="{{ Session::get('nilai_k8') }}" id="nilai_k8">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k9" class="col-sm-2 col-form-label">Nilai Kriteria 9</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k9' value="{{ Session::get('nilai_k9') }}" id="nilai_k9">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k10" class="col-sm-2 col-form-label">Nilai Kriteria 10</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k10' value="{{ Session::get('nilai_k10') }}" id="nilai_k10">
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