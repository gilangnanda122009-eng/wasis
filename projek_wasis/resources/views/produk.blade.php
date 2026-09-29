<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->nama }} | {{ $pageSetting?->judul ?? 'Aplikasi yang Kami Buat' }}</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">

    <style>
        /* =========================================================
           RICH TEXT
        ========================================================= */
        .produk-rich-text {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            overflow-wrap: anywhere;
            word-break: normal;
            line-height: 1.65;
        }

        .produk-rich-text p { margin: 0 0 .8em; }
        .produk-rich-text p:last-child { margin-bottom: 0; }
        .produk-rich-text ul,
        .produk-rich-text ol { margin: .5em 0 .8em; padding-left: 1.7em; }
        .produk-rich-text li { margin-bottom: .35em; }
        .produk-rich-text blockquote { margin: .8em 0; padding-left: 1em; }
        .produk-rich-text pre { max-width: 100%; overflow-x: auto; white-space: pre-wrap; overflow-wrap: anywhere; }
        .produk-rich-text img,
        .produk-rich-text video,
        .produk-rich-text iframe { max-width: 100%; height: auto; }
        .produk-rich-text table { width: 100%; max-width: 100%; border-collapse: collapse; display: block; overflow-x: auto; }
        .produk-rich-text a { overflow-wrap: anywhere; }

        /* =========================================================
           RAPATKAN JUDUL DAN KETERANGAN HERO
        ========================================================= */
        .produk-hero {
            padding-bottom: 12px !important;
        }

        .produk-hero h1 {
            margin-top: 0 !important;
            margin-bottom: 18px !important;
        }

        .produk-hero-description {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* =========================================================
           LAYOUT UTAMA DESKTOP
        ========================================================= */
        .produk-layout {
            display: grid !important;
            grid-template-columns: minmax(0, 1.18fr) minmax(0, 1fr) minmax(270px, .72fr) !important;
            gap: 46px !important;
            align-items: start !important;
        }

        .produk-layout > * { min-width: 0; }

        .produk-image-column,
        .produk-information,
        .produk-app-column { min-width: 0; }

        /* =========================================================
           CAROUSEL GAMBAR
           TOMBOL TIDAK MENIMPA GAMBAR
        ========================================================= */
        .produk-image-carousel {
            position: relative;
            width: 100%;
            min-width: 0;
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr) 48px;
            align-items: center;
            column-gap: 16px;
            overflow: visible;
        }

        .produk-image-stage {
            width: 100%;
            min-width: 0;
        }

        /* =========================================================
           FRAME 1080 x 800
           GAMBAR DIPERKECIL SESUAI FRAME, TIDAK DIPAKSA CROP
        ========================================================= */
        .produk-image-trigger {
            position: relative;
            width: 100%;
            aspect-ratio: 1080 / 800;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-sizing: border-box;
            background: #ffffff;
            border: 1px solid rgba(7,55,99,.15);
            border-radius: 0;
            cursor: zoom-in;
            box-shadow: 0 18px 45px rgba(7,55,99,.08);
        }

        .produk-image-error {
            visibility: hidden;
        }

        .produk-detail-image {
            display: block;
            width: 100% !important;
            height: 100% !important;
            max-width: none !important;
            max-height: none !important;
            object-fit: cover !important;
            object-position: center;
            flex: 0 0 auto;
            margin: 0;
            border: 0;
            border-radius: 0;
            transition: transform .25s ease;
        }

        /*
         * Gambar kecil / tepat 1080x800:
         * tetap natural dan diberi ruang kosong di dalam frame.
         */
        .produk-detail-image.is-natural {
            width: 100% !important;
            height: 100% !important;
            max-width: none !important;
            max-height: none !important;
            object-fit: contain !important;
            object-position: center;
            background: #ffffff;
        }

        /*
         * Gambar lebih besar dari frame:
         * memenuhi frame seperti cover sehingga tampak lebih besar/zoom.
         */
        .produk-detail-image.is-cover {
            width: 100% !important;
            height: 100% !important;
            max-width: none !important;
            max-height: none !important;
            object-fit: cover !important;
            object-position: center;
        }

        .produk-image-trigger:hover .produk-detail-image {
            transform: scale(1.01);
        }

        /* =========================================================
           TOMBOL SLIDER
           BIRU TUA + FEEDBACK ABU-ABU SAAT DITEKAN
        ========================================================= */
        .produk-carousel-button {
            position: relative;
            inset: auto;
            z-index: 20;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: #073763 !important;
            color: #ffffff !important;
            font-size: 34px;
            font-weight: 400;
            line-height: 1;
            cursor: pointer;
            transform: none;
            box-shadow: 0 10px 28px rgba(7,55,99,.24);
            transition: background .16s ease, transform .16s ease, box-shadow .16s ease;
        }

        .produk-carousel-button:hover {
            background: #0b4f8a !important;
            color: #ffffff !important;
            transform: scale(1.04);
            box-shadow: 0 12px 32px rgba(7,55,99,.25);
        }

        .produk-carousel-button:active,
        .produk-carousel-button.is-pressed {
            background: rgba(128,128,128,.58) !important;
            color: #ffffff !important;
            transform: scale(.94);
            box-shadow: 0 7px 18px rgba(7,55,99,.15);
        }

        .produk-carousel-button:focus-visible {
            outline: 3px solid rgba(22,131,255,.24);
            outline-offset: 3px;
        }

        /* =========================================================
           DOT CAROUSEL
        ========================================================= */
        .produk-carousel-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding-top: 15px;
            min-height: 16px;
        }

        .produk-carousel-dot {
            width: 9px;
            height: 9px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: width .2s ease, background .2s ease, transform .2s ease;
        }

        .produk-carousel-dot:hover { transform: scale(1.2); }

        .produk-carousel-dot.active {
            width: 25px;
            border-radius: 10px;
            background: #073763 !important;
        }

        /* =========================================================
           NOMOR DISIMPAN DI DATA, TIDAK DITAMPILKAN
        ========================================================= */
        .produk-number,
        .produk-info-number,
        .produk-app-number { display: none !important; }

        /* =========================================================
           INFO PRODUK
        ========================================================= */
        .produk-image-info {
            width: 100%;
            min-width: 0;
            padding-top: 24px;
        }

        .produk-image-info h2 {
            margin: 0 0 12px;
            color: #073763;
            font-size: clamp(34px, 3.4vw, 56px);
            line-height: 1.05;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .produk-image-info > .produk-rich-text,
        .produk-image-info > p {
            width: 100%;
            max-width: 100%;
            color: #5f7083;
        }

        /* =========================================================
           FUNGSI / MANFAAT / DAMPAK
        ========================================================= */
        .produk-information {
            min-width: 0;
            padding: 0 !important;
        }

        .produk-info-section {
            width: 100%;
            min-width: 0;
            display: grid;
            grid-template-columns: 1fr !important;
            row-gap: 8px;
            padding: 0 0 28px;
            margin: 0 0 28px;
            border-bottom: 1px solid rgba(7,55,99,.13);
        }

        .produk-info-section:last-child {
            margin-bottom: 0;
        }

        .produk-info-section h3 {
            margin: 0 0 12px;
            color: #073763;
            font-size: clamp(27px, 2vw, 36px);
            line-height: 1.15;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        /* =========================================================
           PILIH APLIKASI STICKY
        ========================================================= */
        .produk-app-column {
            position: sticky !important;
            top: 104px !important;
            align-self: start !important;
            height: fit-content;
            max-height: calc(100vh - 128px);
            padding: 0 !important;
            min-height: 0;
            z-index: 5;
        }

        .produk-app-header {
            margin-bottom: 24px;
        }

        .produk-app-header span {
            color: #1683ff;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 5px;
        }

        .produk-app-list {
            width: 100%;
            max-height: calc(100vh - 190px);
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 6px;
            scrollbar-width: thin;
            scrollbar-color: rgba(22,131,255,.45) transparent;
        }

        .produk-app-list::-webkit-scrollbar { width: 5px; }
        .produk-app-list::-webkit-scrollbar-thumb { background: rgba(22,131,255,.45); border-radius: 10px; }
        .produk-app-list::-webkit-scrollbar-track { background: transparent; }

        .produk-app-item {
            width: 100%;
            min-width: 0;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 26px;
            align-items: center;
            gap: 12px;
            min-height: 90px;
            padding: 20px 14px 20px 18px;
            border: 0;
            border-top: 1px solid rgba(7,55,99,.13);
            background: transparent;
            color: #073763;
            text-decoration: none;
            transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
        }

        .produk-app-item:last-child {
            border-bottom: 1px solid rgba(7,55,99,.13);
        }

        .produk-app-item:hover {
            background: rgba(22,131,255,.05);
            color: #073763;
        }

        .produk-app-item.active {
            background: rgba(22,131,255,.08);
            color: #073763;
            border-left: 4px solid #1683ff;
            padding-left: 14px;
        }

        .produk-app-name {
            min-width: 0;
            font-size: 16px;
            font-weight: 650;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .produk-app-arrow {
            font-size: 21px;
            color: #1683ff;
            text-align: right;
            line-height: 1;
            transition: transform .2s ease;
        }

        .produk-app-item:hover .produk-app-arrow,
        .produk-app-item.active .produk-app-arrow {
            transform: translateX(3px);
        }

        /* =========================================================
           LIGHTBOX
        ========================================================= */
        .produk-lightbox {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 26px;
            box-sizing: border-box;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .25s ease, visibility .25s ease;
        }

        .produk-lightbox-background {
            position: absolute;
            inset: 0;
            background: rgba(4,18,31,.90);
            cursor: zoom-out;
        }

        .produk-lightbox-content {
            position: relative;
            z-index: 2;
            max-width: 95vw;
            max-height: 94vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .produk-lightbox-content img {
            display: block;
            width: auto;
            height: auto;
            max-width: 94vw;
            max-height: 88vh;
            object-fit: contain;
            background: #ffffff;
            box-shadow: 0 30px 100px rgba(0,0,0,.35);
        }

        .produk-lightbox-close {
            position: absolute;
            top: -18px;
            right: -18px;
            z-index: 3;
            display: flex;
            width: 45px;
            height: 45px;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: #073763;
            border: 1px solid rgba(255,255,255,.18);
            font-size: 29px;
            line-height: 1;
            cursor: pointer;
            transition: background .2s ease, transform .2s ease;
        }

        .produk-lightbox-close:hover {
            background: #1683ff;
            transform: scale(1.05);
        }

        .produk-image-checkbox {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        .produk-image-checkbox:checked ~ .produk-lightbox {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        /* =========================================================
           BACK TO HOME
        ========================================================= */
        .produk-back-bottom-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 28px;
            color: #1683ff;
            text-decoration: none;
            font-weight: 700;
            transition: color .2s ease, transform .2s ease;
        }

        .produk-back-bottom-link:hover {
            color: #073763;
            transform: translateX(2px);
        }

        /* =========================================================
           RAPATKAN JARAK HERO KE BAGIAN PRODUK
           Tidak ada ruang kosong berlebih di bawah judul
           dan keterangan "Aplikasi yang Kami Buat".
        ========================================================= */
        .produk-hero {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .produk-hero .container {
            padding-bottom: 0 !important;
        }

        .produk-hero h1 {
            margin-bottom: 10px !important;
        }

        .produk-hero-description {
            margin-bottom: 0 !important;
        }

        .produk-content-section {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        /* =========================================================
           TABLET
        ========================================================= */
        @media (max-width: 1200px) {
            .produk-layout {
                grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr) !important;
                gap: 38px !important;
            }

            .produk-app-column {
                grid-column: 1 / -1;
                position: static !important;
                max-height: none;
            }

            .produk-app-list {
                max-height: 320px;
            }
        }

        /* =========================================================
           TABLET KECIL / MOBILE
        ========================================================= */
        @media (max-width: 800px) {
            .produk-hero .container,
            .produk-content-section .container {
                width: 100%;
                max-width: 100%;
                padding-left: 18px;
                padding-right: 18px;
                box-sizing: border-box;
            }

            .produk-hero h1 {
                font-size: clamp(34px, 8vw, 52px);
                line-height: 1.08;
                overflow-wrap: anywhere;
            }

            .produk-hero p,
            .produk-hero-description {
                font-size: 16px;
                line-height: 1.65;
            }

            .produk-layout {
                grid-template-columns: 1fr !important;
                gap: 32px !important;
            }

            .produk-image-column,
            .produk-information,
            .produk-app-column {
                width: 100%;
                min-width: 0;
                grid-column: auto;
            }

            .produk-image-carousel {
                grid-template-columns: 40px minmax(0, 1fr) 40px;
                column-gap: 9px;
            }

            .produk-carousel-button {
                width: 40px;
                height: 40px;
                font-size: 28px;
            }

            .produk-image-trigger {
                width: 100%;
                aspect-ratio: 1080 / 800;
            }

            .produk-detail-image {
                max-width: 100% !important;
                max-height: 100% !important;
            }

            .produk-image-info {
                padding-top: 20px;
            }

            .produk-image-info h2 {
                font-size: clamp(32px, 9vw, 48px);
                line-height: 1.08;
            }

            .produk-info-section h3 {
                font-size: clamp(26px, 7vw, 34px);
            }

            .produk-app-list {
                width: 100%;
                max-height: 360px;
            }
        }

        /* =========================================================
           HP
        ========================================================= */
        @media (max-width: 520px) {
            .produk-hero .container,
            .produk-content-section .container {
                padding-left: 14px;
                padding-right: 14px;
            }

            .produk-image-carousel {
                grid-template-columns: 36px minmax(0, 1fr) 36px;
                column-gap: 6px;
            }

            .produk-carousel-button {
                width: 36px;
                height: 36px;
                font-size: 25px;
            }

            .produk-carousel-dots {
                padding-top: 12px;
            }

            .produk-carousel-dot {
                width: 7px;
                height: 7px;
            }

            .produk-carousel-dot.active {
                width: 20px;
            }

            .produk-rich-text {
                font-size: 15px;
                line-height: 1.6;
            }

            .produk-info-section {
                padding-bottom: 22px;
                margin-bottom: 22px;
            }

            .produk-app-item {
                min-height: 78px;
                padding: 16px 12px 16px 14px;
            }

            .produk-app-item.active {
                padding-left: 10px;
            }
        }

        /* =========================================================
           HP SANGAT KECIL
        ========================================================= */
        @media (max-width: 360px) {
            .produk-image-carousel {
                grid-template-columns: 32px minmax(0, 1fr) 32px;
            }

            .produk-carousel-button {
                width: 32px;
                height: 32px;
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<header class="header">
    <div class="container nav-container">
        <a href="#top" class="logo">
            <img src="{{ asset('images/download.png') }}" alt="Wahana Sistem Indonesia">
        </a>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-button" aria-label="Buka menu">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="navbar">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('produk.show', $product->id) }}" class="active">Aplikasi Kami</a>
        </nav>
    </div>
</header>

<main class="produk-page" id="top">

    <section class="produk-hero">
        <div class="container">
            @if($pageSetting?->label_active ?? true)
                <div class="produk-hero-topline">
                    <span class="produk-label">
                        @if(!empty($pageSetting?->label_html))
                            {!! $pageSetting->label_html !!}
                        @elseif(!empty($pageSetting?->label))
                            {{ $pageSetting->label }}
                        @else
                            WASIS TECHNOLOGY
                        @endif
                    </span>
                </div>
            @endif

            @if($pageSetting?->judul_active ?? true)
                <h1>
                    @if(!empty($pageSetting?->judul_html))
                        {!! $pageSetting->judul_html !!}
                    @elseif(!empty($pageSetting?->judul))
                        {{ $pageSetting->judul }}
                    @else
                        Aplikasi yang Kami Buat
                    @endif
                </h1>
            @endif

        </div>
    </section>

    @php
        /*
         * GAMBAR PRODUK DIAMBIL LANGSUNG DARI PROJECT ADMIN.
         *
         * Admin:
         *   http://127.0.0.1:8001
         *
         * File gambar ProductController disimpan sebagai:
         *   uploads/products/nama-file.ext
         *
         * Jadi customer WAJIB memakai:
         *   http://127.0.0.1:8001/uploads/products/nama-file.ext
         *
         * Tidak ada fallback ke project customer dan tidak ada
         * pencarian gambar lain berdasarkan nama file.
         */
        $adminUrl = 'http://127.0.0.1:8001';

        $makeImageUrl = function ($gambar) use ($adminUrl) {
            $gambar = trim((string) $gambar);

            if ($gambar === '') {
                return '';
            }

            if (
                str_starts_with($gambar, 'http://') ||
                str_starts_with($gambar, 'https://')
            ) {
                return $gambar;
            }

            return $adminUrl . '/' . ltrim($gambar, '/');
        };

        $currentProductImageUrl = $makeImageUrl($product->gambar ?? '');

        $carouselProducts = $products->map(function ($item) use ($makeImageUrl) {
            $gambarUrl = $makeImageUrl($item->gambar);

            return [
                'id' => $item->id,
                'nomor' => $item->nomor,
                'nama' => $item->nama,
                'gambar' => $gambarUrl,
                'deskripsi_active' => (bool) $item->deskripsi_active,
                'deskripsi_judul' => $item->deskripsi_judul,
                'deskripsi' => $item->deskripsi,
                'fungsi_active' => (bool) $item->fungsi_active,
                'fungsi_judul' => $item->fungsi_judul,
                'fungsi' => $item->fungsi,
                'manfaat_active' => (bool) $item->manfaat_active,
                'manfaat_judul' => $item->manfaat_judul,
                'manfaat' => $item->manfaat,
                'dampak_active' => (bool) $item->dampak_active,
                'dampak_judul' => $item->dampak_judul,
                'dampak' => $item->dampak,
                'url' => route('produk.show', $item->id),
            ];
        })->values();
    @endphp

    <section class="produk-content-section">
        <div class="container">
            <div class="produk-layout">

                {{-- GAMBAR PRODUK --}}
                <article class="produk-image-column">
                    <div class="produk-image-wrapper">
                        <input type="checkbox" id="produk-image-preview" class="produk-image-checkbox">

                        <div class="produk-image-carousel">
                            <button
                                type="button"
                                class="produk-carousel-button produk-carousel-prev"
                                id="produkCarouselPrev"
                                aria-label="Aplikasi sebelumnya"
                            >‹</button>

                            <div class="produk-image-stage">
                                <div class="produk-image-trigger" id="produkImageTrigger" aria-label="Gambar aplikasi">
                                    <img id="produkCarouselImage" src="{{ $currentProductImageUrl }}" alt="{{ $product->nama }}" class="produk-detail-image">
                                </div>

                                <div class="produk-carousel-dots" id="produkCarouselDots" aria-label="Pilihan aplikasi"></div>
                            </div>

                            <button
                                type="button"
                                class="produk-carousel-button produk-carousel-next"
                                id="produkCarouselNext"
                                aria-label="Aplikasi berikutnya"
                            >›</button>
                        </div>

                        <div class="produk-lightbox">
                            <label for="produk-image-preview" class="produk-lightbox-background"></label>
                            <div class="produk-lightbox-content">
                                <label for="produk-image-preview" class="produk-lightbox-close" aria-label="Tutup gambar">×</label>
                                <img id="produkLightboxImage" src="{{ $currentProductImageUrl }}" alt="{{ $product->nama }}">
                            </div>
                        </div>
                    </div>

                    {{-- NAMA + DESKRIPSI PRODUK --}}
                    <div class="produk-image-info">
                        <h2 id="produkNama">{{ $product->nama }}</h2>
                        <div id="produkDeskripsi" class="produk-rich-text"></div>

                        <a href="{{ url('/') }}" class="produk-back-bottom-link">
                            <span>←</span>
                            <span>Kembali ke Beranda</span>
                        </a>
                    </div>
                </article>

                {{-- FUNGSI / MANFAAT / DAMPAK --}}
                <article class="produk-information">
                    <div class="produk-info-section" id="produkFungsiSection">
                        <div>
                            <h3 id="produkFungsiJudul"></h3>
                            <div class="produk-rich-text" id="produkFungsi"></div>
                        </div>
                    </div>

                    <div class="produk-info-section" id="produkManfaatSection">
                        <div>
                            <h3 id="produkManfaatJudul"></h3>
                            <div class="produk-rich-text" id="produkManfaat"></div>
                        </div>
                    </div>

                    <div class="produk-info-section" id="produkDampakSection">
                        <div>
                            <h3 id="produkDampakJudul"></h3>
                            <div class="produk-rich-text" id="produkDampak"></div>
                        </div>
                    </div>
                </article>

                {{-- PILIH APLIKASI --}}
                <aside class="produk-app-column">
                    <div class="produk-app-header">
                        <span>PILIH APLIKASI</span>
                    </div>

                    <div class="produk-app-list" id="produkAppList">
                        @foreach ($products as $item)
                            <a
                                href="{{ route('produk.show', $item->id) }}"
                                class="produk-app-item {{ $item->id == $product->id ? 'active' : '' }}"
                                data-product-id="{{ $item->id }}"
                            >
                                <span class="produk-app-name">{{ $item->nama }}</span>
                                <span class="produk-app-arrow">↗</span>
                            </a>
                        @endforeach
                    </div>
                </aside>

            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <img src="{{ asset('images/footer.png') }}" alt="WASIS Technology" class="footer-brand-logo">
            <p>Good Solution Technology Work Partner.</p>
        </div>

        <div class="footer-column">
            <h3>Perusahaan</h3>
            <nav class="footer-nav">
                <a href="{{ url('/#tentang') }}">Tentang Kami</a>
                <a href="#top">Aplikasi Kami</a>
            </nav>
        </div>

        <div class="footer-column">
            <h3>Kontak</h3>
            <div class="footer-contact">
                <a href="https://wa.me/6285136436973" target="_blank" rel="noopener">+62 851-3643-6973</a>
            </div>
        </div>

        <div class="footer-column">
            <h3>Alamat</h3>
            <a href="https://maps.app.goo.gl/i7jdRXZ8rTwwXETq6" target="_blank" rel="noopener" class="footer-address">
                Jl. Watubelang 1, Noborejo, Kec. Argomulyo, Kota Salatiga, Jawa Tengah
            </a>
        </div>
    </div>

    <div class="container copyright">
        <p>© {{ date('Y') }} PT. Wahana Solusi Sistem Indonesia. All Rights Reserved.</p>
    </div>
</footer>

<div class="social-float" id="socialFloat">
    <div class="social-menu" id="socialMenu">
        <a href="https://www.instagram.com/wahanasolusisistem/" target="_blank" rel="noopener" class="social-item" aria-label="Instagram">
            <img src="{{ asset('images/2.png') }}" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/profile.php?id=61564499862145" target="_blank" rel="noopener" class="social-item" aria-label="Facebook">
            <img src="{{ asset('images/4.png') }}" alt="Facebook">
        </a>
        <a href="https://www.tiktok.com/@wahanasolusisistem" target="_blank" rel="noopener" class="social-item" aria-label="TikTok">
            <img src="{{ asset('images/3.png') }}" alt="TikTok">
        </a>
        <a href="https://wa.me/6285136436973" target="_blank" rel="noopener" class="social-item" aria-label="WhatsApp">
            <img src="{{ asset('images/1.png') }}" alt="WhatsApp">
        </a>
    </div>

    <div class="social-drag" id="socialDrag">
        <span></span><span></span><span></span>
    </div>

    <button class="social-toggle" id="socialToggle" type="button" aria-label="Buka media sosial">
        <img src="{{ asset('images/chip.png') }}" alt="Social">
    </button>
</div>

<script src="{{ asset('js/floating-social.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const produkCarouselData = @json($carouselProducts);

    let produkCurrentIndex = produkCarouselData.findIndex(function (product) {
        return String(product.id) === String({{ $product->id }});
    });

    if (produkCurrentIndex < 0) {
        produkCurrentIndex = 0;
    }

    const image = document.getElementById('produkCarouselImage');
    const imageTrigger = document.getElementById('produkImageTrigger');
    const lightboxImage = document.getElementById('produkLightboxImage');
    const nama = document.getElementById('produkNama');
    const deskripsi = document.getElementById('produkDeskripsi');
    const fungsiSection = document.getElementById('produkFungsiSection');
    const fungsiJudul = document.getElementById('produkFungsiJudul');
    const fungsi = document.getElementById('produkFungsi');
    const manfaatSection = document.getElementById('produkManfaatSection');
    const manfaatJudul = document.getElementById('produkManfaatJudul');
    const manfaat = document.getElementById('produkManfaat');
    const dampakSection = document.getElementById('produkDampakSection');
    const dampakJudul = document.getElementById('produkDampakJudul');
    const dampak = document.getElementById('produkDampak');
    const previousButton = document.getElementById('produkCarouselPrev');
    const nextButton = document.getElementById('produkCarouselNext');
    const dotsContainer = document.getElementById('produkCarouselDots');
    const appItems = document.querySelectorAll('.produk-app-item');
    const imagePreview = document.getElementById('produk-image-preview');

    if (
        !image || !imageTrigger || !nama || !deskripsi ||
        !fungsiSection || !fungsiJudul || !fungsi ||
        !manfaatSection || !manfaatJudul || !manfaat ||
        !dampakSection || !dampakJudul || !dampak ||
        !previousButton || !nextButton
    ) {
        return;
    }

    /* =====================================================
       GAMBAR DARI ADMIN — SATU URL SAJA
       Tidak boleh pindah ke gambar lain.
    ===================================================== */
    function setImageSource(product) {
        const source = product.gambar || '';

        image.onerror = function () {
            image.onerror = null;
            image.removeAttribute('src');
            image.classList.add('produk-image-error');
        };

        image.classList.remove('produk-image-error');
        image.src = source;
    }

    function preloadLightboxImage(product) {
        if (!lightboxImage) {
            return;
        }

        const source = product.gambar || '';

        lightboxImage.onerror = function () {
            lightboxImage.onerror = null;
            lightboxImage.removeAttribute('src');
        };

        lightboxImage.src = source;
    }

    /* =====================================================
       MODE UKURAN GAMBAR
    ===================================================== */
    function updateImageDisplayMode(img) {
        if (!img) return;

        img.classList.remove('is-natural', 'is-cover');

        const naturalWidth = Number(img.naturalWidth || 0);
        const naturalHeight = Number(img.naturalHeight || 0);

        if (!naturalWidth || !naturalHeight) {
            return;
        }

        /*
         * <= 1080x800 = jangan dibesarkan.
         * > salah satu batas = isi frame dengan cover/zoom.
         */
        // Semua gambar dibuat memenuhi frame 1080x800.
        // object-fit: cover menjaga kotak tetap penuh tanpa menyisakan
        // ruang putih di dalam frame.
        if (naturalWidth <= 1080 && naturalHeight <= 800) {
            img.classList.add('is-natural');
        } else {
            img.classList.add('is-cover');
        }
    }

    image.addEventListener('load', function () {
        updateImageDisplayMode(image);
    });

    /* =====================================================
       DOTS
    ===================================================== */
    function createDots() {
        if (!dotsContainer) return;

        dotsContainer.innerHTML = '';

        if (produkCarouselData.length <= 1) {
            dotsContainer.style.display = 'none';
            return;
        }

        dotsContainer.style.display = 'flex';

        produkCarouselData.forEach(function (product, index) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'produk-carousel-dot';
            dot.setAttribute('aria-label', 'Buka ' + product.nama);

            dot.addEventListener('click', function (event) {
                event.preventDefault();
                buttonFeedback(dot);
                showProduct(index);
            });

            dotsContainer.appendChild(dot);
        });
    }

    function updateDots(index) {
        if (!dotsContainer) return;

        dotsContainer.querySelectorAll('.produk-carousel-dot').forEach(function (dot, dotIndex) {
            dot.classList.toggle('active', dotIndex === index);
        });
    }

    /* =====================================================
       URL
    ===================================================== */
    function updateBrowserUrl(product) {
        if (!product.url) return;

        window.history.pushState(
            { productId: product.id },
            '',
            product.url
        );
    }

    /* =====================================================
       ACTIVE APPLICATION
    ===================================================== */
    function updateActiveApplication(productId) {
        appItems.forEach(function (item) {
            const itemId = item.getAttribute('data-product-id');
            item.classList.toggle('active', String(itemId) === String(productId));
        });
    }

    /* =====================================================
       DESKRIPSI
    ===================================================== */
    function updateDescription(product) {
        if (!product.deskripsi_active) {
            deskripsi.innerHTML = '';
            return;
        }

        deskripsi.innerHTML = product.deskripsi ?? '';
    }

    /* =====================================================
       SECTION
    ===================================================== */
    function updateSection(section, titleElement, contentElement, active, title, content) {
        if (!active) {
            section.style.display = 'none';
            titleElement.innerHTML = '';
            contentElement.innerHTML = '';
            return;
        }

        section.style.display = '';
        titleElement.innerHTML = title ?? '';
        contentElement.innerHTML = content ?? '';
    }

    /* =====================================================
       SCROLL ACTIVE APPLICATION
    ===================================================== */
    function scrollActiveApplication() {
        const activeItem = document.querySelector('.produk-app-item.active');
        const list = document.getElementById('produkAppList');

        if (!activeItem || !list) return;

        const itemTop = activeItem.offsetTop;
        const itemBottom = itemTop + activeItem.offsetHeight;
        const listTop = list.scrollTop;
        const listBottom = listTop + list.clientHeight;

        if (itemTop < listTop) {
            list.scrollTo({ top: itemTop, behavior: 'smooth' });
        } else if (itemBottom > listBottom) {
            list.scrollTo({
                top: itemBottom - list.clientHeight,
                behavior: 'smooth'
            });
        }
    }

    /* =====================================================
       FEEDBACK BUTTON
    ===================================================== */
    function buttonFeedback(button) {
        if (!button) return;

        button.classList.add('is-pressed');

        window.setTimeout(function () {
            button.classList.remove('is-pressed');
        }, 180);
    }

    /* =====================================================
       TAMPILKAN PRODUK
    ===================================================== */
    function showProduct(index, changeUrl = true) {
        if (!produkCarouselData.length) return;

        const total = produkCarouselData.length;

        if (index < 0) index = total - 1;
        if (index >= total) index = 0;

        produkCurrentIndex = index;
        const product = produkCarouselData[produkCurrentIndex];

        setImageSource(product);

        image.alt = product.nama;

        preloadLightboxImage(product);

        nama.textContent = product.nama;

        updateDescription(product);

        updateSection(
            fungsiSection,
            fungsiJudul,
            fungsi,
            product.fungsi_active,
            product.fungsi_judul,
            product.fungsi
        );

        updateSection(
            manfaatSection,
            manfaatJudul,
            manfaat,
            product.manfaat_active,
            product.manfaat_judul,
            product.manfaat
        );

        updateSection(
            dampakSection,
            dampakJudul,
            dampak,
            product.dampak_active,
            product.dampak_judul,
            product.dampak
        );

        updateActiveApplication(product.id);
        scrollActiveApplication();
        updateDots(produkCurrentIndex);

        if (imagePreview) {
            imagePreview.checked = false;
        }

        if (changeUrl) {
            updateBrowserUrl(product);
        }

        document.title = product.nama + ' | ' + @json($pageSetting?->judul ?? 'Aplikasi yang Kami Buat');
    }

    /* =====================================================
       PREVIOUS / NEXT
    ===================================================== */
    previousButton.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        buttonFeedback(previousButton);
        showProduct(produkCurrentIndex - 1);
    });

    nextButton.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        buttonFeedback(nextButton);
        showProduct(produkCurrentIndex + 1);
    });

    /* =====================================================
       PILIH APLIKASI
    ===================================================== */
    appItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault();

            const productId = item.getAttribute('data-product-id');
            const index = produkCarouselData.findIndex(function (product) {
                return String(product.id) === String(productId);
            });

            if (index === -1) return;

            showProduct(index);
        });
    });

    /* =====================================================
       BROWSER BACK / FORWARD
    ===================================================== */
    window.addEventListener('popstate', function () {
        const currentPath = window.location.pathname;

        const index = produkCarouselData.findIndex(function (product) {
            return new URL(
                product.url,
                window.location.origin
            ).pathname === currentPath;
        });

        if (index !== -1) {
            showProduct(index, false);
        }
    });

    /* =====================================================
       SWIPE MOBILE
    ===================================================== */
    let touchStartX = 0;
    let touchStartY = 0;

    imageTrigger.addEventListener('touchstart', function (event) {
        if (!event.changedTouches.length) return;

        touchStartX = event.changedTouches[0].screenX;
        touchStartY = event.changedTouches[0].screenY;
    }, { passive: true });

    imageTrigger.addEventListener('touchend', function (event) {
        if (!event.changedTouches.length) return;

        const touchEndX = event.changedTouches[0].screenX;
        const touchEndY = event.changedTouches[0].screenY;

        const differenceX = touchStartX - touchEndX;
        const differenceY = touchStartY - touchEndY;

        if (Math.abs(differenceX) < 50) return;
        if (Math.abs(differenceX) < Math.abs(differenceY)) return;

        if (differenceX > 0) {
            showProduct(produkCurrentIndex + 1);
        } else {
            showProduct(produkCurrentIndex - 1);
        }
    }, { passive: true });

    /* =====================================================
       KLIK GAMBAR -> LIGHTBOX
    ===================================================== */
    imageTrigger.addEventListener('click', function () {
        if (!imagePreview) return;
        imagePreview.checked = true;
    });

    /* =====================================================
       KEYBOARD
    ===================================================== */
    document.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowLeft') {
            showProduct(produkCurrentIndex - 1);
        } else if (event.key === 'ArrowRight') {
            showProduct(produkCurrentIndex + 1);
        } else if (event.key === 'Escape' && imagePreview) {
            imagePreview.checked = false;
        }
    });

    /* =====================================================
       INIT
    ===================================================== */
    createDots();
    showProduct(produkCurrentIndex, false);
});
</script>

</body>
</html>
