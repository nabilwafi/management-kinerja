<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="/peserta"><img class="logo-icon me-2"
                    src={{ asset("/template/assets/images/app-logo.svg") }} alt="logo"><span
                    class="logo-text">PORTAL</span></a>

        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ $link == 'overview' ? "active" : "" }}" href="/peserta">
                        <span class="nav-icon">
                            <i class='bx bx-home-alt-2 bx-sm' ></i>
                        </span>
                        <span class="nav-link-text">Overview</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ $link == 'kegiatan' ? "active" : "" }}" href="/peserta/kegiatanku/1">
                        <span class="nav-icon">
                            <i class='bx bx-id-card bx-sm'></i>
                        </span>
                        <span class="nav-link-text">Kegiatanku</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ $link == 'absensi' ? "active" : "" }}" href="/peserta/absensi/1">
                        <span class="nav-icon">
                            <i class='bx bx-book-add bx-sm'></i>
                        </span>
                        <span class="nav-link-text">Data Absensi</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ $link == 'h_kegiatan' ? "active" : "" }}" href="/peserta/history-kegiatan/1">
                        <span class="nav-icon">
                            <i class='bx bx-history bx-sm' ></i>
                        </span>
                        <span class="nav-link-text">History Kegiatan</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->

    </div>
    <!--//sidepanel-inner-->
</div>
