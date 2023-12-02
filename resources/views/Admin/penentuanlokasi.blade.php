@extends('layouts.main')


@php
  $finalisasiDone = \App\Models\Finalisasi::isFinalisasiPenentuanAdminDone();
  // $finalisasiDone = false;
@endphp

@section('container')
  @include('partials.sidebar-admin')
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penentuan Lokasi Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Penentuan Lokasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title text-lg-center">Penentuan Lokasi oleh Admin</h5>
            @include('komponen.pesan')
              <div class="table-responsive">
                <table class="table datatable text-center">
                  <thead>
                    <tr>
                      <th scope="col">Nomor</th>
                      <th scope="col">Nama Mahasiswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Pilihan 1</th>
                      <th scope="col">Pilihan 2</th>
                      <th scope="col">Domisili Terbaru</th>
                      <th scope="col">Pengajuan Lokasi Magang</th>
                      @if (!$finalisasiDone) <!-- Tampilkan kolom aksi hanya jika finalisasi belum dilakukan -->
                        <th scope="col">Aksi</th>
                      @endif
                      <th scope="col">Lokasi Magang Final</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 0 @endphp
                    @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                    @php $i = $i + 1 @endphp
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                        <td>{{ $pemilihan_lokasi->mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $pemilihan_lokasi->pilihan1->nama }}</td>
                        <td>{{ $pemilihan_lokasi->pilihan2->nama }}</td>
                        <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                        @if ($pemilihan_lokasi->id_instansi_ajuan != NULL)
                          <td>{{ $pemilihan_lokasi->instansiAjuan->nama }}</td>
                        @else
                          <td>-</td>
                        @endif
                        
                        @if (!$finalisasiDone) 
                            <td>
                                <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_1 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 1</button>
                                </form>
                                <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_2 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 2</button>
                                </form>
                            </td>
                        @endif
                        @if ($pemilihan_lokasi->id_instansi != NULL)
                        <td>{{ $pemilihan_lokasi->mahasiswa->instansi->nama }}</td>
                        @else
                        <td>-</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
  

      @if (!$finalisasiDone)
      <div class="text-center">
        <form action='/admin/do_finalisasi_lokasi' method="post">
          @csrf 
          @method('PUT')
          <button type="submit" class="btn btn-primary btn-lg">Finalisasi</button>
        </form>
      </div>
      @else
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert"
        <i class="bi bi-info-circle me-1"></i>
        Telah dilakukan finalisasi pengajuan lokasi
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
      </div>
      @endif

    </section>

  </main><
@endsection