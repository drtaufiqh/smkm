@extends('layouts.main')

@section('container')
    @include('partials.sidebar-prov')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="bps-provinsi-dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Lokasi Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="bps-provinsi-approvalmahasiswa">
              <i class="bi bi-circle"></i><span>Approval Lokasi Mahasiswa</span>
            </a>
          </li>
          <li>
            <a href="bps-provinsi-bandingmahasiswa" class="active">
              <i class="bi bi-circle"></i><span>Banding Lokasi Mahasiswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Banding Lokasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bps-provinsi-dashboard">Home</a></li>
          <li class="breadcrumb-item active">Lokasi Mahasiswa-Banding</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title text-lg-center">Pengajuan Banding di Provinsi Jakarta</h5>
                          <!-- Table with stripped rows -->
                          <div class="table-responsive">
                          <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Domisili</th>
                                    <th scope="col">BPS Kab/Kota Awal</th>
                                    <th scope="col">BPS Kab/Kota Banding</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Andi</td>
                                    <td>123456789</td>
                                    <td>Jakarta Timur</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Jauh ke Jakarta Utara</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Budi</td>
                                    <td>222222222</td>
                                    <td>Jakarta Barat</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Lebih dekat ke BPS Jakarta Timur</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Caca</td>
                                    <td>333333333</td>
                                    <td>Jakarta Pusat</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>Mahal Ongkir Kesana</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Dono</td>
                                    <td>444444444</td>
                                    <td>Jakarta Utara</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Orang tua tidak izin</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Ela</td>
                                    <td>555555555</td>
                                    <td>Jakarta Barat</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>Takut ga sesuai kemampuan</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Feny</td>
                                    <td>666666666</td>
                                    <td>Jakarta Selatan</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>Belum terbiasa lingkungannya</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                          <!-- End Table with stripped rows -->

                    <!-- Modal -->
                    <div class="modal fade mt-5" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog mt-5">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Approval Pengajuan Mahasiswa</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="card-body text-center">
                                      <p class="card-text">
                                          <a href="#" class="btn btn-success mx-4" data-bs-toggle="modal" >Setujui</a>
                                          <a href="#" class="btn btn-danger mx-4" data-bs-toggle="modal" >Tidak Setujui</a>
                                      </p>
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