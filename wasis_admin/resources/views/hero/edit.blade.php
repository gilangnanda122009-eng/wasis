@extends('layouts.admin')

@section('title', 'Edit Hero - Admin Wasis')

@section('page-title', 'Edit Hero')

@section('css')

<link rel="stylesheet" href="{{ asset('css/hero.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Edit Hero</h1>
        <p>Perbarui gambar dan pengaturan hero slider website Wasis.</p>
    </div>
</div>

<section class="form-card">

```
<div class="form-card-header">
    <span>HERO SLIDER</span>
    <h2>Edit Data Hero</h2>
</div>

@if ($errors->any())
    <div class="error-box">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form
    action="{{ route('hero.update', $hero->id) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nama Hero</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $hero->name) }}"
            required
        >

        <p class="form-help">
            Masukkan nama untuk hero slider.
        </p>
    </div>

    <div class="form-group">
        <label>File Hero Saat Ini</label>

        <div class="current-hero">
            <img
                src="{{ asset('storage/heroes/' . $hero->file) }}"
                alt="{{ $hero->name }}"
            >
        </div>
    </div>

    <div class="form-group">
        <label for="file">Ganti File Hero</label>

        <input
            type="file"
            id="file"
            name="file"
            accept="image/jpeg,image/png,image/webp"
        >

        <p class="form-help">
            Kosongkan jika tidak ingin mengganti gambar.
        </p>

        <p class="form-help">
            Format JPG, JPEG, PNG, WEBP. Maksimal 3 MB.
        </p>
    </div>

    <div class="form-group checkbox-group">
        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ $hero->is_active ? 'checked' : '' }}
            >
            Tampilkan di website
        </label>
    </div>

    <div class="form-actions">

        <a
            href="{{ route('hero.index') }}"
            class="cancel-button"
        >
            Batal
        </a>

        <button type="submit" class="save-button">
            Simpan Perubahan
        </button>

    </div>

</form>
```

</section>

@endsection
