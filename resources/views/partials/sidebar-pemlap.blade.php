
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'dashboard') ? '' : 'collapsed'}}" href="/pemlap/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'mahasiswa') ? '' : 'collapsed'}}" href="/pemlap/database-mahasiswa">
          <i class="bi bi-file-earmark-person-fill"></i>
          <span>Database Mahasiswa</span>
        </a>
      </li><!-- End Database -->

      <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'jurnaling') ? '' : 'collapsed'}}" data-bs-toggle="collapse" href="#jurnalingNav" id="jurnalingToggle">
            <i class="bi bi-clipboard-data"></i><span>Jurnaling</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jurnalingNav" class="nav-content {{ ($sidebar === 'jurnaling') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
            <li>
                <a href="/pemlap/jurnal-harian" class="{{ $circle_sidebar === 'harian' ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Jurnal Harian</span>
                </a>
            </li>
            <li>
                <a href="/pemlap/jurnal-bulanan" class="{{ $circle_sidebar === 'bulanan' ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Jurnal Bulanan</span>
                </a>
            </li>
        </ul>
    </li><!-- Jurnaling -->

    <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'laporan akhir') ? '' : 'collapsed'}}" href="/pemlap/laporan-akhir">
            <i class="bi bi-book-fill"></i>
            <span>Laporan Akhir Magang</span>
        </a>
    </li><!-- End Laporan Akhir Nav -->

    <li class="nav-item">
        <a class="nav-link {{ ($sidebar === 'penilaian') ? '' : 'collapsed'}}" data-bs-toggle="collapse" href="#penilaianNav" id="penilaianToggle">
            <i class="bi bi-layout-text-window-reverse"></i><span>Penilaian</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="penilaianNav" class="nav-content {{ ($sidebar === 'penilaian') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
            <li>
                <a href="/pemlap/penilaian-kinerja1" class="{{ $circle_sidebar === 'kinerja' ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Penilaian Kinerja</span>
                </a>
            </li>
            <li>
                <a href="/pemlap/penilaian-laporan1" class="{{ $circle_sidebar === 'laporan' ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Penilaian Laporan</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tables Nav -->
</ul>
</aside><!-- End Sidebar-->
