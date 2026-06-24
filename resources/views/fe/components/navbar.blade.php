<style>
    .navbar-nav .nav-link {
        font-size: 14px !important;
        padding-left: 8px !important;
        padding-right: 8px !important;
    }

    .navbar .navbar-brand span {
        font-size: 14px;
    }

    .navbar-nav .dropdown-toggle.active {
        color: var(--color-white) !important;
        opacity: 1 !important;
    }

    @media (max-width: 991px) {
        .dropdown-menu {
            background-color: transparent !important;
            border: none !important;
            padding-left: 16px;
        }
        .dropdown-menu .dropdown-item {
            color: rgba(255,255,255,0.8) !important;
            font-size: 12px;
        }
        .dropdown-menu .dropdown-item:hover {
            background: transparent !important;
            color: white !important;
        }
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="https://unama.ac.id/" target="_blank"><img src="{{ asset('image/unama.png') }}" alt="" style="width: 40px; height: 40px; margin-right: 90px"></a>
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <i class="bi-building"></i>
            <span>{{ $masjid->nama ?? 'E Masjid' }}</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="{{ url('/admin/login') }}" class="navbar-icon bi-person"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-4 me-lg-auto">

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_1">Beranda</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#jadwal-shalat">Jadwal Shalat</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#jadwal-shalat">Jadwal Shalat</a>
                    @endif
                </li>

                {{-- Dropdown Informasi: Kas, Agenda, Berita, Kontak --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.index') && in_array(request()->get('section'), ['section_2','section_3','section_4','section_5']) ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi</a>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li>
                            @if(request()->routeIs('frontend.index'))
                                <a class="dropdown-item click-scroll" href="#section_2">Kas</a>
                            @else
                                <a class="dropdown-item" href="{{ route('frontend.index') }}#section_2">Kas</a>
                            @endif
                        </li>
                        <li>
                            @if(request()->routeIs('frontend.index'))
                                <a class="dropdown-item click-scroll" href="#section_3">Agenda Kegiatan</a>
                            @else
                                <a class="dropdown-item" href="{{ route('frontend.index') }}#section_3">Agenda Kegiatan</a>
                            @endif
                        </li>
                        <li>
                            @if(request()->routeIs('frontend.index'))
                                <a class="dropdown-item click-scroll" href="#section_4">Berita Acara</a>
                            @else
                                <a class="dropdown-item" href="{{ route('frontend.index') }}#section_4">Berita Acara</a>
                            @endif
                        </li>
                        <li>
                            @if(request()->routeIs('frontend.index'))
                                <a class="dropdown-item click-scroll" href="#section_5">Kontak</a>
                            @else
                                <a class="dropdown-item" href="{{ route('frontend.index') }}#section_5">Kontak</a>
                            @endif
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('frontend.kajian*') || request()->routeIs('frontend.pengumuman*') ? 'active' : '' }}"
                        href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kegiatan</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item {{ request()->routeIs('frontend.kajian*') ? 'active' : '' }}" href="{{ route('frontend.kajian') }}">Agenda Kegiatan</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('frontend.pengumuman*') ? 'active' : '' }}" href="{{ route('frontend.pengumuman') }}">Berita Acara</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.alquran*') ? 'active' : '' }}" href="{{ route('frontend.alquran') }}">Al-Quran</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.saran*') ? 'active' : '' }}" href="{{ route('frontend.saran') }}">Saran & Masukan</a>
                </li>

            </ul>

            <div class="d-none d-lg-block">
                <a href="{{ url('/admin/login') }}" class="navbar-icon bi-person"></a>
            </div>
        </div>
    </div>
</nav>