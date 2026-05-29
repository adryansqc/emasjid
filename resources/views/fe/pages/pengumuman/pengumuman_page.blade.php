@extends('fe.layouts.app')

@section('title')
    Berita Acara
@endsection

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Homepage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita Acara</li>
                    </ol>
                </nav>

                <h2 class="text-white">Berita Acara <br> {{ $masjid->nama ?? 'E Masjid' }}</h2>
            </div>

            <div class="col-lg-5 col-12">
                <div class="topics-detail-block bg-white shadow-lg">
                    <img src="{{ asset('topik') }}/images/masjid-solo.jpg" class="topics-detail-block-image img-fluid">
                </div>
            </div>

        </div>
    </div>
</header>

<section class="topics-detail-section section-padding" id="topics-detail">
    <div class="container">

        @if($pengumuman->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted">Belum ada Berita Acara tersedia.</p>
            </div>
        @else
            <div class="row">
                @foreach($pengumuman as $item)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $item->judul }}</h5>

                            <p class="text-muted small mb-1">
                                Dibuat Pada
                            </p>
                            <p class="text-muted small mb-1">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }} WIB
                            </p>

                            {{-- <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i>
                                {{ $item->tempat }}
                            </p> --}}

                            <p class="card-text">{{ Str::limit($item->isi, 120) }}</p>

                            <a href="{{ route('frontend.pengumuman.detail', $item) }}" class="btn btn-primary btn-sm mt-2">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $pengumuman->links() }}
            </div>
        @endif

    </div>
</section>
@endsection