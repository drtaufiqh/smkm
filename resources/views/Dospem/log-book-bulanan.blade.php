@extends('layouts.main')

@section('container')
    @include('partials.sidebar-dospem')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Log Book Bulanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Log Book Bulanan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <div class="table-responsive">
                  <table class="table datatable table-hover">
                    <h5 class="card-title">Log Book Bulanan</h5>
                    <thead>
                      <tr>
                        <th scope="col" rowspan="2" class="align-middle">No</th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Kegiatan
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Satuan
                        </th>
                        <th scope="col" colspan="3" class="text-center">
                          Kuantitas
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Kualitas
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Keterangan
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Nilai
                        </th>
                      </tr>
                      <tr>
                        <th scope="col">Target</th>
                        <th scope="col">Realisasi</th>
                        <th scope="col">%</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Membaca buku Soekarno</td>
                        <td>Halaman</td>
                        <td>100</td>
                        <td>90</td>
                        <td>90%</td>
                        <td>
                          <div class="progress">
                            <div
                              class="progress-bar"
                              role="progressbar"
                              style="width: 90%"
                              aria-valuenow="90"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            >
                              90%
                            </div>
                          </div>
                        </td>
                        <td class="text-center">-</td>
                        <td>90</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Menulis buku Soekarno</td>
                        <td>Halaman</td>
                        <td>100</td>
                        <td>80</td>
                        <td>80%</td>
                        <td>
                          <div class="progress">
                            <div
                              class="progress-bar"
                              role="progressbar"
                              style="width: 90%"
                              aria-valuenow="90"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            >
                              90%
                            </div>
                          </div>
                        </td>
                        <td class="text-center">-</td>
                        <td>90</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection