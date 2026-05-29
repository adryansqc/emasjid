<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <i class="bi-building"></i>
            <span>{{ $masjid->nama ?? 'E Masjid' }}</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_1">Beranda</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_2">Kas</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_2">Kas</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_3">Agenda Kegiatan</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_3">Agenda Kegiatan</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_4">Berita Acara</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_4">Berita Acara</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->routeIs('frontend.index'))
                        <a class="nav-link click-scroll" href="#section_5">Kontak</a>
                    @else
                        <a class="nav-link" href="{{ route('frontend.index') }}#section_5">Kontak</a>
                    @endif
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kegiatan</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('frontend.kajian') }}">Halaman Agenda Kegiatan</a></li>

                        <li><a class="dropdown-item" href="{{ route('frontend.pengumuman') }}">Halaman Berita Acara</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="{{ url('/admin/login') }}" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>