@extends('layouts.main')

@section('container')
    @include('partials.sidebar-pemlap')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Rekapitulasi Laporan Akhir Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pemlap-dashboard">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Status Persetujuan</h5>

              <div class="row mb-3">
                <div class="col">
                  <input type="text" class="form-control" id="searchInput" placeholder="Cari...">
                </div>
              </div>

              <table class="table table-hover body-penilaian" id="penilaianTable">
                <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Mahasiswa</th>
                          <th scope="col">NIM</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php $i = 0 @endphp
                      @foreach ($mahasiswas as $mahasiswa)
                        @php $i = $i + 1 @endphp
                          <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->jenis_kelamin }}</td>
                            <td class="highlighted-text">Belum disetujui</td>
                            <td class="edit-button">
                            <a href="pemlap-laporan-akhir-lookup">
                                <img src="assets/img/logo-lookup.png" alt="Edit" width="30" height="30">
                            </a>
                            </td> 
                          </tr>
                          @endforeach
                      <!-- <tr>
                          <th scope="row">1</th>
                          <td>Khesya Belinda</td>
                          <td>222112135</td>
                          <td>3SD2</td>
                          <td class="highlighted-text">Belum disetujui</td>
                          <td class="edit-button">
                            <a href="pemlap-laporan-akhir-lookup">
                                <img src="assets/img/logo-lookup.png" alt="Edit" width="30" height="30">
                            </a>
                          </td>                      
                        </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Sabilla</td>
                        <td>222112123</td>
                        <td>3SD2</td>
                        <td class="highlighted-text">Belum disetujui</td>
                        <td class="edit-button">
                          <a href="pemlap-laporan-akhir-lookup">
                              <img src="assets/img/logo-lookup.png" alt="Edit" width="30" height="30">
                          </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Fauzan</td>
                        <td>222112138</td>
                        <td>3SD2</td>
                        <td class="highlighted-text">Belum disetujui</td>
                        <td class="edit-button">
                          <a href="pemlap-laporan-akhir-lookup">
                              <img src="assets/img/logo-lookup.png" alt="Edit" width="30" height="30">
                          </a>
                        </td> 
                      </tr> -->
                  </tbody>
              </table>
            </div>
          </div>
    </section>
  </main><!-- End #main -->
@endsection