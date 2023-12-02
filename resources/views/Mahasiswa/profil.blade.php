@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/mahasiswa/index">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ Auth::user()->info()->foto }}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->info()->nama }}</h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->nama }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIM</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->nim }}</div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->jenis_kelamin }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Handphone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->no_hp }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat Domisili</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->alamat_1 }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat di Luar Domisili</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->alamat_2 }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bank</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->bank }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Atas Nama Bank</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->an_bank }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Rekening</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->no_rek }}</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('editProfil', ['id' => Auth::user()->info()->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="foto" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img id="fotoPreview" src="{{ asset(Auth::user()->info()->foto) }}" alt="Profile">
                            <div class="pt-2">
                                <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage()">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="{{ Auth::user()->info()->nama }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nim" class="col-md-4 col-lg-3 col-form-label">NIM</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nim" type="text" class="form-control" id="nim" value="{{ Auth::user()->info()->nim }}">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" {{ (Auth::user()->info()->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ (Auth::user()->info()->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>                                                 

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" value="{{ Auth::user()->info()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_hp" type="text" class="form-control" id="no_hp" value="{{ Auth::user()->info()->no_hp }}">
                      </div>
                    </div>                  

                    <div class="row mb-3">
                        <label for="alamat_1" class="col-md-4 col-lg-3 col-form-label">Alamat Domisili</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="alamat_1" type="alamat_1" class="form-control" id="alamat_1" value="{{ Auth::user()->info()->alamat_1 }}">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="alamat_2" class="col-md-4 col-lg-3 col-form-label">Alamat di Luar Domisili</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="alamat_2" type="alamat_2" class="form-control" id="alamat_2" value="{{ Auth::user()->info()->alamat_2 }}">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="bank" class="col-md-4 col-lg-3 col-form-label">Bank</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="bank" type="bank" class="form-control" id="bank" value="{{ Auth::user()->info()->bank }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="an_bank" class="col-md-4 col-lg-3 col-form-label">Atas Nama Bank</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="an_bank" type="an_bank" class="form-control" id="an_bank" value="{{ Auth::user()->info()->an_bank }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="no_rek" class="col-md-4 col-lg-3 col-form-label">No Rekening</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="no_rek" type="no_rek" class="form-control" id="no_rek" value="{{ Auth::user()->info()->no_rek }}">
                        </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
    function previewImage() {
        var input = document.getElementById('foto');
        var preview = document.getElementById('fotoPreview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection