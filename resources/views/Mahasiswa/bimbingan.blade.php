@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Detail Bimbingan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/mahasiswa/jadwal_bimbingan">Jadwal Bimbingan</a>
            </li>
            <li class="breadcrumb-item active">Detail Bimbingan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Bimbingan 1</h5>
                <div class="d-lg-flex flex-lg-row justify-content-lg-between">
                  <p>Sukarno</p>
                  <p class="card-text">16 November 2023</p>
                  <p class="card-text">16.00 WIB</p>
                  <p class="card-text">Sujiwo Tejo</p>
                  <a href="#">Ruang Virtual 30</a>
                </div>
                <hr />
              </div>
              <div class="card-body">
                <div class="activity">
                  <div class="activity-item d-flex">
                    <div class="activite-label">Kehadiran dianulir</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-danger align-self-start"
                    ></i>
                    <div class="activity-content">
                      <div class="card mb-0 bg-danger-light">
                        <div class="card-body p-2">
                          <a>Kehadiran dianulir pada 12.30 WIB</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End activity item-->
                  <div class="activity-item d-flex">
                    <div class="activite-label">Pokok bahasan</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <!-- <div class="card mb-2 bg-dark-light"> -->
                      <div class="card-body p-0">
                        <form class="p-0" action="">
                          <div class="form d-flex flex-row">
                            <input
                              type="text"
                              class="form-control"
                              id="floatingBahasanIsi"
                              placeholder="Membahas masalah negara"
                              disabled
                            />
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="activity-item d-flex">
                    <div class="activite-label">Pokok bahasan</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-warning align-self-start"
                    ></i>
                    <div class="activity-content">
                      <!-- <div class="card mb-2 bg-dark-light"> -->
                      <div class="card-body p-0">
                        <form class="p-0" action="">
                          <div class="form d-flex flex-row">
                            <input
                              type="text"
                              class="form-control"
                              id="floatingBahasan"
                              placeholder=""
                            />

                            <button type="submit" class="btn btn-primary m-2">
                              <i class="bi bi-send"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="activity-item d-flex">
                    <div class="activite-label">Kehadiran</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content"><span>12.03 WIB</span></div>
                  </div>
                  <!-- End activity item-->
                  <div class="activity-item d-flex">
                    <div class="activite-label">Bimbingan telah tiba</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content">
                      <button class="btn btn-primary btn-sm">Hadir</button>
                    </div>
                  </div>
                  <!-- End activity item-->
                  <div class="activity-item d-flex">
                    <div class="activite-label">Bimbingan akan tiba</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-success align-self-start"
                    ></i>
                    <div class="activity-content">Tiba dalam <b>3 hari</b></div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Bimbingan mengganti</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-danger align-self-start"
                    ></i>
                    <div class="activity-content">
                      <div class="card mb-2 bg-primary-light">
                        <div class="card-body p-2">
                          <div
                            class="d-flex flex-lg-row flex-sm-column justify-content-lg-between align-items-center"
                          >
                            <a>Sukarno</a>
                            <a>16 November 2023</a>
                            <a>16.00 WIB</a>
                            <a>Sujiwo Tejo</a>
                            <a href="#">Ruang Virtual 30</a>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-0">
                        <div class="card-body p-2">
                          <div
                            class="d-flex flex-lg-row flex-sm-column justify-content-lg-between align-items-center"
                          >
                            <a>Sukarno</a>
                            <a>12 November 2023</a>
                            <a>16.00 WIB</a>
                            <a>Sujiwo Tejo</a>
                            <a href="#">Ruang Virtual 30</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End activity item-->

                  <div class="activity-item d-flex">
                    <div class="activite-label">Bimbingan dibuat</div>
                    <i
                      class="bi bi-circle-fill activity-badge text-primary align-self-start"
                    ></i>
                    <div class="activity-content">20 Oktober 2023</div>
                  </div>
                  <!-- End activity item-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection