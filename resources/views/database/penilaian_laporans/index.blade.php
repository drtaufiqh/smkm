{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<div class="my-3 p-3 bg-body rounded shadow-sm">
      {{-- <!-- FORM PENCARIAN -->
      <div class="pb-3">
        <form class="d-flex" action="{{ url('penilaian_laporans') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div> --}}
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('penilaian_laporans/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">ID</th>
                  <th class="col-md">ID Laporan</th>
                  <th class="col-md">Penilai</th>
                  <th class="col-md">Nilai Kriteria 1</th>
                  <th class="col-md">Nilai Kriteria 2</th>
                  <th class="col-md">Nilai Kriteria 3</th>
                  <th class="col-md">Nilai Kriteria 4</th>
                  <th class="col-md">Nilai Kriteria 5</th>
                  <th class="col-md">Nilai Kriteria 6</th>
                  <th class="col-md">Nilai Kriteria 7</th>
                  <th class="col-md">Nilai Kriteria 8</th>
                  <th class="col-md">Nilai Kriteria 9</th>
                  <th class="col-md">Nilai Kriteria 10</th>
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
                  <td>{{ $item->id_laporan }}</td>
                  <td>{{ $item->penilai }}</td>
                  <td>{{ $item->nilai_k1 }}</td>
                  <td>{{ $item->nilai_k2 }}</td>
                  <td>{{ $item->nilai_k3 }}</td>
                  <td>{{ $item->nilai_k4 }}</td>
                  <td>{{ $item->nilai_k5 }}</td>
                  <td>{{ $item->nilai_k6 }}</td>
                  <td>{{ $item->nilai_k7 }}</td>
                  <td>{{ $item->nilai_k8 }}</td>
                  <td>{{ $item->nilai_k9 }}</td>
                  <td>{{ $item->nilai_k10 }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('penilaian_laporans/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('penilaian_laporans/'.$item->id) }}" method="post">
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
    