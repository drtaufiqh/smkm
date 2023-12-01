@extends('layouts.main')

@section('container')
    @include('partials.sidebar-prov')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil {{ Auth::user()->info()->nama }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-provinsi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Profil BPS Provinsi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>BPS Provinsi</h2>
              <h3>{{ Auth::user()->info()->kabKota->provinsi->nama }}</h3>
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
{{-- 
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-lokasi">Lokasi Peta</button>
                </li> --}}

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tentang</h5>
                  <p class="small fst-italic">{{ Auth::user()->info()->nama }} adalah Badan Pusat Statistik (BPS) yang beroperasi di tingkat provinsi {{ Auth::user()->info()->kabKota->provinsi->nama }}, Indonesia. BPS adalah lembaga pemerintah yang bertanggung jawab untuk mengumpulkan, mengelola, dan menyediakan data statistik resmi untuk wilayah tersebut. Tugas utama {{ Auth::user()->info()->nama }} adalah mengumpulkan data statistik yang mencakup berbagai aspek kehidupan, seperti ekonomi, sosial, demografi, dan lingkungan.</p>

                  <h5 class="card-title">Profil Detail BPS</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Instansi</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->nama }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->kabKota->provinsi->nama }}</div>
                  </div>

                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kepala BPS</div>
                    <div class="col-lg-9 col-md-8">Dwi Paramita Dewi</div>
                  </div> --}}

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->alamat_lengkap }}</div>
                  </div>

                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div> --}}

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                </div>

              
                {{-- <div class="tab-pane fade pt-3" id="profile-lokasi">
                  <!-- Change Password Form -->
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-center">Lokasi BPS Provinsi Jakarta</h5>
                        
                        <div class="text-center">
                          <iframe
                            src="https://maps.app.goo.gl/cGzH8ZMyM6YVucdH7"
                            width="100%"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                          ></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
  
    </section>

  </main><!-- End #main -->
@endsection