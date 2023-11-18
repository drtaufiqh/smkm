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
        <form class="d-flex" action="{{ url('instansis') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('instansis/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No</th>
                  <th class="col-md">Id User</th>
                  <th class="col-md">Nama</th>
                  <th class="col-md">Id Kecmatan</th>
                  <th class="col-md">Alamat Lengkap</th>
                  <th class="col-md">Is Provinsi</th>
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
                  <td>{{ $item->id_kecamatan }}</td>
                  <td>{{ $item->alamat_lengkap }}</td>
                  <td>{{ $item->is_prov }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('instansis/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('instansis/'.$item->id) }}" method="post">
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
    