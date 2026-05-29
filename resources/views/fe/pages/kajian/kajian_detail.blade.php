@extends('fe.layouts.app')

@section('title')
    {{ $kajian->nama_kegiatan }}
@endsection

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Homepage</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.kajian') }}">Agenda Kegiatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $kajian->nama_kegiatan }}</li>
                    </ol>
                </nav>

                <h2 class="text-white">{{ $kajian->nama_kegiatan }}</h2>
            </div>

            <div class="col-lg-5 col-12">
                <div class="topics-detail-block bg-white shadow-lg">
                    <img src="{{ asset('topik') }}/images/pengajian.jpg" class="topics-detail-block-image img-fluid">
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
                    <h3 class="fw-bold mb-3">{{ $kajian->nama_kegiatan }}</h3>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <span class="text-muted">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($kajian->tanggal)->translatedFormat('d F Y, H:i') }} WIB
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-geo-alt me-1"></i>
                            {{ $kajian->tempat }}
                        </span>
                    </div>

                    <hr>

                    <div class="mt-3">
                        {!! nl2br(e($kajian->keterangan)) !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('frontend.kajian') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Kajian
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection