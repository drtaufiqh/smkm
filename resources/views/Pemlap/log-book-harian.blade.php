@extends('layouts.main')

@section('container')
    @include('partials.sidebar-pemlap')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Penilaian Kegiatan Harian</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="pemlap-dashboard">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card" style="width: fit-content;"">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable table-hover">
                  <h5 class="card-title">Log Book Harian</h5>

                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Pekerjaan</th>
                      <th scope="col">Volume</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Durasi</th>
                      <th scope="col">Pemberi Tugas</th>
                      <th scope="col">Penyelesaian</th>
                      <th scope="col">Nilai</th>
                      <th scope="col">Beri Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                    <tr>
                      <th scope="row">6</th>
                      <td>2016-05-25</td>
                      <td>Membaca buku Soekarno</td>
                      <td>500</td>
                      <td>buah</td>
                      <td>2 jam</td>
                      <td>Suedi</td>
                      <td>100%</td>
                      <td>98</td>
                      <td class="edit-button">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <img src="assets/img/edit-button.png" alt="Edit" width="30" height="30">
                        </a>
                      </td> 
                    </tr>
                  </tbody>
                </table>
                <a href="jurnal-harian" class="btn btn-success float-end">Finalisasi</a>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Vertically centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Penilaian Kegiatan Harian Mahasiswa</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul class="info-list">
                <li><b>NIM:</b> Nomor NIM</li>
                <li><b>Nama:</b> Nama Mhs</li>
                <li><b>Kegiatan:</b> Nama Kegiatan</li>
                <li><b>Inputkan Nilai:</b></li>
              </ul>
                <div class="row mb-3">
                  <div class="col-sm-12">
                      <input type="number" class="form-control">
                  </div>
                </div>            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
          </div>
        </div>
      </div><!-- End Vertically centered Modal-->
    </main>
    <!-- End #main -->
@endsection