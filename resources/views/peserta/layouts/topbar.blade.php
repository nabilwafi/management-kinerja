<header class="header-section w-100">
    <nav class="navbar navbar-expand-lg nav-header w-100">
        <div class="container">
            <a href="/peserta" class="navbar-brand">Kegiatan</a>

            <div class="nav-list">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('peserta') ? "active" : "" }}" href="/peserta">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('peserta/kegiatanku/'.$peserta->id.'*') ? "active" : "" }}" href="/peserta/kegiatanku/{{ $peserta->id }}">Aktivitasku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Absensiku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peserta/history-kegiatan/{{$peserta->id}}">History Kegiatan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Mobile --}}
    <nav class="navbar nav-mobile bg-white w-100">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column" aria-current="page"
                        href="#">
                        <i class="bi bi-inbox-fill nav-icon"></i>
                        <p class="nav-name">Absensi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column {{ Request::is('peserta/kegiatanku/'.$peserta->id.'*') ? "active" : "" }}" aria-current="page"
                        href="/peserta/kegiatanku/{{ $peserta->id }}">
                        <i class="bi bi-clipboard-fill nav-icon"></i>
                        <p class="nav-name">Aktivitasku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column nav-home {{ Request::is('peserta') ? "active" : "" }}"
                        aria-current="page" href="/peserta">
                        <i class="bi bi-house-door-fill nav-icon"></i>
                        <p class="nav-name">Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column" aria-current="page"
                        href="/peserta/history-kegiatan/{{$peserta->id}}">
                        <i class="bi bi-hourglass-split nav-icon"></i>
                        <p class="nav-name">History Kegiatan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center align-items-center flex-column" aria-current="page"
                        href="#">
                        <i class="bi bi-person-fill nav-icon"></i>
                        <p class="nav-name">Akun</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- End of Mobile --}}
</header>
