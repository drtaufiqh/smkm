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
        <form class="d-flex" action="{{ url('kartu_kendalis') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
      </div>
      
      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
        <a href='{{ url('kartu_kendalis/create') }}' class="btn btn-primary">+ Tambah Data</a>
      </div>

      <div class="table-responsive mb-3">
      <table class="table table-striped">
          <thead class="text-center align-middle">
              <tr>
                  <th class="col-md">No.</th>
                  <th class="col-md">Tanggal Bimbingan</th>
                  <th class="col-md">Nama Mahasiswa</th>
                  <th class="col-md">Pokok Bahasan</th>
                  <th class="col-md">Status Persetujuan</th>
                  <th class="col-md">Created at</th>
                  <th class="col-md">Updated at</th>
                  <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">____</span></th>
              </tr>
          </thead>
          <tbody>
            @php $i = $data->firstItem() @endphp
            @foreach ($data as $item)
              <tr class="align-middle">
                  <td class="text-center">{{ $i }}.</td>
                  <td>{{ $item->bimbingan->tanggal }}</td>
                  <td>{{ $item->mahasiswa->nama }}</td>
                  <td>{{ $item->pokok_bahasan }}</td>
                  <td>
                      @if($item->diketahui == 0)
                          Belum Disetujui
                      @elseif($item->diketahui == 1)
                          Disetujui
                      @else
                          Status Tidak Diketahui
                      @endif
                  </td>

                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td class="">
                      <a href='{{ url('kartu_kendalis/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('kartu_kendalis/'.$item->id) }}" method="post">
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
    