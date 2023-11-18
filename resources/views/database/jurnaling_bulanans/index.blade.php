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
        <form class="d-flex" action="{{ url('jurnaling_bulanans') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('jurnaling_bulanans/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">id</th>
                  <th class="col-md">Periode</th>
                  <th class="col-md">Uraian Kegiatan</th>
                  <th class="col-md">Satuan</th>
                  <th class="col-md">Kuantitas Target</th>
                  <th class="col-md">Kuantitas Realisasi</th>
                  <th class="col-md">Tingkat Kuantitas</th>
                  <th class="col-md">Tingkat Kualitas</th>
                  <th class="col-md">Keterangan</th>
                  <th class="col-md">Status Final Mahasiswa</th>
                  <th class="col-md">Status Final Penilai</th>
                  <th class="col-md">Dibuat pada</th>
                  <th class="col-md">Diupdate pada</th>
                  <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">_____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">_____</span></th>
              </tr>
          </thead>
          <tbody>
            @php $i = $data->firstItem() @endphp
            @foreach ($data as $item)
              <tr class="align-middle">
                  <td class="text-center">{{ $i }}.</td>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->periode }}</td>
                  <td>{{ $item->uraian_kegiatan }}</td>
                  <td>{{ $item->satuan }}</td>
                  <td>{{ $item->kuantitas_target }}</td>
                  <td>{{ $item->kuantitas_realisasi }}</td>
                  <td>{{ $item->tingkat_kuantitas }}</td>
                  <td>{{ $item->tingkat_kualitas }}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td>{{ $item->status_final_mhs ? 'final' : 'belum final' }}</td>
                  <td>{{ $item->status_final_penilai ? 'final' : 'belum final' }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('jurnaling_bulanans/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('jurnaling_bulanans/'.$item->id) }}" method="post">
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
    