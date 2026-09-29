<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Wasis</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="login">

    <main class="login-page">

    <a href="http://192.168.100.139:8000" class="back-to-public">
    ← Website Wasis
</a>

        <div class="login-overlay"></div>

        <div class="login-glow login-glow-one"></div>
        <div class="login-glow login-glow-two"></div>

        <section class="login-card">

            <div class="login-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Wasis">
            </div>

            <div class="login-heading">
                <span>WASIS ADMIN PORTAL</span>
                <h1>Selamat Datang</h1>
                <p>Masuk untuk mengelola website Wasis.</p>
            </div>

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    <span>Login</span>
                    <span class="login-arrow">→</span>
                </button>

            </form>

        </section>

    </main>

</body>
</html>