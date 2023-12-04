    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/admin/dashboard" class="logo d-flex align-items-center">
            <img src="/assets/img/logo-smkm.png" alt="">
            <span class="d-none d-lg-block">SMKM</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ (Auth::user()->info()->foto) ?? "/storage/assets/img//1701535520_BPS.jpg" }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->info()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->showRole() }}</h6>
                        <span>SMKM</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @if (Auth::user()->showRole() != 'Admin')
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="profil">
                            <i class="bi bi-person"></i>
                            <span>Profil {{ Auth::user()->showRole() }}</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="password">
                            <i class="bi bi-key"></i>
                            <span>Ubah Password</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
      <!-- End Header -->