<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Website resmi ' . ($masjid->nama ?? 'E Masjid') . ' - Informasi kajian, berita acara, dan kegiatan masjid.')">
    <meta name="author" content="{{ $masjid->nama ?? 'E Masjid' }}">
    <meta name="keywords" content="@yield('meta_keywords', 'masjid, kajian, berita acara, kegiatan, ' . ($masjid->nama ?? 'E Masjid'))">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="@yield('og_title', ($masjid->nama ?? 'E Masjid'))">
    <meta property="og:description" content="@yield('og_description', 'Website resmi ' . ($masjid->nama ?? 'E Masjid') . ' - Informasi kajian, berita acara, dan kegiatan masjid.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('topik') . '/images/favicon-masjid.png')">
    <meta property="og:site_name" content="{{ $masjid->nama ?? 'E Masjid' }}">
    <meta property="og:locale" content="id_ID">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('og_title', ($masjid->nama ?? 'E Masjid'))">
    <meta name="twitter:description" content="@yield('og_description', 'Website resmi ' . ($masjid->nama ?? 'E Masjid') . ' - Informasi kajian, berita acara, dan kegiatan masjid.')">
    <meta name="twitter:image" content="@yield('og_image', asset('topik') . '/images/favicon-masjid.png')">

    <title>@yield('title') - {{ $masjid->nama ?? 'E Masjid' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('topik') }}/images/favicon-masjid.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('topik') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('topik') }}/css/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('topik') }}/css/templatemo-topic-listing.css" rel="stylesheet">

    @stack('style')
</head>

<body id="top">

    @include('fe.components.navbar')

    @yield('content')

    @include('fe.components.footer')

    <script src="{{ asset('topik') }}/js/jquery.min.js"></script>
    <script src="{{ asset('topik') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('topik') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('topik') }}/js/click-scroll.js"></script>
    <script src="{{ asset('topik') }}/js/custom.js"></script>

    @stack('script')

    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;

            $('.navbar-nav .nav-item .nav-link').each(function() {
                var linkUrl = $(this).attr('href');
                if (linkUrl && currentUrl === linkUrl) {
                    $('.navbar-nav .nav-item .nav-link').removeClass('active').addClass('inactive');
                    $(this).addClass('active').removeClass('inactive');
                }
            });

            @if(request()->routeIs('frontend.kajian') || request()->routeIs('frontend.kajian.detail'))
                setActiveNav('{{ route('frontend.kajian') }}');
            @elseif(request()->routeIs('frontend.pengumuman') || request()->routeIs('frontend.pengumuman.detail'))
                setActiveNav('{{ route('frontend.pengumuman') }}');
            @elseif(request()->routeIs('frontend.saran'))
                setActiveNav('{{ route('frontend.saran') }}');
            @endif

            function setActiveNav(url) {
                $('.navbar-nav .nav-item .nav-link').removeClass('active').addClass('inactive');
                $('.navbar-nav .nav-item .nav-link[href="' + url + '"]').addClass('active').removeClass('inactive');
            }
        });
    </script>

</body>

</html>