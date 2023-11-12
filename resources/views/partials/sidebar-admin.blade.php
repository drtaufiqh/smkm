
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'dashboard') ? '' : 'collapsed'}}" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'database') ? '' : 'collapsed'}}" href="/admin/database">
          <i class="bi bi-database"></i>
          <span>Database</span>
        </a>
      </li><!-- End Dashboard Nav -->


            
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
