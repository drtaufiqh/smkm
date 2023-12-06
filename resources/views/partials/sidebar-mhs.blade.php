
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($sidebar === 'dashboard') ? '' : 'collapsed'}}" href="/mahasiswa/index">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- End Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link {{ ($sidebar === 'lokasi') ? '' : 'collapsed'}}" href="/mahasiswa/pemilihan-lokasi">
              <i class="bi bi-building"></i>
              <span>Lokasi</span>
            </a>
          </li>
          <!-- End Lokasi Nav -->
          
          <li class="nav-item">
            <a
              class="nav-link {{ ($sidebar === 'log book') ? '' : 'collapsed'}}"
              data-bs-target="#tables-nav"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="bi bi-journal-text"></i><span>Log Book</span
              ><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul
              id="tables-nav"
              class="nav-content {{ ($sidebar === 'log book') ? '' : 'collapse'}}"
              data-bs-parent="#sidebar-nav"
            >
              <li>
                <a class="{{ $circle_sidebar === 'harian' ? 'active' : '' }}" href="/mahasiswa/log-book-harian/{{ Auth::user()->info()->id }}">
                  <i class="bi bi-circle"></i><span>Harian</span>
                </a>
              </li>
              <li>
                <a  class="{{ $circle_sidebar === 'bulanan' ? 'active' : '' }}" href="/mahasiswa/log-book-bulanan/{{ Auth::user()->info()->id }}">
                  <i class="bi bi-circle"></i><span>Bulanan</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Log Book Nav -->
  
          <li class="nav-item">
            <a
              class="nav-link {{ ($sidebar === 'bimbingan') ? '' : 'collapsed'}}"
              data-bs-target="#bimbingan-nav"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="bi bi-person-workspace"></i><span>Bimbingan</span
              ><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul
              id="bimbingan-nav"
              class="nav-content {{ ($sidebar === 'bimbingan') ? '' : 'collapse'}}"
              data-bs-parent="#sidebar-nav"
            >
              <li>
                <a class="{{ $circle_sidebar === 'jadwal' ? 'active' : '' }}" href="/mahasiswa/jadwal-bimbingan">
                  <i class="bi bi-circle"></i><span>Jadwal</span>
                </a>
              </li>
              <li>
                <a class="{{ $circle_sidebar === 'kartu kendali' ? 'active' : '' }}" href="/mahasiswa/jadwal-bimbingan">
                  <i class="bi bi-circle"></i><span>Kartu Kendali</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Bimbingan Nav -->

          <li class="nav-item">
            <a class="nav-link {{ ($sidebar === 'laporan akhir') ? '' : 'collapsed'}}" href="/mahasiswa/laporan-akhir">
              <i class="bi bi-file-earmark-text"></i>
              <span>Laporan Akhir</span>
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar-->