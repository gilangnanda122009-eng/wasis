@extends('layouts.admin')

@section('title', 'Edit Pelanggan - Admin Wasis')

@section('page-title', 'Edit Pelanggan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Edit Pelanggan</h1>
        <p>Perbarui data pelanggan dan logo perusahaan.</p>
    </div>
</div>

<section class="form-card">

    <div class="form-card-header">
        <span>OUR CLIENTS</span>
        <h2>Perbarui Data Pelanggan</h2>
    </div>

    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('pelanggan.update', $customer->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Pelanggan</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $customer->name) }}"
                placeholder="Masukkan nama pelanggan"
                required
            >
        </div>

        <div class="form-group">
            <label>Logo Saat Ini</label>

            <div class="current-logo">
                <img
                    src="{{ asset('storage/customers/' . $customer->logo) }}"
                    alt="{{ $customer->name }}"
                >
            </div>
        </div>

        <div class="form-group">
            <label for="logo">Ganti Logo</label>
            <input
                type="file"
                id="logo"
                name="logo"
                accept="image/jpeg,image/png,image/webp"
            >
            <p class="form-help">Kosongkan jika logo tidak ingin diganti.</p>
            <p class="form-help">Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.</p>
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ $customer->is_active ? 'checked' : '' }}
                >
                Tampilkan di website
            </label>
        </div>

        <div class="form-actions">
            <a
                href="{{ route('pelanggan.index') }}"
                class="cancel-button"
            >
                Batal
            </a>

            <button type="submit" class="save-button">
                Simpan Perubahan
            </button>
        </div>

    </form>

</section>

@endsection