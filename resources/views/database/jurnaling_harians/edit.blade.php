{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/jurnaling_harians/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/jurnaling_harians') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- ini tampilkan id tapi tidak bisa diedit --}}
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ $data->id }}" id="id" readonly disabled>
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

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_penilai' value="{{ $data->id_penilai }}" id="id_penilai">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($pembimbing_lapangans as $penilai )
                    <option value="{{ $penilai->id }}" @if ($data->id_penilai === $penilai->id) selected @endif>{{ $penilai->nip_baru }} - {{ $penilai->nama }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>

    {{-- deskripsi_pekerjaan --}}
    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal' value="{{ $data->tanggal }}" id="tanggal">
        </div>
    </div>

    {{-- deskripsi_pekerjaan --}}
    <div class="mb-3 row">
        <label for="deskripsi_pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='deskripsi_pekerjaan' value="{{ $data->deskripsi_pekerjaan }}" id="deskripsi_pekerjaan">
        </div>
    </div>

    {{-- kuantitas volume --}}
    <div class="mb-3 row">
        <label for="kuantitas_volume" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_volume' value="{{ $data->kuantitas_volume }}" id="kuantitas_volume">
        </div>
    </div>

    {{-- kuantitas satuan --}}
    <div class="mb-3 row">
        <label for="kuantitas_satuan" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_satuan' value="{{ $data->kuantitas_satuan }}" id="kuantitas_satuan">
        </div>
    </div>

    {{-- durasi waktu --}}
    <div class="mb-3 row">
        <label for="durasi_waktu" class="col-sm-2 col-form-label">Durasi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='durasi_waktu' value="{{ $data->durasi_waktu }}" id="durasi_waktu">
        </div>
    </div>

    {{--pemberi tugas --}}
    <div class="mb-3 row">
        <label for="pemberi_tugas" class="col-sm-2 col-form-label">Pemberi Tugas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='pemberi_tugas' value="{{ $data->pemberi_tugas }}" id="pemberi_tugas">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_penyelesaian" class="col-sm-2 col-form-label">Status Penyelesaian</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='status_penyelesaian' value="{{ $data->status_penyelesaian }}" id="status_penyelesaian">
        </div>
    </div>

    
    <div class="mb-3 row">
        <label for="status_final_mhs" class="col-sm-2 col-form-label">Status Final Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_mhs' value="{{ $data->status_final_mhs }}" id="status_final_mhs">
                <option value="">Tentukan Status</option>
                <option value="0" @if ($data->status_final_mhs == "0") selected @endif>0</option>
                <option value="1" @if ($data->status_final_mhs == "1") selected @endif>1</option>
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_final_penilai" class="col-sm-2 col-form-label">Status Final Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_penilai' value="{{ $data->status_final_penilai }}" id="status_final_penilai">
                <option value="">Tentukan Status</option>
                <option value="0" @if ($data->status_final_penilai == "0") selected @endif>0</option>
                <option value="1" @if ($data->status_final_penilai == "1") selected @endif>1</option>
                <!-- Add more options as needed -->
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