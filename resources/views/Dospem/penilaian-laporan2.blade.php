@extends('layouts.main')

@section('container')
    @include('partials.sidebar-dospem')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penilaian Laporan Akhir Mahasiswa</h1>
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
                          <th scope="col" rowspan="2" colspan="2">LAPORAN MAGANG (Dinilai Dosen Pembimbing Mangan dan Pembimbing Lapangan)</th>
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
                        <td colspan="7">Laporan magang menyampaikan proses magang yang telah dilaksanakan (15%)</td>
                    </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Gambaran umum instansi tempat magang (5%)</td>
                          <td>Tidak ada kejelasan jenis instansi tempat magang</td>
                          <td>Ada kejelasan jenis instansi tempat magang</td>
                          <td>Sangat jelas menggambarkan gambaran instansi tempat magang</td>
                          <td class="skor-text">92</td>
                          <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                          </td>                      
                        </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Tugas mahasiswa selama magang dijelaskan dengan baik dan relevan dengan program studi (10%)</td>
                        <td>Tugas mahasiswa tidak dijelaskan dengan jelas dan baik</td>
                        <td>Tugas mahasiswa dijelaskan dengan baik namun masih ada yang kurang jelas</td>
                        <td>Tugas mahasiswa dijelaskan dengan jelas dan baik</td>
                        <td class="skor-text">89</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <td colspan="7">Laporan magang menguraikan hal-hal di bawah ini (70%)</td>
                    </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Pendahuluan/Latar belakang ditulis secara jelas (10%)</td>
                        <td>Latar belakang magang kurang menjelaskan tujuan magang dan alasan mengapa suatu topik dipilih untuk dibahas</td>
                        <td>Latar belakang magang menjelaskan tujuan magang dan alasan mengapa suatu topik dipilih untuk dibahas dengan cukup baik</td>
                        <td>Latar belakang magang menjelaskan tujuan magang dan alasan mengapa suatu topik dipilih untuk dibahas dengan sangat baik</td>
                        <td class="skor-text">98</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Keterkaitan antara kegiatan magang dengan mata kuliah (15%)</td>
                        <td>Keterkaitan kegiatan magang dengan mata kuliah kurang dapat dijelaskan</td>
                        <td>Keterkaitan kegiatan magang dengan mata kuliah cukup dapat dijelaskan</td>
                        <td>Keterkaitan kegiatan magang dengan mata kuliah dapat dijelaskan dengan tepat dan baik</td>
                        <td class="skor-text">92</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Refleksi diri mencerminkan proses pembelajaran selama magang secara pribadi, meliputi aspek <i>technical skill</i> dan <i>social-emotional skill</i> 25%</td>
                        <td>Releksi diri mahasiswa dijelaskan tidak meliputi kedua aspek tersebut (tidak lengkap)</td>
                        <td>Releksi diri mahasiswa dijelaskan lengkap (2 aspek) belum lengkap</td>
                        <td>Releksi diri mahasiswa dijelaskan lengkap (2 aspek) dengan lengkap dan baik</td>
                        <td class="skor-text">90</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>Kesimpulan sesuai dengan pembahasan (10%)</td>
                        <td>Kesimpulan dirumuskan tidak sesuai dengan pembahasan</td>
                        <td>Kesimpulan dirumuskan kurang sesuai dengan pembahasan</td>
                        <td>Kesimpulan dirumuskan sesuai dengan pembahasan</td>
                        <td class="skor-text">94</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Saran untuk institusi yang terkait dengan pembahasan di Bab 3 (10%)</td>
                        <td>Saran tidak sesuai dengan pembahasan</td>
                        <td>Saran cukup sesuai dengan pembahasan</td>
                        <td>Saran sesuai dengan pembahasan</td>
                        <td class="skor-text">88</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <td colspan="7">Laporan magang ditulis dengan pengorganisasian yang baik (15%)</td>
                    </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Mengikuti penduan laporan magang yang berlaku di Politeknik Statistika STIS (5%)</td>
                        <td>Laporan ditulis tidak sesuai dengan panduan</td>
                        <td>Laporan ditulis kurang sesuai dengan panduan</td>
                        <td>Laporan ditulis sesuai dengan panduan</td>
                        <td class="skor-text">97</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Logika penyajian yang runtun (5%)</td>
                        <td>Sususnan bab, paragraf, dan kalimat tidak sesuai dengan pengembangan ide, dengan penggunaan kata sambung yang kurang tepat</td>
                        <td>Sususnan bab, paragraf, dan kalimat sesuai dengan pengembangan ide, namun masih ada  penggunaan kata sambung yang kurang tepat</td>
                        <td>Sususnan bab, paragraf, dan kalimat sesuai dengan pengembangan ide, dengan didukung penggunaan kata sambung yang tepat</td>
                        <td class="skor-text">99</td>
                        <td class="edit-button">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                            </a>
                        </td> 
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Bahasa yang baku serta ilmiah (5%)</td>
                        <td>Tidak menggunakan bahasa Indonesia yang baku dan penggunaan sitasi/daftar referensi sesuai aturan yang benar</td>
                        <td>Menggunakan bahasa Indonesia yang baku namun penggunaan sitasi/daftar referensi belum sesuai aturan yang benar</td>
                        <td>Menggunakan bahasa Indonesia yang baku dan penggunaan sitasi/daftar referensi sesuai aturan yang benar</td>
                        <td class="skor-text">98</td>
                        <td class="edit-button">
                          <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                              <img src="/assets/img/edit-button.png" alt="Edit" width="30" height="30">
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" colspan="5">Nilai Akhir Laporan Magang</th>
                        <td id="rata-rata" class="skor-text" colspan="2"></td>
                      </tr>
                  </tbody>
              </table>
              <a href="penilaian-laporan1" class="btn btn-success float-end">Finalisasi</a>
            </div>
          </div>
    </section>

    <!-- Vertically centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Penilaian Laporan Akhir Mahasiswa</b></h5>
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