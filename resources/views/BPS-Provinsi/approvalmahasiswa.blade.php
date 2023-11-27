@extends('layouts.main')
@php
  $finalisasiPenentuanAdminDone = \App\Models\Finalisasi::isFinalisasiPenentuanAdminDone();
  $finalisasiPenentuanBpsProvDone = \App\Models\Finalisasi::isFinalisasiPenentuanBpsProvDone();
@endphp

@section('container')
    @include('partials.sidebar-prov')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Approval Lokasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-provinsi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Lokasi Mahasiswa-Approval</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title text-lg-center">Pengajuan di BPS Provinsi Jakarta</h5>
                          
                            @if ($finalisasiPenentuanAdminDone)
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Domisili</th>
                                        <th scope="col">BPS Instansi Pilihan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">BPS yang Disetujui</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 0 @endphp
                                @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                <tr>
                                    <th scope="row">{{ $i += 1 }}</th>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nim }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                                    <td>{{ optional($pemilihan_lokasi->instansiAjuan)->nama ?? '-' }}</td>
                                    @if (!$finalisasiPenentuanBpsProvDone)
                                        <td class="status-column">
                                            <form action="/bps-provinsi/setujui-pemilihan/{{ $pemilihan_lokasi->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success mx-4">Setujui</button>
                                            </form>
                                            <form action="{{ url('/bps-provinsi/tolak-pemilihan/' . $pemilihan_lokasi->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger mx-4 ">Tidak Setujui</button>
                                            </form>
                                        </td>
                                    @else
                                        @if ($pemilihan_lokasi->id_instansi_ajuan == $pemilihan_likasi->id_instansi)
                                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                            
                                            <i class="bi bi-info-circle me-1"></i>
                                            Disetujui
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"
                                            ></button>
                                            </div>
                                        @else
                                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                            
                                            <i class="bi bi-info-circle me-1"></i>
                                            Tidak Disetujui/Dialihkan
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"
                                            ></button>
                                            </div>
                                        @endif
                                    @endif
                                    <td>{{ optional($pemilihan_lokasi->instansiPengalihan)->nama ?? '-' }}</td>
                                    <td>{{ $pemilihan_lokasi->keterangan }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                          <!-- End Table with stripped rows -->
                            @else
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

                                    <i class="bi bi-info-circle me-1"></i>
                                    Admin belum melakukan finalisasi penentuan lokasi mahasiswa.
                                    <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"
                                    ></button>
                                </div>
                            @endif

              </div>
          </div>
      </div>
  </div>
  
  @if ($finalisasiPenentuanAdminDone)
  
  @if (!$finalisasiDone)
  <div class="text-center">
    <form action='/bps-provinsi/do_finalisasi_pemilihan' method="post">
      @csrf 
      @method('PUT') <!-- Tambahkan ini untuk menentukan metode PUT -->
      <button type="submit" class="btn btn-primary btn-lg">Finalisasi</button>
    </form>
  </div>
  @else
  <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
    Telah dilakukan finalisasi pemilihan lokasi
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif


  @endif
</section>

<script>
    // $(document).ready(function() {


    //     // Menangani klik pada tombol "Setujui" di setiap baris
    //     $('.btn-setujui').click(function() {
    //         var pemilihanId = $(this).data('id');
    //         $('#setujuiLink').attr('href', '/bps-provinsi/setujuiPemilihan/' + pemilihanId);
    //     });

     
    //     // Menangani klik pada tombol "Setujui" di modal
    //     $('.btn-setujui-modal').click(function() {
    //         // Lakukan sesuatu ketika tombol "Setujui" di modal diklik
    //     });
    // });

    
</script>

  </main><!-- End #main -->
@endsection