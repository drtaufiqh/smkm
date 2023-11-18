@php
    if (!isset($sidebar)) {
      $sidebar = 'database';
    }
    if (!isset($circle_sidebar)) {
      $circle_sidebar = '';
    }
@endphp
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'dashboard') ? '' : 'collapsed'}}" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'database') ? '' : 'collapsed'}}" href="/admin/database">
          <i class="bi bi-database"></i>
          <span>Database</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}


            
      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'database') ? '' : 'collapsed'}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-geo-alt"></i><span>Database</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content {{ ($sidebar === 'database') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="dosen_pembimbings">
              <i class="bi bi-circle"></i><span>dosen_pembimbings</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="instansis" class="active">
              <i class="bi bi-circle"></i><span>instansis</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="jadwal_bimbingans" class="active">
              <i class="bi bi-circle"></i><span>jadwal_bimbingans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="jurnaling_bulanans" class="active">
              <i class="bi bi-circle"></i><span>jurnaling_bulanans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="jurnaling_harians" class="active">
              <i class="bi bi-circle"></i><span>jurnaling_harians</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="kab_kotas" class="active">
              <i class="bi bi-circle"></i><span>kab_kotas</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="kartu_kendalis" class="active">
              <i class="bi bi-circle"></i><span>kartu_kendalis</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="kecamatans" class="active">
              <i class="bi bi-circle"></i><span>kecamatans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="laporan_akhirs" class="active">
              <i class="bi bi-circle"></i><span>laporan_akhirs</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="pembimbing_lapangans" class="active">
              <i class="bi bi-circle"></i><span>pembimbing_lapangans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="pemilihan_lokasis" class="active">
              <i class="bi bi-circle"></i><span>pemilihan_lokasis</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="penilaian_bimbingans" class="active">
              <i class="bi bi-circle"></i><span>penilaian_bimbingans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="penilaian_kinerjas" class="active">
              <i class="bi bi-circle"></i><span>penilaian_kinerjas</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="penilaian_laporans" class="active">
              <i class="bi bi-circle"></i><span>penilaian_laporans</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="penilaians" class="active">
              <i class="bi bi-circle"></i><span>penilaians</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="provinsis" class="active">
              <i class="bi bi-circle"></i><span>provinsis</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'nama tabel' ? 'active' : '' }}" href="users" class="active">
              <i class="bi bi-circle"></i><span>users</span>
            </a>
          </li>
        </ul>
      </li>

            
      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'lokasi') ? '' : 'collapsed'}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-geo-alt"></i><span>Lokasi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content {{ ($sidebar === 'lokasi') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ $circle_sidebar === 'penentuan' ? 'active' : '' }}" href="/admin/penentuanlokasi">
              <i class="bi bi-circle"></i><span>Penentuan</span>
            </a>
          </li>
          <li>
            <a class="{{ $circle_sidebar === 'banding' ? 'active' : '' }}" href="/admin/bandinglokasi" class="active">
              <i class="bi bi-circle"></i><span>Banding</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'dosbing') ? '' : 'collapsed'}}" href="#">
          <i class="bi bi-person"></i>
          <span>Dosbing</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'laporan akhir') ? '' : 'collapsed'}}" href="#">
          <i class="bi bi-file-earmark-text"></i>
          <span>Laporan Akhir</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'penilaian') ? '' : 'collapsed'}}" href="#">
          <i class="bi bi-star"></i>
          <span>Penilaian</span>
        </a>
      </li>



  </aside><!-- End Sidebar-->
