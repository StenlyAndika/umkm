<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img d-flex align-middle">
                <img src="/img/tablogo.webp" width="40" alt="" />&nbsp;
                <h4 class="text-wrap">UMKM Kota Sungai Penuh</h4>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class='bx bxs-dashboard' ></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @cannot('admin', 'super')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.produk.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Produk</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.peserta.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Data Event</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Data UMKM</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.profilumkm') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Profil UMKM</span>
                        </a>
                    </li>
                @endcannot
                @can('admin')
                    @cannot('super')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.ukm.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Data UKM</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.event.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Data Event</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.event.peserta') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Data Peserta Event</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Data Master</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.bidang_usaha.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bx-data'></i>
                            </span>
                            <span class="hide-menu">Bidang Usaha</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.desa.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-building-house'></i>
                            </span>
                            <span class="hide-menu">Data Desa</span>
                        </a>
                        <a class="sidebar-link" href="{{ route('admin.instansi.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Profil Instansi</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Laporan</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporan') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Desa</span>
                        </a>
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporankecamatan') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Kecamatan</span>
                        </a>
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporankota') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Kota</span>
                        </a>
                    </li>
                    @endcannot
                @endcan
                @can('super')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Data Master</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.user.index') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-user-rectangle' ></i>
                            </span>
                            <span class="hide-menu">User</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Laporan</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporan') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Desa</span>
                        </a>
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporankecamatan') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Kecamatan</span>
                        </a>
                        <a class="sidebar-link" href="{{ route('admin.ukm.laporankota') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-report' ></i>
                            </span>
                            <span class="hide-menu">Rekap Kota</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->