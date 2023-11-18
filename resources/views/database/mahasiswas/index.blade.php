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
        <form class="d-flex" action="{{ url('/admin/mahasiswas') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('/admin/mahasiswas/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">Id User</th>
                  <th class="col-md">Nama</th>
                  <th class="col-md">NIM</th>
                  <th class="col-md">Email</th>
                  <th class="col-md">No HP</th>
                  <th class="col-md">Foto</th>
                  <th class="col-md">Jenis Kelamin</th>
                  <th class="col-md">Alamat 1</th>
                  <th class="col-md">Id Kecamatan Alamat 1</th>
                  <th class="col-md">Alamat 2</th>
                  <th class="col-md">Id Kecamatan Alamat 2</th>
                  <th class="col-md">Bank</th>
                  <th class="col-md">Atas Nama Bank</th>
                  <th class="col-md">No Rekening</th>
                  <th class="col-md">Id Dosen Pembimbing</th>
                  <th class="col-md">Id Pembimbing Lapangan</th>
                  <th class="col-md">Id Instansi</th>
                  <th class="col-md">Created At</th>
                  <th class="col-md">Updated At</th>
                  <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">_____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">_____</span></th>
              </tr>
          </thead>
          <tbody>
            @php $i = $data->firstItem() @endphp
            @foreach ($data as $item)
              <tr class="align-middle">
                  <td class="text-center">{{ $i }}.</td>
                  {{-- <td>{{ $item->id }}</td> --}}
                  <td>{{ $item->id_user }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->nim }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->no_hp }}</td>
                  <td>{{ $item->foto }}</td>
                  <td>{{ $item->jenis_kelamin }}</td>
                  <td>{{ $item->alamat_1 }}</td>
                  <td>{{ $item->id_kecamatan_alamat_1 }}</td>
                  <td>{{ $item->alamat_2 }}</td>
                  <td>{{ $item->id_kecamatan_alamat_2 }}</td>
                  <td>{{ $item->bank }}</td>
                  <td>{{ $item->an_bank }}</td>
                  <td>{{ $item->no_rek }}</td>
                  <td>{{ $item->id_dosen_pembimbing }}</td>
                  <td>{{ $item->id_pembimbing_lapangan }}</td>
                  <td>{{ $item->id_instansi }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('/admin/mahasiswas/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('/admin/mahasiswas/'.$item->id) }}" method="post">
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
    