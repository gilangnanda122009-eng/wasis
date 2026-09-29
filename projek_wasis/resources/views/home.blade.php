<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PT. Wahana Solusi Sistem Indonesia</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">

</head>


<body>


<header class="header">

    <div class="container nav-container">


        <a href="#top" class="logo">

            <img
                src="{{ asset('images/download.png') }}"
                alt="Wasis"
            >

        </a>


        <input
            type="checkbox"
            id="menu-toggle"
        >


        <label
            for="menu-toggle"
            class="menu-button"
        >

            <span></span>
            <span></span>
            <span></span>

        </label>


        <div class="header-search">

            <input
                type="text"
                id="searchInput"
                placeholder="Search..."
            >

            <button
                type="button"
                id="searchButton"
                aria-label="Cari"
            >

                <span class="search-icon"></span>

            </button>

        </div>


        <nav class="navbar">

            <a href="#top">
                Beranda
            </a>

            <a href="#tentang">
                Tentang
            </a>

            <a href="#layanan">
                Layanan
            </a>

            <a href="#pelanggan">
                Pelanggan
            </a>

            <a href="{{ url('/kontak') }}">
                Kontak
            </a>

        </nav>


    </div>

</header>


<main>


<!-- =========================================================
     HERO
========================================================= -->

<section
    class="hero"
    id="beranda"
>

    <div class="hero-slider">


        <div class="hero-slide active">

            <img
                src="{{ asset('images/10.png') }}"
                alt="Wasis"
            >

        </div>


        <div class="hero-slide">

            <img
                src="{{ asset('images/11.png') }}"
                alt="Wasis"
            >

        </div>


        <div class="hero-slide">

            <img
                src="{{ asset('images/12.png') }}"
                alt="Wasis"
            >

        </div>


    </div>


    <div class="hero-dots">

        <span class="hero-dot active"></span>

        <span class="hero-dot"></span>

        <span class="hero-dot"></span>

    </div>


</section>


<!-- =========================================================
     ABOUT
========================================================= -->

<section
    class="about section"
    id="tentang"
>

    <div
        class="container about-grid scroll-reveal"
    >


        <div class="about-image">

            <img
                src="{{ asset('images/meeting.webp') }}"
                alt="Wahana Solusi Sistem Indonesia"
            >


            <div class="experience-box">

                <strong>
                    WASIS
                </strong>

                <span>
                    Technology Work Partner
                </span>

            </div>


        </div>


        <div class="about-content">


            <span class="section-label">
                TENTANG KAMI
            </span>


            <h2>
                Membangun solusi teknologi yang memberikan dampak nyata
            </h2>


            <p>

                <b>PT. WASIS</b> merupakan perusahaan Pengembangan
                perangkat lunak yang berkomitmen menyediakan solusi inovatif dan
                memberikan kemudahan bagi seluruh user atau customer

            </p>


            <p>

                Kami berkomitmen memberikan solusi yang tepat guna melalui
                pemanfaatan teknologi untuk membantu kebutuhan bisnis,
                organisasi, maupun pelayanan masyarakat.

            </p>


            <a
                href="#nilai"
                class="text-link"
            >

                Nilai yang Kami Pegang

                <span>
                    →
                </span>

            </a>


        </div>


    </div>

</section>


<!-- =========================================================
     PROMOTIONS
========================================================= -->

<section
    class="promotions section"
    id="promosi"
>

    <div class="container">


        <div class="section-heading center">

            <h2>
                Informasi & Promosi
            </h2>

        </div>


        <div class="promotion-slider">


            <div class="promotion-track">


                @forelse ($promotions as $promotion)


                    @if ($promotion->link)


                        <a
                            href="{{ $promotion->link }}"
                            target="_blank"
                            rel="noopener"
                            class="promotion-card"
                        >

                            <img
                                src="{{ asset('storage/promotions/' . $promotion->poster) }}"
                                alt="Informasi dan Promosi Wasis"
                            >

                        </a>


                    @else


                        <div class="promotion-card">

                            <img
                                src="{{ asset('storage/promotions/' . $promotion->poster) }}"
                                alt="Informasi dan Promosi Wasis"
                            >

                        </div>


                    @endif


                @empty


                    <div class="empty-promotion">

                        Belum ada informasi dan promosi.

                    </div>


                @endforelse


            </div>


        </div>


        <div class="promotion-dots"></div>


    </div>

</section>


<!-- =========================================================
     STATS
========================================================= -->

<section class="stats">

    <div
        class="container stats-grid scroll-reveal"
    >


        <div class="stat-item">

            <strong>
                01
            </strong>

            <span>
                KEUNGGULAN
            </span>

            <p>
                Memberikan produk dan layanan perangkat lunak berkualitas terbaik.
            </p>

        </div>


        <div class="stat-item">

            <strong>
                02
            </strong>

            <span>
                TIM PROFESIONAL
            </span>

            <p>
                Didukung oleh tim profesional yang berbakat & kompeten.
            </p>

        </div>


        <div class="stat-item">

            <strong>
                03
            </strong>

            <span>
                PELANGGAN
            </span>

            <p>
                Mengutamakan kebutuhan dan kepuasan pelanggan.
            </p>

        </div>


        <div class="stat-item">

            <strong>
                04
            </strong>

            <span>
                INOVASI
            </span>

            <p>
                Meenghadirkan solusi inovatif yang sesuai dengan kebutuhan users.
            </p>

        </div>


    </div>

</section>


<!-- =========================================================
     HOLDING COMPANY
========================================================= -->

<section class="why section">

    <div class="container">


        <div class="section-heading center">


            <span class="section-label">
                KENAPA WASIS
            </span>


            <h2>
                HOLDING COMPANY
            </h2>


            <p>

                <b>PT. Wahana Solusi Sistem Indonesia</b> merupakan perusahaan di bawah
                <b>Holding Amazink People Group</b> yang beralamat di Kota Salatiga.

            </p>


        </div>


        <div class="why-grid scroll-reveal">


            <article class="why-card">

                <div class="card-number">
                    01
                </div>

                <h3>
                    PT. ASTON SISTEM INDONESIA
                </h3>

                <p>
                    Retail
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    02
                </div>

                <h3>
                    PT. ASTON PRINTER INDONESIA
                </h3>

                <p>
                    Penyedia E-Katalog
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    03
                </div>

                <h3>
                    PT. SOLUSI SISTEM INDONESIA
                </h3>

                <p>
                    Pengadaan
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    04
                </div>

                <h3>
                    PT. AMAZINK KARYA INDONESIA
                </h3>

                <p>
                    Distributor Tinta
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    05
                </div>

                <h3>
                    PT. PRINTEX SOLUSI CERDAS
                </h3>

                <p>
                    Textile
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    06
                </div>

                <h3>
                    PT. SOLUSI USAHA SEJAHTERA
                </h3>

                <p>
                    Textile
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    07
                </div>

                <h3>
                    PT. NUSANTARA REMPAH DUNIA
                </h3>

                <p>
                    FnB
                </p>

            </article>


            <article class="why-card">

                <div class="card-number">
                    08
                </div>

                <h3>
                    YAYASAN HATI BERIMAN
                </h3>

                <p>
                    Dakwah & Pendidikan
                </p>

            </article>


        </div>


    </div>

</section>


<!-- =========================================================
     OUR VALUE
========================================================= -->

<section
    class="our-value"
    id="nilai"
>

    <div class="container">


        <div class="value-hero scroll-reveal">


            <img
                src="{{ asset('images/01-kolaborasi.jpg') }}"
                alt="Kolaborasi teknologi"
            >


            <div class="value-hero-overlay">


                <span class="section-label">
                    OUR VALUE
                </span>


                <h2>

                    Nilai yang menjadi<br>
                    cara kami bekerja.

                </h2>


                <p>

                    Kami membangun hubungan, menghadirkan solusi,
                    dan terus berkembang bersama pelanggan.

                </p>


            </div>


        </div>


        <div class="value-list scroll-reveal">


            <div class="value-card value-main">


                <span class="value-number">
                    01
                </span>


                <div class="value-text">

                    <h3>
                        PELANGGAN ADALAH MITRA KAMI
                    </h3>

                    <p>
                        Kami percaya bahwa keberhasilan pelanggan adalah keberhasilan kami.
                    </p>

                </div>


                <span class="value-arrow">
                    ↗
                </span>


            </div>


            <div class="value-card">


                <span class="value-number">
                    02
                </span>


                <div class="value-text">

                    <h3>
                        SUPPORT & KOMITMEN
                    </h3>

                    <p>
                        Kami memberikan support dan komitmen untuk terus menjalin hubungan baik.
                    </p>

                </div>


                <span class="value-arrow">
                    ↗
                </span>


            </div>


            <div class="value-card">


                <span class="value-number">
                    03
                </span>


                <div class="value-text">

                    <h3>
                        INOVASI & KOMITMEN ADALAH BUDAYA
                    </h3>

                    <p>
                        Kami terus berinovasi dan berkreasi untuk menghadirkan solusi yang relevan.
                    </p>

                </div>


                <span class="value-arrow">
                    ↗
                </span>


            </div>


            <div class="value-card value-wide">


                <span class="value-number">
                    04
                </span>


                <div class="value-text">

                    <h3>
                        LAYANAN TERBAIK & TEKNOLOGI TEPAT
                    </h3>

                    <p>
                        Kami selalu memberikan layanan terbaik dan teknologi tepat bagi user.
                    </p>

                </div>


                <span class="value-arrow">
                    ↗
                </span>


            </div>


        </div>


    </div>

</section>


<!-- =========================================================
     OUR SERVICES
========================================================= -->

@include('layanan')


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">


    <div class="container footer-content">


        <!-- BRAND -->

        <div class="footer-brand">


            <a
                href="#beranda"
                class="footer-logo"
            >


                <img
                    src="{{ asset('images/footer.png') }}"
                    alt="Wasis"
                >


            </a>


            <p>
                Good Solution Technology Work Partner.
            </p>


        </div>


        <!-- PERUSAHAAN -->

        <div class="footer-column">


            <h3>
                Perusahaan
            </h3>


            <nav class="footer-nav">


                <a href="#tentang">

                    Tentang Kami

                </a>


                <a href="#layanan">

                    Layanan

                </a>


            </nav>


        </div>


        <!-- KONTAK -->

        <div class="footer-column">


            <h3>
                Kontak
            </h3>


            <div class="footer-contact">


                <a
                    href="https://wa.me/6285136436973"
                    target="_blank"
                    rel="noopener"
                >

                    +62 851-3643-6973

                </a>


            </div>


        </div>


        <!-- ALAMAT -->

        <div class="footer-column">


            <h3>
                Alamat
            </h3>


            <a
                href="https://maps.app.goo.gl/i7jdRXZ8rTwwXETq6"
                target="_blank"
                rel="noopener"
                class="footer-address"
            >

                Jl. Watubelang 1, Noborejo,
                Kec. Argomulyo, Kota Salatiga,
                Jawa Tengah

            </a>


        </div>


    </div>


    <div class="container copyright">


        <p>

            © {{ date('Y') }}
            PT. Wahana Solusi Sistem Indonesia.
            All Rights Reserved.

        </p>


    </div>


</footer>


<!-- =========================================================
     BACK TO TOP
========================================================= -->

<a
    href="#"
    class="back-to-top"
>
    ↑
</a>


<!-- =========================================================
     FLOATING SOCIAL
========================================================= -->

<div
    class="social-float"
    id="socialFloat"
>


    <div
        class="social-menu"
        id="socialMenu"
    >


        <a
            href="https://www.instagram.com/wahanasolusisistem/"
            target="_blank"
            class="social-item"
            aria-label="Instagram"
        >

            <img
                src="{{ asset('images/2.png') }}"
                alt="Instagram"
            >

        </a>


        <a
            href="https://www.facebook.com/profile.php?id=61564499862145"
            target="_blank"
            class="social-item"
            aria-label="Facebook"
        >

            <img
                src="{{ asset('images/4.png') }}"
                alt="Facebook"
            >

        </a>


        <a
            href="https://www.tiktok.com/@wahanasolusisistem"
            target="_blank"
            class="social-item"
            aria-label="TikTok"
        >

            <img
                src="{{ asset('images/3.png') }}"
                alt="TikTok"
            >

        </a>


        <a
            href="https://wa.me/6285136436973"
            target="_blank"
            class="social-item"
            aria-label="WhatsApp"
        >

            <img
                src="{{ asset('images/1.png') }}"
                alt="WhatsApp"
            >

        </a>


    </div>


    <div
        class="social-drag"
        id="socialDrag"
    >

        <span></span>
        <span></span>
        <span></span>

    </div>


    <button
        class="social-toggle"
        id="socialToggle"
        type="button"
        aria-label="Buka media sosial"
    >


        <img
            src="{{ asset('images/chip.png') }}"
            alt="chip"
        >


    </button>


</div>


<!-- =========================================================
     FLOATING SOCIAL JS
========================================================= -->

<script src="{{ asset('js/floating-social.js') }}"></script>




</body>
</html>