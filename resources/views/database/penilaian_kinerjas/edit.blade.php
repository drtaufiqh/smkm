{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/penilaian_kinerjas/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/penilaian_kinerjas') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
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

    {{-- kolom nilai kriteria kinerja --}}
    <div class="mb-3 row">
        <label for="nilai_k1" class="col-sm-2 col-form-label">Nilai Kriteria 1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k1' value="{{ $data->nilai_k1 }}" id="nilai_k1">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k2" class="col-sm-2 col-form-label">Nilai Kriteria 2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k2' value="{{ $data->nilai_k2 }}" id="nilai_k2">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k3" class="col-sm-2 col-form-label">Nilai Kriteria 3</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k3' value="{{ $data->nilai_k3 }}" id="nilai_k3">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k4" class="col-sm-2 col-form-label">Nilai Kriteria 4</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k4' value="{{ $data->nilai_k4 }}" id="nilai_k4">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k5" class="col-sm-2 col-form-label">Nilai Kriteria 5</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k5' value="{{ $data->nilai_k5 }}" id="nilai_k5">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k6" class="col-sm-2 col-form-label">Nilai Kriteria 6</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k6' value="{{ $data->nilai_k6 }}" id="nilai_k6">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k7" class="col-sm-2 col-form-label">Nilai Kriteria 7</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k7' value="{{ $data->nilai_k7 }}" id="nilai_k7">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k8" class="col-sm-2 col-form-label">Nilai Kriteria 8</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k8' value="{{ $data->nilai_k8 }}" id="nilai_k8">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k9" class="col-sm-2 col-form-label">Nilai Kriteria 9</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k9' value="{{ $data->nilai_k9 }}" id="nilai_k9">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_k10" class="col-sm-2 col-form-label">Nilai Kriteria 10</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nilai_k10' value="{{ $data->nilai_k10 }}" id="nilai_k10">
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