@extends('layouts.main')

@section('container')
    @include('partials.sidebar-dospem')
            <!-- Content -->

<main id="main" class="main">
    <section class="section">

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card app-calendar-wrapper">
                <div class="row g-0">
                  <!-- Calendar Sidebar -->
                  <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                    <div class="border-bottom p-4 my-sm-0 mb-3">
                      <div class="d-grid">
                        <button
                          class="btn btn-primary btn-toggle-sidebar"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#addEventSidebar"
                          aria-controls="addEventSidebar"
                        >
                          <i class="bi bi-calendar-plus-fill me-1"></i>
                          <span class="align-middle">Buat Jadwal</span>
                        </button>
                      </div>
                    </div>
                    <div class="p-3">
                      <!-- inline calendar (flatpicker) -->
                      <div class="inline-calendar"></div>

                      <hr class="container-m-nx mb-4 mt-3" />
                    </div>

                    <!-- /Kartu Kendali -->
                    <div class="mb-3 ms-3">
                        <small class="text-small text-muted text-uppercase align-middle">Kartu Kendali</small>
                    </div>
                    
                    <div class="mb-3 ms-3" style="overflow-x: auto; overflow-y: align-self: unset;;">
                        <table class="table table-bordered" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($jadwal_bimbingans as $jadwal_bimbingan)
                                <tr>
                                  <td>{{ $jadwal_bimbingan->tanggal }}</td>
                                  <td>Jane Doe</td>
                                  <td>Telah Disetujui</td>
                                  <td class="edit-button">
                                      <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                          <img src="assets/img/logo-lookup.png" alt="Edit" width="30" height="30">
                                      </a>
                                  </td>   
                                </tr>
                              @endforeach
                                <!-- Anda dapat menambahkan baris-baris lain sesuai dengan data Anda -->
                            </tbody>
                        </table>                          
                    </div>

                    <!-- Vertically centered Modal -->
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title"><b>Kartu Kendali</b></h5>
                              </div>
                              <div class="modal-body">
                                <ul class="info-list">
                                    <li><b>NIM:</b> Nomor NIM</li>
                                    <li><b>Nama:</b> Nama Mhs</li>
                                    <li><b>Tempat Magang:</b> Nama Tempat Magang</li>
                                    <li><b>Pokok Pembahasan:</b>Pembahasan</li>
                                </ul>          
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Revisi</button>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Setujui</button>
                              </div>
                          </div>
                        </div>
                    </div><!-- End Vertically centered Modal-->
                                        
                  </div>
                  <!-- /Calendar Sidebar -->

                  <!-- Calendar & Modal -->
                  <div class="col app-calendar-content">
                    <div class="card shadow-none border-0">
                      <div class="card-body pb-0">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                      </div>
                    </div>
                    <div class="app-overlay"></div>
                    <!-- FullCalendar Offcanvas -->
                    <div
                      class="offcanvas offcanvas-end event-sidebar"
                      tabindex="-1"
                      id="addEventSidebar"
                      aria-labelledby="addEventSidebarLabel"
                    >
                      <div class="offcanvas-header my-1">
                        <h5 class="offcanvas-title" id="addEventSidebarLabel">Tambah Jadwal Bimbingan</h5>
                        <button
                          type="button"
                          class="btn-close text-reset"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="offcanvas-body pt-0">
                        <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                          <div class="mb-3">
                            <label class="form-label" for="eventTitle">Judul Bimbingan</label>
                            <input
                              type="text"
                              class="form-control"
                              id="eventTitle"
                              name="eventTitle"
                              placeholder="Event Title"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventStartDate">Tanggal Bimbingan</label>
                            <input
                              type="text"
                              class="form-control"
                              id="eventStartDate"
                              name="eventStartDate"
                              placeholder="Start Date"
                            />
                          </div>

                          <div class="row mb-3">
                            <label class="form-label" for="eventURL">Nama Mahasiswa</label>
                            <div class="col-sm-10">
          
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                  Khesya
                                </label>
                              </div>
          
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                <label class="form-check-label" for="gridCheck2">
                                  Sabilla
                                </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                <label class="form-check-label" for="gridCheck2">
                                  Brigitta
                                </label>
                              </div>

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                <label class="form-check-label" for="gridCheck2">
                                  Ajeng
                                </label>
                              </div>
          
                            </div>
                          </div>

                          <label class="form-label" for="eventURL">Pelaksanaan</label>
                          <div class="mb-3">
                            <label class="switch">
                              <input type="checkbox" class="switch-input online-switch" id="onlineSwitch" />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Online</span>
                            </label>
                          </div>
                          
                          <div class="mb-3" id="urlInputContainer" style="display: none;">
                            <label class="form-label" for="eventURL">Link Zoom</label>
                            <input
                              type="url"
                              class="form-control"
                              id="eventURL"
                              name="eventURL"
                              placeholder="https://www.google.com"
                            />
                          </div>
                          
                          <div class="mb-3">
                            <label class="switch">
                              <input type="checkbox" class="switch-input offline-switch" id="offlineSwitch" />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Offline</span>
                            </label>
                          </div>

                          <div class="mb-3" id="locationInputContainer" style="display: none;">
                            <label class="form-label" for="eventLocation">Lokasi</label>
                            <input
                              type="text"
                              class="form-control"
                              id="eventLocation"
                              name="eventLocation"
                              placeholder="Enter Location"
                            />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="eventDescription">Description</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                          </div>
                          <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                            <div>
                              <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                              <button
                                type="reset"
                                class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                                data-bs-dismiss="offcanvas"
                              >
                                Cancel
                              </button>
                            </div>
                            <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /Calendar & Modal -->
                </div>
              </div>
            </div> 
    </section>

    <script>
        // Mendapatkan referensi elemen switch dan elemen input URL
        const onlineSwitch = document.getElementById("onlineSwitch");
        const urlInputContainer = document.getElementById("urlInputContainer");
      
        // Menambahkan event listener untuk mendeteksi perubahan pada tombol switch
        onlineSwitch.addEventListener("change", function () {
          // Jika tombol switch aktif, tampilkan input URL, jika tidak, sembunyikan
          if (onlineSwitch.checked) {
            urlInputContainer.style.display = "block";
          } else {
            urlInputContainer.style.display = "none";
          }
        });
      </script>
      <script>
        // Mendapatkan referensi elemen switch dan elemen input lokasi
        const offlineSwitch = document.getElementById("offlineSwitch");
        const locationInputContainer = document.getElementById("locationInputContainer");
      
        // Menambahkan event listener untuk mendeteksi perubahan pada tombol switch
        offlineSwitch.addEventListener("change", function () {
          // Jika tombol switch aktif, tampilkan input lokasi, jika tidak, sembunyikan
          if (offlineSwitch.checked) {
            locationInputContainer.style.display = "block";
          } else {
            locationInputContainer.style.display = "none";
          }
        });
      </script>
</main>
            <!--/ Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                >
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                  </div>
                  <div>
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="assets/vendor/libs/moment/moment.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main-jadwal bimbingan.js"></script>

    <!-- Page JS -->
    <script src="assets/js/app-calendar-events.js"></script>
    <script src="assets/js/app-calendar.js"></script>

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
      
@endsection