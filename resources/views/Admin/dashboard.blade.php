@extends('layouts.main')

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin-dashboard">Home</a></li>
          <li class="breadcrumb-item active">Ringkasan Informasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="row">
  
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-center">Lokasi Magang Mahasiswa</h5>
                    
                              <!-- Bar Chart -->
                              <div id="barChart"></div>
                
                              <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                  new ApexCharts(document.querySelector("#barChart"), {
                                    series: [{
                                      data: [400,  448, 470, 1100]
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
                                      categories: ['Belum Menentukan','Menunggu','Final','Ditolak'],
                                    }
                                  }).render();
                                });
                              </script>
                              <!-- End Bar Chart -->
                
                            </div>
                          </div>
                        </div>
  
              
                        <div class="col-lg-6">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title text-center">Dosen Pembimbing Magang Mahasiswa</h5>
                  
                                <!-- Doughnut Chart -->
                                <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                                <script>
                                  document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#doughnutChart'), {
                                      type: 'doughnut',
                                      data: {
                                        labels: [
                                          'Belum Ditentukan',
                                          'Sudah Ditentukan'
                                        ],
                                        datasets: [{
                                          label: 'My First Dataset',
                                          data: [300, 50],
                                          backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)'
                                          ],
                                          hoverOffset: 4
                                        }]
                                      }
                                    });
                                  });
                                </script>
                                <!-- End Doughnut CHart -->
                  
                              </div>
                            </div>
                        </div>
  
              
                        <div class="col-lg-6 ">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title text-center">Laporan Akhir Magang Mahasiswa</h5>
                  
                                <!-- Pie Chart -->
                                <canvas id="pieChart" style="max-height: 200px;"></canvas>
                                <script>
                                  document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#pieChart'), {
                                      type: 'pie',
                                      data: {
                                        labels: [
                                          'Sudah Disetujui',
                                          'Belum Disetujui'
                                        ],
                                        datasets: [{
                                          label: 'My First Dataset',
                                          data: [50, 100],
                                          backgroundColor: [
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                          ],
                                          hoverOffset: 4
                                        }]
                                      }
                                    });
                                  });
                                </script>
                                <!-- End Pie CHart -->
                  
                              </div>
                            </div>
                            <a href="#">
                            <div class="text-center mt-5 text-center" style="color: white;">
                                <button type="button" class="btn btn-success btn-lg">Lihat Database</button>
                            </div>
                            </a>
                          </div>

             
                  
      </section>

  </main><!-- End #main -->
@endsection