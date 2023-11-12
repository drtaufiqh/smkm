@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Log Book Bulanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
            <li class="breadcrumb-item active">Log Book Bulanan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <!-- Form Tambah Log Book -->
            <div class="card col-12 mx-auto fade show">
              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      Tambah Log Book
                    </button>
                  </h2>
                  <div
                    id="collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample"
                  >
                    <form class="form-log-book accordion-body row g-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingKegiatan"
                            placeholder="Kegiatan"
                          />
                          <label for="floatingKegiatan">Kegiatan</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingSatuan"
                            placeholder="Satuan"
                          />
                          <label for="floatingSatuan">Satuan</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingTarget"
                            placeholder="Target"
                          />
                          <label for="floatingTarget">Target</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingRealisasi"
                            placeholder="Realisasi"
                          />
                          <label for="floatingName">Realisasi</label>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingKeterangan"
                            placeholder="Keterangan"
                          />
                          <label for="floatingKeterangan">Keterangan</label>
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary m-2">
                          Tambah
                        </button>
                        <button type="reset" class="btn btn-secondary">
                          Reset
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Default Accordion Example -->
            </div>
            <!-- End Form Tambah Log Book -->
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <div class="table-responsive">
                  <table class="table datatable table-hover">
                    <h5 class="card-title">Log Book</h5>
                    <thead class="table-primary">
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
                      </tr>
                      <tr>
                        <th scope="col">Target</th>
                        <th scope="col">Realisasi</th>
                        <th scope="col">%</th>
                      </tr>
                    </thead>

                    <tbody>
                      @php $i = 0 @endphp
                      @foreach ($jurnaling_bulanans as $jurnaling_bulanan)
                      @php $i = $i + 1 @endphp
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $jurnaling_bulanan->uraian_kegiatan }}</td>
                        <td>{{ $jurnaling_bulanan->satuan }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_target }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_realisasi }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_realisasi }}%</td>
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
                            {{ $jurnaling_bulanan->tingkat_kualitas }}%
                            </div>
                          </div>
                        </td>
                        <td class="text-center">-</td>
                      </tr>
                      @endforeach
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