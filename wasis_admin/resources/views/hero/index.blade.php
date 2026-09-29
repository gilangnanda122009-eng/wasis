@extends('layouts.admin')

@section('title', 'Hero Slider - Admin Wasis')

@section('page-title', 'Hero Slider')

@section('css')

<link rel="stylesheet" href="{{ asset('css/hero.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Hero Slider</h1>
        <p>Kelola gambar yang ditampilkan pada slider halaman utama website Wasis.</p>
    </div>

```
<a href="{{ route('hero.create') }}" class="add-button">
    + Tambah Hero
</a>
```

</div>

<section class="data-card">

```
<div class="data-card-header">
    <div>
        <span>HERO SLIDER</span>
        <h2>Daftar Hero</h2>
    </div>

    <span class="data-count">
        {{ $heroes->count() }} Hero
    </span>
</div>

@if ($heroes->count() > 0)

    <div class="hero-grid">

        @foreach ($heroes as $hero)

            <div class="hero-card">

                <div class="hero-image">
                    <img
                        src="{{ asset('storage/heroes/' . $hero->file) }}"
                        alt="{{ $hero->name }}"
                    >

                    <span class="{{ $hero->is_active ? 'status-active' : 'status-inactive' }}">
                        {{ $hero->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div>

                <div class="hero-card-body">

                    <div>
                        <span class="hero-number">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3>{{ $hero->name }}</h3>
                    </div>

                    <div class="hero-card-actions">

                        <a
                            href="{{ route('hero.edit', $hero->id) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('hero.destroy', $hero->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                                onclick="return confirm('Hapus hero ini?')"
                            >
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="empty-state">
        <span>HERO SLIDER</span>
        <h3>Belum ada hero</h3>
        <p>Tambahkan gambar hero pertama untuk ditampilkan pada website.</p>

        <a href="{{ route('hero.create') }}" class="add-button">
            + Tambah Hero
        </a>
    </div>

@endif
```

</section>

@endsection
