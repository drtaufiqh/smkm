@extends('layouts.main')

@section('container')
    @include('partials.sidebar-pemlap')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penilaian Kinerja Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/pemlap/dashboard">Home</a></li>
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
                          <td>Tidak pernah menyampaikan ide/gagasan dalam melaksanakan pekerjaan magang</td>
                          <td>Beberapa kali menyampaikan ide/gagasan dalam melaksanakan pekerjaan magang</td>
                          <td>Sering menyampaikan ide/gagasan dalam melaksanakan pekerjaan magang</td>
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
                        <td>Jarang datang dan tidak menyelesaikan pekerjaan dengan tepat waktu</td>
                        <td>Hampir selalu datang dan menyelesaikan pekerjaan dengan tepat waktu</td>
                        <td>Selalu datang dan menyelesaikan pekerjaan dengan tepat waktu</td>
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
                        <td>Jarang melaksanakan pekerjaan sampai selesai dengan kualitas yang baik</td>
                        <td>Hampir selalu melaksanakan pekerjaan sampai selesai dengan kualitas yang baik</td>
                        <td>Selalu melaksanakan pekerjaan sampai selesai dengan kualitas yang baik</td>
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
                        <td>Menunjukkan kemampuan berfikir kritis, kreatif, dan analitis yang cukup baik</td>
                        <td>Menunjukkan kemampuan berfikir kritis, kreatif, dan analitis yang sangat baik</td>
                        <td class="skor-text">92</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Kemampuan beradaptasi</td>
                        <td>Kurang mampu beradaptasi dengan lingkungan kerja dan magang dengan baik</td>
                        <td>Mampu beradaptasi dengan lingkungan kerja dan magang dengan cukup baik</td>
                        <td>Mampu beradaptasi dengan lingkungan kerja dan magang dengan sangat baik</td>
                        <td class="skor-text">90</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>Kemampuan komunikasi (lisan maupun tulisan)</td>
                        <td>Kurang mampu melakukan komunikasi (tertulis/lisan) dalam pekerjaan</td>
                        <td>Mampu melakukan komunikasi (tertulis/lisan) dalam pekerjaan dengan cukup baik</td>
                        <td>Mampu melakukan komunikasi (tertulis/lisan) dalam pekerjaan dengan sangat baik</td>
                        <td class="skor-text">94</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Penampilan</td>
                        <td>Kurang memenuhi standar pekerjaan profesional di tempat kerja</td>
                        <td>Cukup memenuhi standar pekerjaan profesional di tempat kerja</td>
                        <td>Memenuhi standar pekerjaan profesional di tempat kerja</td>
                        <td class="skor-text">88</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Kemampuan Teknikal</td>
                        <td>Kurang menguasai kemampuan dasar teknis untuk melaksanakan pekerjaan magang</td>
                        <td>Cukup menguasai kemampuan dasar teknis untuk melaksanakan pekerjaan magang</td>
                        <td>Sangat menguasai kemampuan dasar teknis untuk melaksanakan pekerjaan magang</td>
                        <td class="skor-text">97</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Kemampuan Bekerjasama dalam Tim</td>
                        <td>Kurang mampu bekerjasama dalam tim</td>
                        <td>Dapat bekerjasama dalam tim cukup baik</td>
                        <td>Dapat bekerjasama dalam tim sangat baik</td>
                        <td class="skor-text">99</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Hasil Pekerjaan (Konstribusi)</td>
                        <td>Pekerjaan kurang memuaskan dan tidak memberikan kontribusi terhadap pekerjaan tim</td>
                        <td>Hasil pekerjaan  cukup memuaskan dan cukup memberikan kontribusi terhadap pekerjaan tim</td>
                        <td>Hasil pekerjaan memuaskan dan memberikan kontribusi terhadap pekerjaan tim</td>
                        <td class="skor-text">98</td>
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
              <a href="pages-blank" class="btn btn-success float-end">Finalisasi</a>
            </div>
          </div>
    </section>

    <!-- Vertically centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Penilaian Kinerja Mahasiswa</b></h5>
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