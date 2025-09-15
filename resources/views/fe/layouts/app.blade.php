<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title') - {{ $masjid->nama ?? 'E Masjid' }}</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="{{ asset('topik') }}/css/bootstrap.min.css" rel="stylesheet">

        <link href="{{ asset('topik') }}/css/bootstrap-icons.css" rel="stylesheet">

        <link href="{{ asset('topik') }}/css/templatemo-topic-listing.css" rel="stylesheet">      

        @stack('style')
    </head>
    
    <body id="top">

        <main>
            @include('fe.components.navbar')
            @yield('content')
        </main>
        @include('fe.components.footer')

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('topik') }}/js/jquery.min.js"></script>
        <script src="{{ asset('topik') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('topik') }}/js/jquery.sticky.js"></script>
        <script src="{{ asset('topik') }}/js/click-scroll.js"></script>
        <script src="{{ asset('topik') }}/js/custom.js"></script>

    </body>
</html>
