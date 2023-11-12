@extends('layouts.main')

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Banding Lokasi Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-dashboard">Home</a></li>
          <li class="breadcrumb-item active">Banding Lokasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-lg-center">Banding Lokasi oleh Admin</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Domisili</th>
                                    <th scope="col">Lokasi Awal</th>
                                    <th scope="col">Lokasi Banding</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i = 0 @endphp
                                @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                @php $i = $i + 1 @endphp
                                  <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                                    <td>{{ $pemilihan_lokasi->instansiAjuan->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->instansiBanding->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->alasan_banding }}</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                  </tr>
                                  @endforeach
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Andi</td>
                                    <td>Jakarta Utara</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                </tr>
                                <th scope="row">2</th>
                                    <td>Budi</td>
                                    <td>Jakarta Barat</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                </tr>
                                <th scope="row">3</th>
                                    <td>Caca</td>
                                    <td>Jakarta Selatan</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                <tr>
                                <th scope="row">4</th>
                                    <td>Dono</td>
                                    <td>Jakarta Timur</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                    <td>Ela</td>
                                    <td>Jakarta Timur</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Feny</td>
                                    <td>Jakarta Selatan</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Tidak Izin Orang Tua</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalterus">Teruskan</button>
                                      <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModaltolak">Penolakan</button></td>
                                    
                                </tr> -->
                            </tbody>
                        </table>
                      </div>
                        <!-- End Table with stripped rows -->

                  <!-- Modal Teruskan -->
                  <div class="modal fade mt-5" id="myModalterus" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog mt-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body text-center">
                                  <h4>Banding Diteruskan ke BPS Provinsi terkait</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Penolakan -->
                <div class="modal fade mt-5" id="myModaltolak" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog mt-5">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="card-body text-center">
                                <h4>Banding Ditolak dan Tidak Diteruskan ke BPS Provinsi terkait</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
  <button type="button" class="btn btn-primary btn-lg">Finalisasi</button>
</div>
</section>

  </main><!-- End #main -->
@endsection