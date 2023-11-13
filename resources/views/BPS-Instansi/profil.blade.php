@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil BPS Kota Jakarta Timur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Profil BPS Kabupaten/Kota</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>BPS Kabupaten/Kota</h2>
              <h3>Kota Jakarta Timur</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-lokasi">Lokasi Peta</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tentang</h5>
                  <p class="small fst-italic">BPS Kota Jakarta Timur adalah Badan Pusat Statistik (BPS) yang beroperasi di tingkat kota Jakarta Timur, yang merupakan salah satu wilayah administratif di Jakarta, Indonesia. Seperti BPS Provinsi Jakarta, BPS Kota Jakarta Timur bertanggung jawab untuk mengumpulkan, mengelola, dan menyediakan data statistik resmi untuk kota Jakarta Timur.</p>

                  <h5 class="card-title">Profil Detail BPS</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Instansi</div>
                    <div class="col-lg-9 col-md-8">BPS Kota Jakarta Timur</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                    <div class="col-lg-9 col-md-8">DKI Jakarta</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Negara</div>
                    <div class="col-lg-9 col-md-8">Indonesia</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kepala BPS</div>
                    <div class="col-lg-9 col-md-8">Dwi Paramita Dewi</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">Jl. Cipinang Baru Raya No.14, RT.2/RW.18, Cipinang, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13240</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                </div>

              
                <div class="tab-pane fade pt-3" id="profile-lokasi">
                  <!-- Change Password Form -->
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-center">Lokasi BPS Jakarta Timur</h5>
                        
                        <div class="text-center">
                          <iframe
                            src="https://maps.app.goo.gl/VjJVxe4nWof1evFP8"
                            width="100%"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                          ></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
  
    </section>

  </main><!-- End #main -->
@endsection