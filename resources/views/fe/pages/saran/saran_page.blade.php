@extends('fe.layouts.app')

@section('title')
    Saran & Masukan
@endsection

@push('style')
<style>
    .saran-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 12px;
    }
    .saran-form .form-control,
    .saran-form .form-select {
        border: 1.5px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 15px;
        transition: border-color 0.2s;
    }
    .saran-form .form-control:focus,
    .saran-form .form-select:focus {
        border-color: #7DCFBE;
        box-shadow: 0 0 0 3px rgba(125, 207, 190, 0.15);
    }
    .saran-form label {
        font-size: 14px;
        margin-bottom: 6px;
    }
    .btn-kirim {
        background: linear-gradient(135deg, #7DCFBE, #43a08a);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 14px;
        font-size: 16px;
        font-weight: 600;
        transition: opacity 0.2s;
    }
    .btn-kirim:hover {
        opacity: 0.9;
        color: white;
    }
    .info-card {
        border-radius: 16px;
        padding: 24px;
        height: 100%;
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
                        <li class="breadcrumb-item active" aria-current="page">Saran & Masukan</li>
                    </ol>
                </nav>
                <h2 class="text-white">Saran & Masukan <br> {{ $masjid->nama ?? 'E Masjid' }}</h2>
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

        @if(session('success'))
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10 col-12">
                <div class="alert border-0 shadow-sm d-flex align-items-center gap-3" style="background: #e8f8f5; border-radius: 12px;" role="alert">
                    <i class="bi-check-circle-fill fs-4" style="color: #43a08a;"></i>
                    <div>
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>
        @endif

        <div class="row justify-content-center g-4">
            <div class="col-lg-3 col-12">
                <div class="d-flex flex-column gap-3">

                    <div class="info-card shadow-sm border-0" style="background: linear-gradient(135deg, #1a1a4e, #2d2d7a);">
                        <div class="saran-icon-box" style="background: rgba(255,255,255,0.15);">
                            <i class="bi-chat-dots text-white"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-1">Saran</h6>
                        <p class="text-white mb-0" style="font-size: 13px; opacity: 0.8;">Berikan ide atau usulan untuk kemajuan masjid.</p>
                    </div>

                    <div class="info-card shadow-sm border-0" style="background: linear-gradient(135deg, #43a047, #1b5e20);">
                        <div class="saran-icon-box" style="background: rgba(255,255,255,0.15);">
                            <i class="bi-lightbulb text-white"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-1">Masukan</h6>
                        <p class="text-white mb-0" style="font-size: 13px; opacity: 0.8;">Sampaikan masukan untuk perbaikan layanan masjid.</p>
                    </div>

                    <div class="info-card shadow-sm border-0" style="background: linear-gradient(135deg, #e53935, #b71c1c);">
                        <div class="saran-icon-box" style="background: rgba(255,255,255,0.15);">
                            <i class="bi-exclamation-triangle text-white"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-1">Kritik</h6>
                        <p class="text-white mb-0" style="font-size: 13px; opacity: 0.8;">Sampaikan kritik yang membangun dengan bijak.</p>
                    </div>

                    <div class="info-card shadow-sm border-0" style="background: linear-gradient(135deg, #f7c948, #f9a825);">
                        <div class="saran-icon-box" style="background: rgba(255,255,255,0.15);">
                            <i class="bi-question-circle text-white"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-1">Pertanyaan</h6>
                        <p class="text-white mb-0" style="font-size: 13px; opacity: 0.8;">Ajukan pertanyaan seputar kegiatan masjid.</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 col-12">
                <div class="card border-0 shadow-sm p-4 p-lg-5" style="border-radius: 16px;">
                    <div class="mb-4">
                        <h4 class="fw-bold mb-1">Kirim Saran & Masukan</h4>
                        <p class="text-muted mb-0">Kami sangat menghargai setiap masukan dari jamaah untuk kemajuan {{ $masjid->nama ?? 'masjid' }}.</p>
                    </div>

                    <form action="{{ route('frontend.saran.store') }}" method="POST" class="saran-form">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label class="form-label fw-semibold">Email <span class="text-muted" style="font-size:12px;">(opsional)</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="contoh@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label class="form-label fw-semibold">No. HP <span class="text-muted" style="font-size:12px;">(opsional)</span></label>
                                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="saran"      {{ old('kategori') === 'saran'      ? 'selected' : '' }}>Saran</option>
                                    <option value="masukan"    {{ old('kategori') === 'masukan'    ? 'selected' : '' }}>Masukan</option>
                                    <option value="kritik"     {{ old('kategori') === 'kritik'     ? 'selected' : '' }}>Kritik</option>
                                    <option value="pertanyaan" {{ old('kategori') === 'pertanyaan' ? 'selected' : '' }}>Pertanyaan</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Pesan <span class="text-danger">*</span></label>
                                <textarea name="pesan" rows="6" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tuliskan saran, masukan, atau pertanyaan Anda di sini...">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-kirim w-100">
                                    <i class="bi-send me-2"></i> Kirim Sekarang
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection