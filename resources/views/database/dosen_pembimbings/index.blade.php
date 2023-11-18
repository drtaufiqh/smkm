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
        <form class="d-flex" action="{{ url('dosen_pembimbings') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('dosen_pembimbings/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">Id</th>
                  <th class="col-md">Id User</th>
                  <th class="col-md">Nama</th>
                  <th class="col-md">Jenis Kelamin</th>
                  <th class="col-md">NIP Lama</th>
                  <th class="col-md">NIP Baru</th>
                  <th class="col-md">Email</th>
                  <th class="col-md">Nomor Handphone</th>
                  <th class="col-md">Foto</th>
                  <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">____</span></th>
              </tr>
          </thead>
          <tbody>
            @php $i = $data->firstItem() @endphp
            @foreach ($data as $item)
              <tr class="align-middle">
                  <td class="text-center">{{ $i }}.</td>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->id_user }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->jenis_kelamin }}</td>
                  <td>{{ $item->nip_lama }}</td>
                  <td>{{ $item->nip_baru }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->no_hp }}</td>
                  <td>{{ $item->foto }}</td>
                  <td class="">
                      <a href='{{ url('dosen_pembimbings/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('dosen_pembimbings/'.$item->id) }}" method="post">
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
    