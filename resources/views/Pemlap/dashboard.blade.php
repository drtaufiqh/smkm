@extends('layouts.main')

@section('container')
    @include('partials.sidebar-pemlap')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard Pembimbing Lapangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pemlap-dashboard">Home</a></li>
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
                  <h5 class="card-title">Jurnal Harian <span>| Penilaian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>32</h6>
                      <span class="text-success small pt-1 fw-bold">Belum dinilai</span>
                      <span class="text-muted small pt-2 ps-1">dari 52 kegiatan</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Jurnal Bulanan <span>| Penilaian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journals"></i>
                    </div>
                    <div class="ps-3">
                      <h6>6</h6>
                      <span class="text-success small pt-1 fw-bold">Belum dinilai</span>
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
                    <h5 class="card-title">Kinerja <span>| Penilaian</span></h5>
            
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

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // Sembunyikan semua elemen yang memiliki class 'collapsed'
    document.querySelectorAll('.collapsed').forEach(function (el) {
        el.addEventListener('click', function () {
            this.classList.toggle('active');
        });
    });

    // Hanya satu dropdown yang akan terbuka pada satu waktu
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function (el) {
        el.addEventListener('click', function () {
            const targetId = this.getAttribute('href');
            document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function (otherEl) {
                if (otherEl !== el && otherEl.getAttribute('href') !== targetId) {
                    otherEl.classList.remove('active');
                }
            });
        });
    });
  </script>

</body>

</html>