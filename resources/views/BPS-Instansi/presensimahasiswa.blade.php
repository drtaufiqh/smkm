@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Presensi Mahasiswa BPS Kabupaten/Kota</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/bps-instansi/mahasiswa">Mahasiswa</a></li>
          <li class="breadcrumb-item active">Presensi Mahasiswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
          <div class="col-md-6">
            <!-- Tabel -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Tabel Presensi Mahasiswa</h5>
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hadir</td>
                      <td>15</td>
                    </tr>
                    <tr>
                      <td>Absen</td>
                      <td>4</td>
                    </tr>
                    <tr>
                      <td>Terlambat A</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>Terlambat B</td>
                      <td>6</td>
                    </tr>
                    <tr>
                      <td>Izin</td>
                      <td>3</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- End Tabel -->
      
          </div>
      
          <div class="col-md-6">
            <!-- Grafik -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Minggu ini</a></li>
                  <li><a class="dropdown-item" href="#">Bulan ini</a></li>
                </ul>
              </div>
      
              <div class="card-body pb-0">
                <h5 class="card-title">Rekapitulasi Presensi Chart</h5>
                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        type: 'pie',
                        radius: ['0%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: 15,
                            name: 'Hadir'
                          },
                          {
                            value: 4,
                            name: 'Absen'
                          },
                          {
                            value: 3,
                            name: 'Terlambat A'
                          },
                          {
                            value: 6,
                            name: 'Terlambat B'
                          },
                          {
                            value: 3,
                            name: 'Izin'
                          }
                        ]
                      }]
                    });
                  });
                </script>
              </div>
            </div><!-- End Grafik -->
          </div>
        </div>
      </section>

  </main><!-- End #main -->
@endsection