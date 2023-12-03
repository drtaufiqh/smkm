@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil {{ Auth::user()->info()->nama }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-provinsi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Ubah Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Keamanan</button>
                </li>
{{-- 
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-lokasi">Lokasi Peta</button>
                </li> --}}

              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  {{-- <h5 class="card-title">Akun</h5> --}}
                    @include('komponen.pesan')

                    <div class="row mt-2 mb-3 disabled">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" value="{{ Auth::user()->password }}">
                      </div>
                    </div>
                  <form action="" method="POST" action="{{ route('ubah_password_instansi', ['id' => Auth::user()->info()->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                      <label for="password_baru" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_baru" type="password" class="form-control" id="password_baru">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="ulangi_password_baru" class="col-md-4 col-lg-3 col-form-label">Ulangi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ulangi_password_baru" class="form-control" id="ulangi_password_baru">
                      </div>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </section>

  </main><!-- End #main -->
@endsection