{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<div class="my-3 p-3 bg-body rounded shadow-sm">
      <!-- FORM PENCARIAN -->
      <div class="pb-3">
        <form class="d-flex" action="{{ url('/admin/jurnaling_harians') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('/admin/jurnaling_harians/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">ID</th>
                  <th class="col-md">Mahasiswa</th>
                  <th class="col-md">Penilai</th>
                  <th class="col-md">Tanggal</th>
                  <th class="col-md">Deskripsi Kegiatan</th>
                  <th class="col-md">Volume</th>
                  <th class="col-md">Satuan</th>
                  <th class="col-md">Durasi</th>
                  <th class="col-md">Pemberi Tugas</th>
                  <th class="col-md">Status Penyelesaian</th>
                  <th class="col-md">Status Final Mahasiswa</th>
                  <th class="col-md">Status Final Penilai</th>
                  <th class="col-md">Created at</th>
                  <th class="col-md">Updated at</th>
                  <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">_____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">_____</span></th>
              </tr>
          </thead>
          <tbody>
            @php $i = $data->firstItem() @endphp
            @foreach ($data as $item)
              <tr class="align-middle">
                  <td class="text-center">{{ $i }}.</td>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->mahasiswa->nama }}</td>
                  <td>{{ $item->pembimbingLapangan->nama }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->deskripsi_pekerjaan }}</td>
                  <td>{{ $item->kuantitas_volume }}</td>
                  <td>{{ $item->kuantitas_satuan }}</td>
                  <td>{{ $item->durasi_waktu }}</td>
                  <td>{{ $item->pemberi_tugas }}</td>
                  <td>{{ $item->status_penyelesaian }}</td>
                  <td>{{ $item->status_final_mhs }}</td>
                  <td>{{ $item->status_final_penilai }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('/admin/jurnaling_harians/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('/admin/jurnaling_harians/'.$item->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Del</button>
                      </form>
                  </td>
              </tr>
            @php $i++ @endphp
            @endforeach
          </tbody>
      </table>
      </div>
      {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
</main>
@endsection
    