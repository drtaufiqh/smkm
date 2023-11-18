{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/penilaian_laporans/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/penilaian_laporans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">ID Laporan</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_laporan' value="{{ $data->id_laporan }}" id="id_laporan">
                <option value="">Pilih ID Laporan</option>
                @foreach ($penilaian_laporans as $penilaian_laporan )
                    <option value="{{ $penilaian_laporan->id }}" @if ($data->id_laporan === $penilaian_laporan->id) selected @endif>{{ $penilaian_laporan->id_laporan }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="penilai" class="col-sm-2 col-form-label">Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='penilai' value="{{ $data->penilai }}" id="penilai">
                <option value="">Pilih Penilai</option>
                <option value="dospem" @if ($data->penilai === "dospem") selected @endif>Dosen Pembimbing</option>
                <option value="pemlap" @if ($data->penilai === "pemlap") selected @endif>Pembimbing Lapangan</option>
                <!-- Add more options as needed -->
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