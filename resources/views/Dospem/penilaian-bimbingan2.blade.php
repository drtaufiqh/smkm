@extends('layouts.main')

@section('container')
    @include('partials.sidebar-dospem')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penilaian Bimbingan Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dospem/dashboard">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
          <div class="card" style="width: fit-content;">
            <div class="card-body">

                <ul class="info-list">
                    <li><b>Tempat Magang:</b> Nama Tempat Magang</li>
                    <li><b>NIM:</b> Nomor NIM</li>
                    <li><b>Nama:</b> Nama Mhs</li>
                    <li><b>Semester:</b> Semester</li>
                    <li><b>Tahun Akademik 2025/2026</b></li>
                </ul>

                <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th scope="col" rowspan="2">No</th>
                          <th scope="col" rowspan="2">Kriteria</th>
                          <th scope="col" colspan="1">Kurang Memuaskan</th>
                          <th scope="col" colspan="1">Memuaskan</th>
                          <th scope="col" colspan="1">Sangat Memuaskan</th>
                          <th scope="col" colspan="1">Skor</th>
                          <th scope="col" rowspan="2">Action</th>
                      </tr>
                      <tr class="edit-text">
                        <td>Range nilai 50-69</td>
                        <td>Range nilai 70-85</td>
                        <td>Range nilai 86-100</td>
                        <td>50-100</td>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>Inisiatif</td>
                          <td>Tidak pernah menyampaikan ide/gagasan dalam melaksanakan bimbingan magang</td>
                          <td>Beberapa kali menyampaikan ide/gagasan dalam melaksanakan bimbingan magang</td>
                          <td>Sering menyampaikan ide/gagasan dalam melaksanakan bimbingan magang</td>
                          <td class="skor-text">89</td>
                          <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                          </td>                      
                        </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Disiplin</td>
                        <td>Jarang menyusun penulisan laporan magang dengan tepat waktu sesuai target</td>
                        <td>Hampir selalu menyusun penulisan laporan magang dengan tepat waktu sesuai target</td>
                        <td>Selalu menyusun penulisan laporan magang dengan tepat waktu sesuai target</td>
                        <td class="skor-text">90</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Ketekunan</td>
                        <td>Jarang melaksanakan penulisan laporan magang sampai selesai dengan kualitas yang baik</td>
                        <td>Hampir selalu melaksanakan penulisan laporan magang sampai selesai dengan kualitas yang baik</td>
                        <td>Selalu melaksanakan penulisan laporan magang sampai selesai dengan kualitas yang baik</td>
                        <td class="skor-text">98</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Berpikir kritis, kreatif, dan analisis</td>
                        <td>Kurang menunjukkan kemampuan berfikir kritis, kreatif, dan analitis yang cukup baik</td>
                        <td>Selalu menunjukkan kemampuan berfikir kritis, kreatif, dan analitis yang baik</td>
                        <td>Selalu menunjukkan kemampuan berfikir kritis, kreatif, dan analitis yang sangat baik</td>
                        <td class="skor-text">92</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Kemampuan komunikasi (lisan maupun tulisan)</td>
                        <td>Kurang mampu melakukan komunikasi (tertulis/lisan) dalam bimbingan dan atau presentasi</td>
                        <td>Mampu melakukan komunikasi (tertulis/lisan) dalam bimbingan dan atau presentasi</td>
                        <td>Mampu melakukan komunikasi (tertulis/lisan) dalam bimbingan/presentasi dengan sangat baik</td>
                        <td class="skor-text">94</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row" colspan="5">Nilai Akhir</th>
                        <td id="rata-rata" class="skor-text" colspan="2"></td>
                      </tr>
                  </tbody>
              </table>
              <a href="penilaian-bimbingan1" class="btn btn-success float-end">Finalisasi</a>
            </div>
          </div>
    </section>

    <!-- Vertically centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Penilaian Bimbingan Mahasiswa</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul class="info-list">
                <li><b>NIM:</b> Nomor NIM</li>
                <li><b>Nama:</b> Nama Mhs</li>
                <li><b>Tempat Magang:</b> Nama Tempat Magang</li>
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

  </main><!-- End #main -->
@endsection