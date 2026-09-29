@extends('layouts.admin')

@section('title', 'Aplikasi Kami')
@section('page-title', 'Aplikasi Kami')

@section('content')

<style>
    .produk-menu {
        max-width: 700px;
        margin: 40px auto;
    }

    .produk-menu-title {
        margin-bottom: 25px;
    }

    .produk-menu-title h2 {
        margin: 0;
        font-size: 26px;
        color: #1f2937;
    }

    .produk-menu-title p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .produk-menu-buttons {
        display: flex;
        gap: 16px;
    }

    .produk-menu-button {
        flex: 1;
        min-height: 110px;
        padding: 22px 25px;
        border-radius: 14px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 18px;
        transition: 0.2s ease;
    }

    .produk-menu-button:hover {
        border-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.10);
    }

    .produk-menu-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #eef4ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .produk-menu-text {
        color: #111827;
        font-size: 17px;
        font-weight: 700;
    }

    @media (max-width: 650px) {
        .produk-menu-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="produk-menu">

    <div class="produk-menu-title">
        <h2>Aplikasi Kami</h2>
        <p>Pilih tindakan.</p>
    </div>

    <div class="produk-menu-buttons">

        <a href="{{ route('produk.index') }}" class="produk-menu-button">
            <div class="produk-menu-icon">✎</div>
            <div class="produk-menu-text">
                Edit Aplikasi
            </div>
        </a>

        <a href="{{ route('produk.create') }}" class="produk-menu-button">
            <div class="produk-menu-icon">+</div>
            <div class="produk-menu-text">
                Tambahkan Aplikasi
            </div>
        </a>

    </div>

</div>

@endsection