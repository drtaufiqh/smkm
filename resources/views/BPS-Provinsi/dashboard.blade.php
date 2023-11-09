@extends('layouts.main')

@section('container')
    @include('partials.sidebar-prov')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard BPS Provinsi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bps-provinsi-dashboard">Home</a></li>
          <li class="breadcrumb-item active">Ringkasan Informasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
          <div class="row">
           
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body text-center">
                  <h5 class="card-title">BPS Provinsi</h5>
            
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bar-chart" style="font-size: 2rem;"></i> <!-- Mengatur ukuran ikon -->
                    </div>
                  </div>
            
                  <a href="bps-provinsi-approvalmahasiswa" class="btn btn-primary btn-lg my-1">Approval Mahasiswa</a>
                  <a href="bps-provinsi-bandingmahasiswa" class="btn btn-primary btn-lg my-1">Banding Mahasiswa</a>
                </div>
              </div>
            </div>

            
         
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title text-center">Informasi</h5>
            
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bar-chart" style="font-size: 2rem;"></i> <!-- Mengatur ukuran ikon -->
                    </div>
                  </div>
            
                  <div class="align-items-center text-center">
                    <div class="row">
                      <div class="col ms-4">
                        <a class="btn p-3 mb-2 border border-success m-2 text-white bg-success">Total Pengajuan<br><b>100 Mahasiswa</b></a>
                      </div>
                      <div class="col me-4">
                        <a class="btn p-3 mb-2 border border-success m-2 text-white bg-success">Total Banding<br><b>40 Mahasiswa</b></a>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col ms-4">
                        <a class="btn p-3 mb-2 border border-success m-2 text-white bg-success">Total Approval<br><b>100 Mahasiswa</b></a>
                      </div>
                      <div class="col me-4">
                        <a class="btn p-3 mb-2 border border-success m-2 text-white bg-success">Belum Approval<br><b>30 Mahasiswa</b></a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Sebaran Pengajuan Lokasi Mahasiswa</h5>
              
                        <!-- Bar Chart -->
                        <div id="barChart"></div>
          
                        <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                              series: [{
                                data: [400,  448, 470, 1100, 1200, 1380]
                              }],
                              chart: {
                                type: 'bar',
                                height: 350
                              },
                              plotOptions: {
                                bar: {
                                  borderRadius: 7,
                                  horizontal: true,
                                }
                              },
                              dataLabels: {
                                enabled: false
                              },
                              xaxis: {
                                categories: ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Barat', 'Kepulauan Seribu'],
                              }
                            }).render();
                          });
                        </script>
                        <!-- End Bar Chart -->
          
                      </div>
                    </div>
                  </div>

            </div>
            </div><!-- End Revenue Card -->
    </section>

  </main><!-- End #main -->
@endsection