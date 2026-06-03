@extends('fe.layouts.app')

@section('title')
    {{ $surat['namaLatin'] ?? 'Detail Surat' }}
@endsection

@push('style')
<style>
    .ayat-card {
        border-radius: 14px;
        border: 1.5px solid #e8e8e8;
        margin-bottom: 20px;
        overflow: hidden;
    }
    .ayat-header {
        background: linear-gradient(135deg, #1a1a4e, #2d2d7a);
        padding: 10px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .ayat-number {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        color: white;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ayat-arabic {
        font-family: 'Traditional Arabic', serif;
        font-size: 28px;
        line-height: 2;
        color: #1a1a4e;
        text-align: right;
        padding: 20px;
    }
    .ayat-latin {
        font-style: italic;
        color: #555;
        font-size: 14px;
        padding: 0 20px 10px;
    }
    .ayat-terjemahan {
        color: #333;
        font-size: 15px;
        padding: 0 20px 20px;
        border-top: 1px solid #f0f0f0;
        padding-top: 12px;
    }
    .btn-audio {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        color: white;
        border-radius: 20px;
        padding: 4px 14px;
        font-size: 13px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-audio:hover {
        background: rgba(255,255,255,0.3);
    }
    .btn-audio.playing {
        background: #7DCFBE;
        border-color: #7DCFBE;
    }
    .surat-info-badge {
        display: inline-block;
        background: linear-gradient(135deg, #7DCFBE, #43a08a);
        color: white;
        border-radius: 20px;
        padding: 4px 16px;
        font-size: 13px;
        font-weight: 600;
        margin: 4px;
    }
    .bismillah {
        font-family: 'Traditional Arabic', serif;
        font-size: 32px;
        color: #1a1a4e;
        text-align: center;
        padding: 20px;
        background: linear-gradient(135deg, #f0faf8, #e8f5f2);
        border-radius: 14px;
        margin-bottom: 24px;
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
                        <li class="breadcrumb-item"><a href="{{ route('frontend.alquran') }}">Al-Quran</a></li>
                        <li class="breadcrumb-item active">{{ $surat['namaLatin'] ?? '' }}</li>
                    </ol>
                </nav>
                <h2 class="text-white">{{ $surat['namaLatin'] ?? '' }} <br>
                    <span style="font-family: Traditional Arabic; font-size: 2rem;">{{ $surat['nama'] ?? '' }}</span>
                </h2>
            </div>
            <div class="col-lg-5 col-12">
                <div class="topics-detail-block bg-white shadow-lg p-4 text-center">
                    <div style="font-family: Traditional Arabic; font-size: 36px; color: #1a1a4e;">{{ $surat['nama'] ?? '' }}</div>
                    <div class="mt-2">
                        <span class="surat-info-badge">{{ $surat['arti'] ?? '' }}</span>
                        <span class="surat-info-badge">{{ $surat['jumlahAyat'] ?? '' }} Ayat</span>
                        <span class="surat-info-badge">{{ ucfirst($surat['tempatTurun'] ?? '') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">

        {{-- Navigasi Surat --}}
        <div class="d-flex justify-content-between mb-4">
            @if(isset($surat['suratSebelumnya']) && $surat['suratSebelumnya'])
            <a href="{{ route('frontend.alquran.detail', $surat['suratSebelumnya']['nomor']) }}" class="btn custom-btn btn-sm">
                <i class="bi-chevron-left me-1"></i> {{ $surat['suratSebelumnya']['namaLatin'] }}
            </a>
            @else
            <div></div>
            @endif

            <a href="{{ route('frontend.alquran') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi-grid me-1"></i> Daftar Surat
            </a>

            @if(isset($surat['suratSelanjutnya']) && $surat['suratSelanjutnya'])
            <a href="{{ route('frontend.alquran.detail', $surat['suratSelanjutnya']['nomor']) }}" class="btn custom-btn btn-sm">
                {{ $surat['suratSelanjutnya']['namaLatin'] }} <i class="bi-chevron-right ms-1"></i>
            </a>
            @else
            <div></div>
            @endif
        </div>

        {{-- Bismillah (kecuali At-Taubah nomor 9) --}}
        @if(($surat['nomor'] ?? 0) != 9)
        <div class="bismillah">
            بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
        </div>
        @endif

        {{-- Daftar Ayat --}}
        @foreach($ayat as $item)
        <div class="ayat-card">
            <div class="ayat-header">
                <div class="ayat-number">{{ $item['nomorAyat'] }}</div>
                <div class="d-flex gap-2">
                    <button class="btn-audio" onclick="playAudio('{{ $item['audio']['01'] ?? '' }}', this)">
                        <i class="bi-play-fill me-1"></i> Putar
                    </button>
                </div>
            </div>
            <div class="ayat-arabic">{{ $item['teksArab'] }}</div>
            <div class="ayat-latin">{{ $item['teksLatin'] }}</div>
            <div class="ayat-terjemahan">{{ $item['teksIndonesia'] }}</div>
        </div>
        @endforeach

        {{-- Navigasi Bawah --}}
        <div class="d-flex justify-content-between mt-4">
            @if(isset($surat['suratSebelumnya']) && $surat['suratSebelumnya'])
            <a href="{{ route('frontend.alquran.detail', $surat['suratSebelumnya']['nomor']) }}" class="btn custom-btn btn-sm">
                <i class="bi-chevron-left me-1"></i> {{ $surat['suratSebelumnya']['namaLatin'] }}
            </a>
            @else
            <div></div>
            @endif

            <a href="{{ route('frontend.alquran') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi-grid me-1"></i> Daftar Surat
            </a>

            @if(isset($surat['suratSelanjutnya']) && $surat['suratSelanjutnya'])
            <a href="{{ route('frontend.alquran.detail', $surat['suratSelanjutnya']['nomor']) }}" class="btn custom-btn btn-sm">
                {{ $surat['suratSelanjutnya']['namaLatin'] }} <i class="bi-chevron-right ms-1"></i>
            </a>
            @else
            <div></div>
            @endif
        </div>

    </div>
</section>
@endsection

@push('script')
<script>
    var currentAudio = null;
    var currentBtn = null;

    function playAudio(url, btn) {
        if (currentAudio && !currentAudio.paused) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
            if (currentBtn) {
                currentBtn.innerHTML = '<i class="bi-play-fill me-1"></i> Putar';
                currentBtn.classList.remove('playing');
            }
            if (currentBtn === btn) {
                currentAudio = null;
                currentBtn = null;
                return;
            }
        }

        currentAudio = new Audio(url);
        currentBtn = btn;
        btn.innerHTML = '<i class="bi-pause-fill me-1"></i> Pause';
        btn.classList.add('playing');

        currentAudio.play();
        currentAudio.onended = function() {
            btn.innerHTML = '<i class="bi-play-fill me-1"></i> Putar';
            btn.classList.remove('playing');
            currentAudio = null;
            currentBtn = null;
        };
    }
</script>
@endpush