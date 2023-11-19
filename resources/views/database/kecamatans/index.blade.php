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
      <form class="d-flex" action="{{ url('/admin/kecamatans') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{ url('/admin/kecamatans/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-2">No.</th>
                <th class="col-md-1">Id</th>
                <th class="col-md-1">Kode</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-3">Akronim</th>
                <th class="col-md-4">Id Kab/Kota</th>
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
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{  $item->akronim }}</td>
                    <td>{{  $item->id_kabkota }}</td>
                    <td>{{  $item->created_at }}</td>
                    <td>{{  $item->updated_at }}</td>
                    <td>
                        <a href='{{ url('/admin/kecamatans/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('/admin/kecamatans/'.$item->id) }}" method="post">
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
<!-- AKHIR DATA -->
</main>
@endsection