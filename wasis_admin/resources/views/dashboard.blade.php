@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<style>
    .dashboard-welcome {
        margin-bottom: 30px;
    }

    .dashboard-welcome h2 {
        margin: 0 0 8px;
        font-size: 28px;
        color: #1f2937;
    }

    .dashboard-welcome p {
        margin: 0;
        color: #6b7280;
        font-size: 15px;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .dashboard-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        border: 1px solid #eeeeee;
    }

    .dashboard-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef4ff;
        color: #2563eb;
        font-size: 22px;
        margin-bottom: 16px;
    }

    .dashboard-card h3 {
        margin: 0 0 6px;
        font-size: 16px;
        color: #374151;
    }

    .dashboard-card p {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    .dashboard-menu {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .dashboard-menu-item {
        display: flex;
        align-items: center;
        gap: 18px;
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 16px;
        padding: 22px;
        text-decoration: none;
        color: inherit;
        transition: 0.2s;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    }

    .dashboard-menu-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .dashboard-menu-icon {
        width: 52px;
        height: 52px;
        flex-shrink: 0;
        border-radius: 14px;
        background: #f3f6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
    }

    .dashboard-menu-text h3 {
        margin: 0 0 5px;
        font-size: 17px;
        color: #1f2937;
    }

    .dashboard-menu-text p {
        margin: 0;
        color: #6b7280;
        font-size: 13px;
    }

    .dashboard-arrow {
        margin-left: auto;
        font-size: 20px;
        color: #9ca3af;
    }

    @media (max-width: 900px) {
        .dashboard-cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-menu {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .dashboard-cards {
            grid-template-columns: 1fr;
        }

        .dashboard-card {
            padding: 20px;
        }

        .dashboard-menu-item {
            padding: 18px;
        }
    }
</style>

<div class="dashboard-welcome">

    <h2>Selamat Datang di Admin Wasis</h2>

    <p>
        Kelola konten dan informasi website Wasis melalui halaman admin.
    </p>

</div>


{{-- STATISTIK --}}
<div class="dashboard-cards">

    {{-- APLIKASI --}}
    <div class="dashboard-card">

        <div class="dashboard-card-icon">
            ▣
        </div>

        <h3>Aplikasi Kami</h3>

        <p>
            {{ \App\Models\Product::count() }}
        </p>

    </div>


    {{-- PELANGGAN --}}
    <div class="dashboard-card">

        <div class="dashboard-card-icon">
            ◎
        </div>

        <h3>Pelanggan</h3>

        <p>
            {{ \App\Models\Customer::count() }}
        </p>

    </div>


    {{-- PROMOSI --}}
    <div class="dashboard-card">

        <div class="dashboard-card-icon">
            ▤
        </div>

        <h3>Info & Promosi</h3>

        <p>
            {{ \App\Models\Promotion::count() }}
        </p>

    </div>

</div>


{{-- MENU CEPAT --}}
<div class="dashboard-menu">

    {{-- APLIKASI KAMI --}}
    <a href="{{ route('produk.index') }}"
       class="dashboard-menu-item">

        <div class="dashboard-menu-icon">
            ▣
        </div>

        <div class="dashboard-menu-text">

            <h3>Aplikasi Kami</h3>

            <p>
                Tambah, edit, dan hapus aplikasi website.
            </p>

        </div>

        <div class="dashboard-arrow">
            →
        </div>

    </a>


    {{-- HERO --}}
    <a href="{{ route('hero.index') }}"
       class="dashboard-menu-item">

        <div class="dashboard-menu-icon">
            ▣
        </div>

        <div class="dashboard-menu-text">

            <h3>Hero Slider</h3>

            <p>
                Kelola gambar dan konten hero slider.
            </p>

        </div>

        <div class="dashboard-arrow">
            →
        </div>

    </a>


    {{-- PELANGGAN --}}
    <a href="{{ route('pelanggan.index') }}"
       class="dashboard-menu-item">

        <div class="dashboard-menu-icon">
            ◎
        </div>

        <div class="dashboard-menu-text">

            <h3>Pelanggan</h3>

            <p>
                Kelola data pelanggan.
            </p>

        </div>

        <div class="dashboard-arrow">
            →
        </div>

    </a>


    {{-- PROMOSI --}}
    <a href="{{ route('promosi.index') }}"
       class="dashboard-menu-item">

        <div class="dashboard-menu-icon">
            ▤
        </div>

        <div class="dashboard-menu-text">

            <h3>Info & Promosi</h3>

            <p>
                Kelola informasi dan promosi website.
            </p>

        </div>

        <div class="dashboard-arrow">
            →
        </div>

    </a>

</div>

@endsection