<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | Wasis</title>
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
</head>
<body>

<header class="contact-header">
    <div class="contact-nav">
        <a href="{{ url('/') }}" class="contact-logo">
            <img src="{{ asset('images/download.png') }}" alt="Wasis">
        </a>

        <a href="{{ url('/') }}" class="back-home">
            <span>←</span>
            Kembali ke Beranda
        </a>
    </div>
</header>

<main class="contact-page">

    <div class="contact-glow glow-one"></div>
    <div class="contact-glow glow-two"></div>

    <section class="contact-hero">

        <div class="contact-label">
            <span></span>
            HUBUNGI KAMI
        </div>

        <h1>
            Mari Terhubung<br>
            <strong>dengan Wasis.</strong>
        </h1>

        <p>
            Punya pertanyaan, kebutuhan sistem, atau ingin berdiskusi
            mengenai solusi teknologi? Kami siap membantu.
        </p>

        <div class="contact-card">

          <div class="contact-icon">
    <img src="{{ asset('images/1.png') }}" alt="WhatsApp">
</div>

            <div class="contact-info">
                <span>WHATSAPP</span>
                <h2>+62 851-3643-6973</h2>
                <p>Hubungi kami melalui WhatsApp</p>
            </div>

            <a href="https://wa.me/6285136436973" target="_blank" rel="noopener" class="contact-button">
                Chat Sekarang
                <span>↗</span>
            </a>

        </div>

        <div class="contact-bottom">
            <div></div>
            <span>Good Solution Technology Work Partner</span>
            <div></div>
        </div>

    </section>

</main>

<footer class="contact-footer">
    <p>© {{ date('Y') }} PT. Wahana Solusi Sistem Indonesia.</p>
</footer>

</body>
</html>