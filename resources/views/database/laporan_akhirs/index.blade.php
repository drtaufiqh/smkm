{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
<div class="my-3 p-3 bg-body rounded shadow-sm">
      <!-- FORM PENCARIAN -->
      <div class="pb-3">
        <form class="d-flex" action="{{ url('laporan_akhirs') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('laporan_akhirs/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">ID</th>
                  <th class="col-md">ID Mahasiswa</th>
                  <th class="col-md">Laporan Awal</th>
                  <th class="col-md">Komentar Pemlap</th>
                  <th class="col-md">Approval Awal Pemlap</th>
                  <th class="col-md">Approval Awal Dospem</th>
                  <th class="col-md">Laporan Final</th>
                  <th class="col-md">Approval Akhir Pemlap</th>
                  <th class="col-md">Approval Akhir Dospem</th>
                  <th class="col-md">Approval Akhir Kampus</th>
                  <th class="col-md">Nilai Akhir Pemlap</th>
                  <th class="col-md">Nilai Akhir Dospem</th>
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
                  <td>{{ $item->id_mhs }}</td>
                  <td>{{ $item->laporan_awal }}</td>
                  <td>{{ $item->komentar_pemlap }}</td>
                  <td>{{ $item->approval_awal_pemlap }}</td>
                  <td>{{ $item->approval_awal_dospem }}</td>
                  <td>{{ $item->laporan_final }}</td>
                  <td>{{ $item->approval_akhir_pemlap }}</td>
                  <td>{{ $item->approval_akhir_dospem }}</td>
                  <td>{{ $item->approval_akhir_kampus }}</td>
                  <td>{{ $item->nilai_akhir_pemlap }}</td>
                  <td>{{ $item->nilai_akhir_dospem }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('laporan_akhirs/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('laporan_akhirs/'.$item->id) }}" method="post">
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
    