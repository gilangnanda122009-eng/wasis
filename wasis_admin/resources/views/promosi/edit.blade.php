@extends('layouts.admin')

@section('title', 'Edit Promosi - Admin Wasis')

@section('page-title', 'Edit Promosi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/promosi.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Edit Promosi</h1>
        <p>Perbarui poster dan link promosi.</p>
    </div>
</div>

<section class="form-card">

    <div class="form-card-header">
        <span>PROMOTIONS</span>
        <h2>Perbarui Data Promosi</h2>
    </div>

    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('promosi.update', $promotion->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Poster Saat Ini</label>

            <div class="current-promotion-poster">
                <img
                    src="{{ asset('storage/promotions/' . $promotion->poster) }}"
                    alt="Poster Promosi"
                >
            </div>
        </div>

        <div class="form-group">
            <label for="poster">Ganti Poster</label>

            <input
                type="file"
                id="poster"
                name="poster"
                accept="image/jpeg,image/png,image/webp"
            >

            <p class="form-help">
                Kosongkan jika poster tidak ingin diganti.
            </p>

            <p class="form-help">
                Format JPG, JPEG, PNG, WEBP. Maksimal 3 MB.
            </p>
        </div>

        <div class="form-group">
            <label for="link">Link Promosi</label>

            <input
                type="url"
                id="link"
                name="link"
                value="{{ old('link', $promotion->link) }}"
                placeholder="https://www.instagram.com/..."
                
            >
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ $promotion->is_active ? 'checked' : '' }}
                >
                Tampilkan di website
            </label>
        </div>

        <div class="form-actions">

            <a
                href="{{ route('promosi.index') }}"
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