<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Wasis')
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/dashboard.css') }}"
    >

    @yield('css')
</head>

<body>

<div class="admin-layout">

    {{-- =========================================================
         SIDEBAR
    ========================================================== --}}
    <aside
        class="sidebar"
        id="sidebar"
    >

        {{-- LOGO --}}
        <div class="sidebar-logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Wasis"
            >

        </div>


        {{-- =====================================================
             MENU UTAMA
        ====================================================== --}}
        <nav class="sidebar-nav">

            {{-- DASHBOARD --}}
            <a
                href="{{ url('/dashboard') }}"
                class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ⌂
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- HERO SLIDER --}}
            <a
                href="{{ route('hero.index') }}"
                class="nav-item {{ request()->routeIs('hero.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ▣
                </span>

                <span>
                    Hero Slider
                </span>

            </a>


            {{-- =================================================
                 LAYANAN / OUR SERVICES
            ================================================== --}}
            <a
                href="{{ route('service.index') }}"
                class="nav-item {{ request()->routeIs('service.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ◈
                </span>

                <span>
                    Layanan
                </span>

            </a>


            {{-- =================================================
                 APLIKASI KAMI
                 Klik langsung masuk ke halaman pilihan:
                 Edit Aplikasi / Masukkan Aplikasi
            ================================================== --}}
            <a
                href="{{ route('produk.menu') }}"
                class="nav-item {{ request()->routeIs('produk.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ▣
                </span>

                <span>
                    Aplikasi Kami
                </span>

            </a>


            {{-- PELANGGAN --}}
            <a
                href="{{ route('pelanggan.index') }}"
                class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ◎
                </span>

                <span>
                    Pelanggan
                </span>

            </a>


            {{-- INFO & PROMOSI --}}
            <a
                href="{{ route('promosi.index') }}"
                class="nav-item {{ request()->routeIs('promosi.*') ? 'active' : '' }}"
            >

                <span class="nav-icon">
                    ▤
                </span>

                <span>
                    Info & Promosi
                </span>

            </a>

        </nav>


        {{-- =====================================================
             SIDEBAR BAGIAN BAWAH
        ====================================================== --}}
        <div class="sidebar-bottom">

            {{-- WEBSITE WASIS --}}
            <a
                href="http://192.168.100.139:8000"
                class="public-link"
            >

                <span>
                    ↗
                </span>

                <span>
                    Website Wasis
                </span>

            </a>


            {{-- LOGOUT --}}
            <form
                action="{{ url('/logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span>
                        ⇥
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <main class="dashboard-main">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <header class="dashboard-header">


            {{-- TOMBOL MENU MOBILE --}}
            <button
                type="button"
                class="menu-toggle"
                id="menuToggle"
            >

                <span></span>
                <span></span>
                <span></span>

            </button>


            {{-- JUDUL HALAMAN --}}
            <div class="header-title">

                <span>
                    WASIS ADMIN PORTAL
                </span>

                <h1>
                    @yield(
                        'page-title',
                        'Dashboard'
                    )
                </h1>

            </div>


            {{-- PROFIL ADMIN --}}
            <div class="admin-profile">

                <div class="profile-avatar">
                    A
                </div>

                <div class="profile-info">

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        Admin Wasis
                    </span>

                </div>

            </div>

        </header>


        {{-- =====================================================
             ISI HALAMAN
        ====================================================== --}}
        <section class="dashboard-content">

            @yield('content')

        </section>

    </main>

</div>


{{-- =========================================================
     JAVASCRIPT DASHBOARD
========================================================== --}}
<script src="{{ asset('js/dashboard.js') }}"></script>


@yield('js')

</body>

</html>