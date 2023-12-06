
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'dashboard') ? '' : 'collapsed'}}" href="/bps-provinsi/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'lokasi') ? '' : 'collapsed'}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Lokasi Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content  {{ ($sidebar === 'lokasi') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/bps-provinsi/approvalmahasiswa/{{ Auth::user()->info()->kabKota->provinsi->id }}" class="{{ $circle_sidebar === 'approval' ? 'active' : '' }}" >
              <i class="bi bi-circle"></i><span>Penentuan Lokasi Magang</span>
            </a>
          </li>
          <li>
            <a href="/bps-provinsi/bandingmahasiswa/{{ Auth::user()->info()->kabKota->provinsi->id }}" class="{{ $circle_sidebar === 'banding' ? 'active' : '' }}" >
              <i class="bi bi-circle"></i><span>Banding Lokasi Magang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

  </aside><!-- End Sidebar-->
