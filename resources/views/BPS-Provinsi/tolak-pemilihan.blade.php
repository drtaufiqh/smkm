@extends('layout.template')

@section('konten')
    <form action="{{ route('approvalmahasiswa.update', ['id' => $pemilihan_lokasi->id]) }}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="my-3 p-3 bg-body rounded shadow-sm">
      

            <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_mahasiswa" value="{{ $pemilihan_lokasi->mahasiswa->nama }}" readonly disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nim_mahasiswa" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim_mahasiswa" value="{{ $pemilihan_lokasi->mahasiswa->nim }}" readonly disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="domisili_mahasiswa" class="col-sm-2 col-form-label">Domisili</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="domisili_mahasiswa" value="{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}" readonly disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="bps_pilihan" class="col-sm-2 col-form-label">BPS Kabupaten/Kota Pilihan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bps_pilihan" value="{{ $pemilihan_lokasi->instansiAjuan->nama }}" readonly disabled>
                </div>
            </div>

            
            <div class="mb-3 row">
                <label for="id_pengalihan" class="col-sm-2 col-form-label">BPS Pengalihan</label>
                <div class="col-sm-10">
                    <select class="form-control" name='id_pengalihan' id="id_pengalihan">
                        <option value="">Pilih BPS Pengalihan</option>
                        @foreach ($instansis as $instansi)
                            <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            
            
            <div class="mb-3 row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>

            {{-- Tombol simpan --}}
            <div class="mb-3 row">
                <label for="simpan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
@endsection
