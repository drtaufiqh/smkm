@extends('layouts.main')

@section('container')
    @include('partials.sidebar-dospem')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard Dosen Pembimbing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dospem/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Bimbingan <span>| Jadwal terdekat</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-date"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Senin</h6>
                      <span class="text-success small pt-1 fw-bold">6 November 2023</span>
                      <span class="text-muted small pt-2 ps-1">Online</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Kartu Kendali <span>| Approval</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>12</h6>
                      <span class="text-success small pt-1 fw-bold">Belum disetujui</span>
                      <span class="text-muted small pt-2 ps-1">dari 30 mahasiswa</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

          
            <div class="row">
              <!-- Card pertama -->
              <div class="col-xxl-4 col-md-4">
                <div class="card">
            
                  <div class="card-body pb-0">
                    <h5 class="card-title">Laporan Akhir <span>| Approval</span></h5>
            
                    <div id="trafficChart1" style="min-height: 400px;" class="echart"></div>
            
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        echarts.init(document.querySelector("#trafficChart1")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{
                          name: 'Access From',
                          type: 'pie',
                          radius: ['40%', '70%'],
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
                              value: 1048,
                              name: 'Telah disetujui',
                              itemStyle: {
                                color: 'blue'
                              }
                            },
                            {
                              value: 484,
                              name: 'Belum disetujui',
                              itemStyle: {
                                color: 'red'
                              }
                            }
                          ]
                        }]
                      });
                    });
                    </script>
                  </div>
                </div>
              </div>
            
              <!-- Card kedua -->
              <div class="col-xxl-4 col-md-4">
                <div class="card">
            
                  <div class="card-body pb-0">
                    <h5 class="card-title">Bimbingan <span>| Penilaian</span></h5>
            
                    <div id="trafficChart2" style="min-height: 400px;" class="echart"></div>
            
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        echarts.init(document.querySelector("#trafficChart2")).setOption({
                          tooltip: {
                            trigger: 'item'
                          },
                          legend: {
                            top: '5%',
                            left: 'center'
                          },
                          series: [{
                            name: 'Access From',
                            type: 'pie',
                            radius: ['40%', '70%'],
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
                                value: 100,
                                name: 'Telah dinilai',
                                itemStyle: {
                                  color: 'blue'
                                }
                              },
                              {
                                value: 60,
                                name: 'Belum dinilai',
                                itemStyle: {
                                  color: 'red'
                                }
                              }
                            ]
                          }]
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>

              <!-- Card ketiga-->
              <div class="col-xxl-4 col-md-4">
                <div class="card">
            
                  <div class="card-body pb-0">
                    <h5 class="card-title">Laporan Akhir <span>| Penilaian</span></h5>
            
                    <div id="trafficChart3" style="min-height: 400px;" class="echart"></div>
            
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        echarts.init(document.querySelector("#trafficChart3")).setOption({
                          tooltip: {
                            trigger: 'item'
                          },
                          legend: {
                            top: '5%',
                            left: 'center'
                          },
                          series: [{
                            name: 'Access From',
                            type: 'pie',
                            radius: ['40%', '70%'],
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
                                value: 20,
                                name: 'Telah dinilai',
                                itemStyle: {
                                  color: 'blue'
                                }
                              },
                              {
                                value: 50,
                                name: 'Belum dinilai',
                                itemStyle: {
                                  color: 'red'
                                }
                              }
                            ]
                          }]
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection