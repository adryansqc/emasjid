@extends('fe.layouts.app')

@section('title')
    Al-Quran Digital
@endsection

@push('style')
<style>
    .surat-card {
        border-radius: 14px;
        border: 1.5px solid #e0e0e0;
        transition: all 0.2s;
        cursor: pointer;
        text-decoration: none;
    }
    .surat-card:hover {
        border-color: #7DCFBE;
        box-shadow: 0 4px 16px rgba(125, 207, 190, 0.25);
        transform: translateY(-2px);
    }
    .surat-number {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: linear-gradient(135deg, #7DCFBE, #43a08a);
        color: white;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .surat-arabic {
        font-family: 'Traditional Arabic', serif;
        font-size: 20px;
        color: #43a08a;
    }
    .search-surat {
        border-radius: 50px;
        border: 1.5px solid #e0e0e0;
        padding: 12px 20px;
        font-size: 15px;
        width: 100%;
        outline: none;
        transition: border-color 0.2s;
    }
    .search-surat:focus {
        border-color: #7DCFBE;
        box-shadow: 0 0 0 3px rgba(125, 207, 190, 0.15);
    }
</style>
@endpush

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Homepage</a></li>
                        <li class="breadcrumb-item active">Al-Quran</li>
                    </ol>
                </nav>
                <h2 class="text-white">Al-Quran Digital <br> {{ $masjid->nama ?? 'E Masjid' }}</h2>
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

        {{-- Search --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-6 col-12">
                <div style="position: relative;">
                    <i class="bi-search" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #999;"></i>
                    <input type="text" id="searchSurat" class="search-surat" placeholder="Cari nama surat..." style="padding-left: 44px;">
                </div>
            </div>
        </div>

        {{-- Daftar Surat --}}
        <div class="row g-3" id="suratList">
            @foreach($surat as $item)
            <div class="col-lg-4 col-md-6 col-12 surat-item" data-nama="{{ strtolower($item['namaLatin']) }}">
                <a href="{{ route('frontend.alquran.detail', $item['nomor']) }}" class="surat-card d-flex align-items-center gap-3 p-3 bg-white d-block">
                    <div class="surat-number">{{ $item['nomor'] }}</div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-0">{{ $item['namaLatin'] }}</h6>
                        <small class="text-muted">{{ $item['arti'] }} &bull; {{ $item['jumlahAyat'] }} Ayat &bull; {{ ucfirst($item['tempatTurun']) }}</small>
                    </div>
                    <div class="surat-arabic">{{ $item['nama'] }}</div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection

@push('script')
<script>
    document.getElementById('searchSurat').addEventListener('input', function() {
        var keyword = this.value.toLowerCase();
        document.querySelectorAll('.surat-item').forEach(function(el) {
            var nama = el.getAttribute('data-nama');
            el.style.display = nama.includes(keyword) ? '' : 'none';
        });
    });
</script>
@endpush