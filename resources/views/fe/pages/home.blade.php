@extends('fe.layouts.app')

@section('title')
    Beranda
@endsection

@push('style')
<style>
    .kas-table {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .kas-table thead {
        background-color: #2B5C7F;
        color: white;
    }
    .kas-table th {
        padding: 15px;
        font-weight: 500;
    }
    .kas-table td {
        padding: 12px 15px;
    }
    .kas-table tbody tr:hover {
        background-color: #f5f9fc;
    }
    .kas-table .debit-cell {
        color: #28a745;
        font-weight: 500;
    }
    .kas-table .kredit-cell {
        color: #dc3545;
        font-weight: 500;
    }
    .kas-table .saldo-cell {
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h6 class="text-center">Halaman informasi dan website resmi dari</h6>
                <h1 class="text-white text-center">{{ $masjid->nama ?? 'E-Masjid' }}</h1>


                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">

                        </span>

                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Cari pengumuman atau kajian.." aria-label="Search">

                        <button type="submit" class="form-control">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    {{-- @php
                        dd($updatePengumuman);
                    @endphp --}}
                    <a href="topics-detail.html">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">{{ $updatePengumuman->judul }}</h5>

                                <p class="mb-0">{{ Str::limit($updatePengumuman->isi ?? '', 50) }}</p>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">lihat</span>
                        </div>

                        <img src="{{ asset('topik') }}/images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{ asset('topik') }}/images/pengajian.jpg" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">{{ $updateKajian->nama_kegiatan }}</h5>

                                <p class="text-white">{{ $updateKajian->keterangan }}</p>

                                <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Selengkapnya</a>
                            </div>

                        </div>

                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-pinterest"></a>
                                </li>
                            </ul>

                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-4">Update data Kas</h1>
            </div>

        </div>
    </div>

    {{-- <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Design</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">Marketing</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Finance</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane" type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Music</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Education</button>
                </li>
            </ul>
        </div>
    </div> --}}

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    
                    @if ($kas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover kas-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th class="text-end">Pemasukan</th>
                                    <th class="text-end">Pengeluaran</th>
                                    <th class="text-end">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kas as $item)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td class="text-end debit-cell">{{ $item->debit ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '-' }}</td>
                                    <td class="text-end kredit-cell">{{ $item->kredit ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '-' }}</td>
                                    <td class="text-end saldo-cell">Rp {{ number_format($item->saldo, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>Tidak ada data kas tersedia.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


<section class="timeline-section section-padding" id="section_3">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Jadwal Kajian Terbaru</h1>
            </div>

            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>

                        @foreach ($kajian as $item)
                        <li>
                            <h4 class="text-white mb-3">{{ $item->nama_kegiatan }}</h4>

                            <p class="text-white">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y H:i') }}</p>

                            <p class="text-white">{{ $item->keterangan }}</p>

                            <div class="icon-holder">
                              <i class="bi-bookmark"></i>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="faq-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Pengumuman Terbaru</h2>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-5 col-12">
                <img src="{{ asset('topik') }}/images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
            </div>

            <div class="col-lg-6 col-12 m-auto">
                <div class="accordion" id="accordionExample">

                    {{-- @php
                        dd($pengumuman);
                    @endphp --}}

                    @foreach ($pengumuman as $index => $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">

                                {{ $item->judul }}
                            </button>
                        </h2>

                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                {{ $item->isi }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>


<section class="contact-section section-padding section-bg" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5">Datangi Kami Di</h2>
            </div>

            <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                <iframe class="google-map" src="{{ $masjid->url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23349.00650995004!2d102.80039281965921!3d-2.168823270213839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2fcb3b216b8ae1%3A0x95709a1b6c162a15!2sMasjid%20Nurul%20Islam!5e0!3m2!1sen!2sid!4v1749002449001!5m2!1sen!2sid' }}" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                <h4 class="mb-3">Alamat</h4>

                <p>{{ $masjid->alamat ?? '-' }}</p>

                <hr>

                <p class="d-flex align-items-center mb-1">
                    <span class="me-2">Phone</span>

                    <a href="tel: 305-240-9671" class="site-footer-link">
                        {{ $masjid->kontak ?? '-' }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection