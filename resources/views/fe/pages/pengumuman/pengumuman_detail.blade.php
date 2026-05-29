@extends('fe.layouts.app')


@section('og_title', $pengumuman->judul . ' - ' . ($masjid->nama ?? 'E Masjid'))
@section('og_description', Str::limit(strip_tags($pengumuman->isi), 160))
@section('og_type', 'article')
@section('title')
    {{ $pengumuman->judul }}
@endsection

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Homepage</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.kajian') }}">Berita Acara</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pengumuman->judul }}</li>
                    </ol>
                </nav>

                <h2 class="text-white">{{ $pengumuman->judul }}</h2>
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
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12">

                <div class="card border-0 shadow-sm p-4">
                    <h3 class="fw-bold mb-3">{{ $pengumuman->judul }}</h3>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <span class="text-muted">
                            Dibuat Pada
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('d F Y, H:i') }} WIB
                        </span>
                    </div>

                    <hr>

                    <div class="mt-3">
                        {!! nl2br(e($pengumuman->isi)) !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('frontend.pengumuman') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Berita Acara
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection