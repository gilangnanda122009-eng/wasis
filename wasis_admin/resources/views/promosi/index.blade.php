@extends('layouts.admin')

@section('title', 'Promosi - Admin Wasis')

@section('page-title', 'Promosi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/promosi.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Informasi & Promosi</h1>
        <p>Kelola poster promosi dan tautan media sosial.</p>
    </div>

    <a href="{{ route('promosi.create') }}" class="add-button">
        + Tambah Promosi
    </a>
</div>

<section class="content-card">

    <div class="card-header">
        <div>
            <span>PROMOTIONS</span>
            <h2>Daftar Promosi</h2>
        </div>
    </div>

    <div class="table-wrapper">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Poster</th>
                    <th>Link Promosi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($promotions as $promotion)

                    <tr>

                        <td>
                            <span class="promotion-id">
                                #{{ $promotion->id }}
                            </span>
                        </td>

                        <td>
                            <div class="promotion-poster">
                                <img
                                    src="{{ asset('storage/promotions/' . $promotion->poster) }}"
                                    alt="Poster Promosi"
                                >
                            </div>
                        </td>

                        <td>
                            @if ($promotion->link)
                                <a
                                    href="{{ $promotion->link }}"
                                    target="_blank"
                                    rel="noopener"
                                    class="promotion-link"
                                >
                                    {{ $promotion->link }}
                                </a>
                            @else
                                <span class="no-link">
                                    Tidak ada link
                                </span>
                            @endif
                        </td>

                        <td>
                            <span class="promotion-status {{ $promotion->is_active ? 'active' : 'inactive' }}">
                                {{ $promotion->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>

                        <td>
                            <div class="action-buttons">

                                <a
                                    href="{{ route('promosi.edit', $promotion->id) }}"
                                    class="edit-button"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('promosi.destroy', $promotion->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                    >
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="empty-data">
                            Belum ada data promosi.
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>

    </div>

</section>

@endsection