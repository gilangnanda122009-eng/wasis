@extends('layouts.admin')

@section('title', 'Tambah Pelanggan - Admin Wasis')

@section('page-title', 'Tambah Pelanggan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Tambah Pelanggan</h1>
        <p>Tambahkan data pelanggan baru ke website Wasis.</p>
    </div>
</div>

<section class="form-card">

    <div class="form-card-header">
        <span>OUR CLIENTS</span>
        <h2>Data Pelanggan</h2>
    </div>

    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nama Pelanggan</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama pelanggan"
                required
            >
        </div>

        <div class="form-group">
            <label for="logo">Logo Pelanggan</label>
            <input
                type="file"
                id="logo"
                name="logo"
                accept="image/jpeg,image/png,image/webp"
                required
            >
            <p class="form-help">Format: JPG, JPEG, PNG, WEBP <br>
                Maksimal: 2 MB   <br>
                Disarankan: logo horizontal dengan background transparan</p>
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                >
                Tampilkan di website
            </label>
        </div>

        <div class="form-actions">
            <a href="{{ route('pelanggan.index') }}" class="cancel-button">
                Batal
            </a>

            <button type="submit" class="save-button">
                Simpan Pelanggan
            </button>
        </div>

    </form>

</section>

@endsection