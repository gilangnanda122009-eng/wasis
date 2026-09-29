@extends('layouts.admin')

@section('title', 'Pelanggan - Admin Wasis')

@section('page-title', 'Pelanggan')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
@endsection

@section('content')

<div class="page-header">
    <div>
        <span class="page-label">WASIS ADMIN PORTAL</span>
        <h1>Data Pelanggan</h1>
        <p>Kelola data pelanggan dan logo perusahaan.</p>
    </div>

    <a href="{{ route('pelanggan.create') }}" class="add-button">
        + Tambah Pelanggan
    </a>
</div>

<section class="content-card">

    <div class="card-header">
        <div>
            <span>OUR CLIENTS</span>
            <h2>Daftar Pelanggan</h2>
        </div>
        
    </div>

    <div class="table-wrapper">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Nama Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>
                            <span class="customer-id">
                                #{{ $customer->id }}
                            </span>
                        </td>

                        <td>
                            <div class="logo-box">
                                <img
                                    src="{{ asset('storage/customers/' . $customer->logo) }}"
                                    alt="{{ $customer->name }}"
                                >
                            </div>
                        </td>

                        <td>
                            <strong class="customer-name">
                                {{ $customer->name }}
                            </strong>
                        </td>

                        <td>
                            <div class="action-buttons">

                                <a
                                    href="{{ route('pelanggan.edit', $customer->id) }}"
                                    class="edit-button"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('pelanggan.destroy', $customer->id) }}"
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
                        <td colspan="4" class="empty-data">
                            Belum ada data pelanggan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</section>

@endsection