@extends('fe.layouts.app')

@section('title')
    Hasil Pencarian: {{ $keyword }}
@endsection

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Homepage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Pencarian</li>
                    </ol>
                </nav>
                <h2 class="text-white">Hasil Pencarian <br> "{{ $keyword }}"</h2>
            </div>

            <div class="col-lg-5 col-12">
                <div class="topics-detail-block bg-white shadow-lg">
                    <img src="{{ asset('topik') }}/images/pengajian.jpg" class="topics-detail-block-image img-fluid">
                </div>
            </div>

        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 col-12 mx-auto">
                <form method="get" action="{{ route('frontend.search') }}" role="search">
                    <div style="display: flex; align-items: center; background: #fff; border-radius: 100px; overflow: hidden; padding: 6px 6px 6px 16px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <i class="bi-search" style="color: #999; font-size: 18px; margin-right: 10px;"></i>
                        <input
                            name="keyword"
                            type="search"
                            value="{{ $keyword }}"
                            placeholder="Cari Berita Acara atau Agenda Kegiatan.."
                            style="flex: 1; border: none; outline: none; font-size: 16px; background: transparent; color: #333;"
                        >
                        <button
                            type="submit"
                            style="background: #7DCFBE; color: #fff; border: none; border-radius: 100px; padding: 10px 28px; font-size: 16px; font-weight: 600; cursor: pointer; white-space: nowrap;"
                        >
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-bold mb-3">Agenda Kegiatan <span class="text-muted fs-6">({{ $kajian->total() }} hasil)</span></h4>
            </div>

            @if($kajian->isEmpty())
                <div class="col-12">
                    <p class="text-muted">Tidak ada agenda kegiatan yang cocok.</p>
                </div>
            @else
                @foreach($kajian as $item)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $item->nama_kegiatan }}</h5>
                            <p class="text-muted small mb-1">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y, H:i') }} WIB
                            </p>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i>
                                {{ $item->tempat }}
                            </p>
                            <p class="card-text">{{ Str::limit($item->keterangan, 100) }}</p>
                            <a href="{{ route('frontend.kajian.detail', $item) }}" class="btn custom-btn btn-sm mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 d-flex justify-content-center mt-2">
                    {{ $kajian->appends(['keyword' => $keyword])->links() }}
                </div>
            @endif
        </div>

        <hr class="my-5">
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-bold mb-3">Berita Acara <span class="text-muted fs-6">({{ $pengumuman->total() }} hasil)</span></h4>
            </div>

            @if($pengumuman->isEmpty())
                <div class="col-12">
                    <p class="text-muted">Tidak ada berita acara yang cocok.</p>
                </div>
            @else
                @foreach($pengumuman as $item)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                            <a href="{{ route('frontend.pengumuman.detail', $item) }}" class="btn custom-btn btn-sm mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 d-flex justify-content-center mt-2">
                    {{ $pengumuman->appends(['keyword' => $keyword])->links() }}
                </div>
            @endif
        </div>

    </div>
</section>
@endsection