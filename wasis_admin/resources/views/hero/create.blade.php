@extends('layouts.admin')

@section('title', 'Tambah Hero - Admin Wasis')

@section('page-title', 'Tambah Hero')

@section('css')

<link rel="stylesheet" href="{{ asset('css/hero.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Tambah Hero</h1>
        <p>Tambahkan gambar hero slider baru ke website Wasis.</p>
    </div>
</div>

<section class="form-card">

```
<div class="form-card-header">
    <span>HERO SLIDER</span>
    <h2>Data Hero</h2>
</div>

@if ($errors->any())
    <div class="error-box">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form
    action="{{ route('hero.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    <div class="form-group">
        <label for="name">Nama Hero</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="Contoh: Hero Beranda"
            required
        >

        <p class="form-help">
            Masukkan nama untuk membedakan gambar hero.
        </p>
    </div>

    <div class="form-group">
        <label for="file">File Hero</label>

        <input
            type="file"
            id="file"
            name="file"
            accept="image/jpeg,image/png,image/webp"
            required
        >

        <p class="form-help">
            Format JPG, JPEG, PNG, WEBP. Maksimal 3 MB.
        </p>

        <p class="form-help">
            Disarankan menggunakan ukuran 1600 × 900 px.
        </p>
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

        <a
            href="{{ route('hero.index') }}"
            class="cancel-button"
        >
            Batal
        </a>

        <button type="submit" class="save-button">
            Simpan Hero
        </button>

    </div>

</form>
```

</section>

@endsection
