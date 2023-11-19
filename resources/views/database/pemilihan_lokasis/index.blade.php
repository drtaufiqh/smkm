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
      <form class="d-flex" action="{{ url('/admin/pemilihan_lokasis') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{ url('/admin/pemilihan_lokasis/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <div class="table-responsive mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-2">No.</th>
                <th class="col-md-1">Id</th>
                <th class="col-md-1">Id Mahasiswa</th>
                <th class="col-md-4">Id Pilihan 1</th>
                <th class="col-md-4">Id Pilihan 2</th>
                <th class="col-md-4">Alasan Pilihan 1</th>
                <th class="col-md-4">Alasan Pilihan 2</th>
                <th class="col-md-3">Id Instansi Ajuan</th>
                <th class="col-md-3">Id Instansi Banding</th>
                <th class="col-md-3">Alasan Banding</th>
                <th class="col-md-4">Id Instansi</th>
                <th class="col-md-2">Created at</th>
                <th class="col-md-2">Updated At</th>
                <th class="col-md"><span style="color: rgba(0, 0, 0, 0)">_____</span>Aksi<span style="color: rgba(0, 0, 0, 0)">_____</span></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->id_mhs }}</td>
                    <td>{{ $item->id_pilihan_1 }}</td>
                    <td>{{ $item->id_pilihan_2 }}</td>
                    <td>{{ $item->alasan_pilihan_1 }}</td>
                    <td>{{ $item->alasan_pilihan_2 }}</td>
                    <td>{{ $item->id_instansi_ajuan }}</td>
                    <td>{{ $item->id_instansi_banding }}</td>
                    <td>{{  $item->alasan_banding }}</td>
                    <td>{{  $item->id_instansi }}</td>
                    <td>{{  $item->created_at }}</td>
                    <td>{{  $item->updated_at }}</td>
                    <td>
                        <a href='{{ url('/admin/pemilihan_lokasis/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('/admin/pemilihan_lokasis/'.$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                Del
                            </button>
                        </form>
                        {{-- <a href='' class="btn btn-danger btn-sm">Del</a> --}}
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
   {{ $data->withQueryString()->links() }}
</div>
</div>
<!-- AKHIR DATA -->
</main>
@endsection