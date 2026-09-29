@extends('layouts.admin')

@section('title', 'Edit Aplikasi')
@section('page-title', 'Edit Aplikasi')

@section('content')

<style>

    /* =========================================================
       WRAPPER
    ========================================================= */

    .produk-index-wrapper {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .produk-index-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .produk-index-header-left h2 {
        margin: 0 0 7px;
        font-size: 32px;
        color: #123f68;
        font-weight: 700;
    }

    .produk-index-header-left p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .produk-index-header-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }


    /* =========================================================
       TOMBOL HEADER
    ========================================================= */

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 11px 20px;

        border-radius: 10px;

        background: #e5ebf3;
        color: #40566e;

        text-decoration: none;

        font-weight: 600;
        font-size: 14px;

        transition: .2s ease;
    }

    .btn-kembali:hover {
        background: #d9e1eb;
    }


    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 11px 20px;

        border-radius: 10px;

        background: #1683ff;
        color: #fff;

        text-decoration: none;

        font-weight: 600;
        font-size: 14px;

        transition: .2s ease;

        box-shadow: 0 4px 12px rgba(22, 131, 255, .18);
    }

    .btn-tambah:hover {
        background: #0875eb;
        transform: translateY(-1px);
    }


    /* =========================================================
       ALERT
    ========================================================= */

    .alert-success {
        background: #d9fbe5;
        color: #087443;

        border-radius: 10px;

        padding: 14px 17px;

        margin-bottom: 22px;

        font-size: 14px;
    }


    /* =========================================================
       PENGATURAN HALAMAN APLIKASI
    ========================================================= */

    .page-settings {
        width: 100%;
        margin-bottom: 25px;
    }

    .page-settings-title {
        margin: 0 0 6px;

        color: #123f68;

        font-size: 22px;
        font-weight: 700;
    }

    .page-settings-description {
        margin: 0 0 15px;

        color: #64748b;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       GRID
    ========================================================= */

    .page-settings-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 16px;

        width: 100%;
    }


    /* =========================================================
       KOTAK KECIL
       PERSEGI PANJANG
       TIDAK MELENGKUNG
    ========================================================= */

    .page-setting-card {
        width: 100%;

        min-height: 185px;

        padding: 20px;

        background: #ffffff;

        border: 1px solid #dbe5ef;

        border-radius: 0;

        box-shadow: none;

        display: flex;

        flex-direction: column;

        justify-content: space-between;
    }


    /* =========================================================
       BADGE EDIT
    ========================================================= */

    .page-setting-badge {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: fit-content;

        padding: 6px 11px;

        border-radius: 0;

        background: #eaf3ff;

        color: #1683ff;

        font-size: 13px;

        font-weight: 700;
    }


    /* =========================================================
       JUDUL
    ========================================================= */

    .page-setting-card h3 {
        margin: 15px 0 0;

        color: #173f65;

        font-size: 20px;

        line-height: 1.35;

        font-weight: 700;
    }


    /* =========================================================
       KETERANGAN
    ========================================================= */

    .page-setting-card p {
        margin: 12px 0 0;

        color: #58718d;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       TOMBOL EDIT 1 / 2 / 3
    ========================================================= */

    .page-setting-button {
        display: flex;

        align-items: center;
        justify-content: center;

        width: 100%;

        margin-top: 18px;

        padding: 10px 15px;

        border-radius: 0;

        background: #eaf3ff;

        color: #1683ff;

        text-decoration: none;

        text-align: center;

        font-size: 14px;

        font-weight: 700;

        transition: .2s ease;
    }

    .page-setting-button:hover {
        background: #dcecff;

        color: #0875eb;
    }


    /* =========================================================
       TABEL
    ========================================================= */

    .produk-table-card {
        background: #fff;

        border-radius: 16px;

        padding: 24px;

        box-shadow:
            0 4px 18px rgba(0, 0, 0, .04);

        overflow-x: auto;
    }

    .produk-table {
        width: 100%;

        border-collapse: separate;

        border-spacing: 0;

        min-width: 1100px;
    }

    .produk-table thead th {
        background: #f7f9fc;

        color: #40566e;

        font-size: 13px;

        font-weight: 700;

        padding: 15px 13px;

        text-align: left;

        border-bottom: 1px solid #e8edf3;

        white-space: nowrap;
    }

    .produk-table thead th:first-child {
        border-radius: 10px 0 0 0;
    }

    .produk-table thead th:last-child {
        border-radius: 0 10px 0 0;
    }

    .produk-table tbody td {
        padding: 16px 13px;

        border-bottom:
            1px solid #edf1f5;

        vertical-align: middle;

        color: #334155;

        font-size: 13px;
    }

    .produk-table tbody tr:last-child td {
        border-bottom: none;
    }

    .produk-table tbody tr:hover {
        background: #fbfdff;
    }


    /* =========================================================
       NOMOR
    ========================================================= */

    .produk-number {
        width: 42px;

        height: 42px;

        border-radius: 10px;

        background: #edf5ff;

        color: #1674e8;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 16px;

        font-weight: 700;
    }


    /* =========================================================
       GAMBAR
    ========================================================= */

    .produk-image {
        width: 68px;

        height: 50px;

        border-radius: 8px;

        overflow: hidden;

        background: #edf1f5;

        border: 1px solid #e1e7ee;

        display: flex;

        align-items: center;

        justify-content: center;
    }

    .produk-image img {
        width: 100%;

        height: 100%;

        object-fit: cover;

        display: block;
    }

    .produk-image-empty {
        color: #94a3b8;

        font-size: 10px;

        text-align: center;

        padding: 5px;
    }


    /* =========================================================
       NAMA
    ========================================================= */

    .produk-name {
        font-weight: 700;

        color: #1e3f60;

        font-size: 14px;

        min-width: 140px;
    }


    /* =========================================================
       DESKRIPSI
    ========================================================= */

    .produk-description {
        width: 150px;

        max-width: 150px;

        line-height: 1.5;

        color: #64748b;
    }

    .produk-detail {
        width: 145px;

        max-width: 145px;

        line-height: 1.5;

        color: #64748b;
    }

    .produk-text-preview {
        display: -webkit-box;

        -webkit-box-orient: vertical;

        -webkit-line-clamp: 3;

        overflow: hidden;

        word-break: break-word;
    }

    .produk-detail-label {
        display: block;

        font-size: 10px;

        font-weight: 700;

        color: #94a3b8;

        text-transform: uppercase;

        margin-bottom: 3px;

        letter-spacing: .3px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 12px;

        border-radius: 30px;

        font-size: 12px;

        font-weight: 700;

        white-space: nowrap;
    }

    .status-active {
        background: #dcfce7;

        color: #15803d;
    }

    .status-inactive {
        background: #fee2e2;

        color: #dc2626;
    }


    /* =========================================================
       AKSI
    ========================================================= */

    .produk-actions {
        display: flex;

        align-items: center;

        gap: 7px;
    }


    .btn-edit {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 9px 13px;

        border-radius: 9px;

        background: #eaf3ff;

        color: #1674e8;

        border: none;

        text-decoration: none;

        font-weight: 600;

        cursor: pointer;

        font-size: 12px;

        position: relative;

        z-index: 10;
    }

    .btn-edit:hover {
        background: #dcecff;

        color: #0875eb;
    }


    .btn-hapus {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 9px 13px;

        border-radius: 9px;

        background: #fee2e2;

        color: #dc2626;

        border: none;

        font-weight: 600;

        cursor: pointer;

        font-size: 12px;

        position: relative;

        z-index: 10;
    }

    .btn-hapus:hover {
        background: #fecaca;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .produk-empty {
        text-align: center;

        padding: 50px 20px;

        color: #64748b;
    }

    .produk-empty-icon {
        width: 60px;

        height: 60px;

        margin: 0 auto 15px;

        border-radius: 14px;

        background: #edf5ff;

        color: #1683ff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 26px;
    }

    .produk-empty h3 {
        margin: 0 0 8px;

        color: #334155;
    }

    .produk-empty p {
        margin: 0;
    }


    /* =========================================================
       MODAL HAPUS
    ========================================================= */

    .hapus-modal {
        position: fixed;

        inset: 0;

        background:
            rgba(15, 23, 42, .55);

        display: none;

        align-items: center;

        justify-content: center;

        padding: 20px;

        z-index: 9999;
    }

    .hapus-modal.show {
        display: flex;
    }

    .hapus-modal-box {
        width: 100%;

        max-width: 430px;

        background: #fff;

        border-radius: 18px;

        padding: 30px;

        box-shadow:
            0 20px 50px rgba(0, 0, 0, .18);

        text-align: center;
    }

    .hapus-modal-icon {
        width: 58px;

        height: 58px;

        margin: 0 auto 18px;

        border-radius: 50%;

        background: #fee2e2;

        color: #dc2626;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 25px;

        font-weight: 700;
    }

    .hapus-modal-box h3 {
        margin: 0 0 10px;

        color: #1e293b;

        font-size: 21px;
    }

    .hapus-modal-box p {
        margin: 0 0 25px;

        color: #64748b;

        line-height: 1.6;
    }

    .hapus-modal-actions {
        display: flex;

        gap: 12px;

        justify-content: center;
    }

    .btn-tidak,
    .btn-ya {
        min-width: 110px;

        padding: 12px 20px;

        border-radius: 10px;

        border: none;

        font-weight: 600;

        cursor: pointer;

        font-size: 14px;
    }

    .btn-tidak {
        background: #e5e7eb;

        color: #374151;
    }

    .btn-ya {
        background: #dc2626;

        color: #fff;
    }

    .btn-tidak:hover {
        background: #d1d5db;
    }

    .btn-ya:hover {
        background: #b91c1c;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .page-settings-grid {
            grid-template-columns:
                repeat(3, minmax(220px, 1fr));
        }

        .page-setting-card {
            min-width: 220px;
        }

    }


    @media (max-width: 850px) {

        .produk-index-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .produk-index-header-actions {
            width: 100%;
        }

        .btn-kembali,
        .btn-tambah {
            flex: 1;
        }

        .page-settings-grid {
            grid-template-columns: 1fr;
        }

        .page-setting-card {
            min-height: 160px;

            min-width: 0;
        }

        .produk-table-card {
            padding: 15px;
        }

    }


    @media (max-width: 600px) {

        .produk-index-header-left h2 {
            font-size: 28px;
        }

        .produk-index-header-left p {
            font-size: 13px;
        }

        .produk-index-header-actions {
            flex-direction: column;

            align-items: stretch;
        }

        .btn-kembali,
        .btn-tambah {
            width: 100%;
        }

        .page-setting-card {
            padding: 18px;

            min-height: 150px;
        }

        .page-setting-card h3 {
            font-size: 18px;
        }

        .page-setting-card p {
            font-size: 13px;
        }

    }

</style>


<div class="produk-index-wrapper">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="produk-index-header">

        <div class="produk-index-header-left">

            <h2>
                Edit Aplikasi
            </h2>

            <p>
                Kelola aplikasi yang sudah ditambahkan.
            </p>

        </div>


        <div class="produk-index-header-actions">

            <a
                href="{{ route('produk.menu') }}"
                class="btn-kembali"
            >
                ← Kembali
            </a>


            <a
                href="{{ route('produk.create') }}"
                class="btn-tambah"
            >
                + Tambah Aplikasi
            </a>

        </div>

    </div>


    {{-- =====================================================
         PESAN SUKSES
    ====================================================== --}}

    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =====================================================
         PENGATURAN HALAMAN APLIKASI
    ====================================================== --}}

    <div class="page-settings">

        <h3 class="page-settings-title">
            Pengaturan Halaman Aplikasi
        </h3>

        <p class="page-settings-description">
            Atur bagian tulisan yang tampil pada halaman aplikasi.
        </p>


        <div class="page-settings-grid">


            {{-- =================================================
                 EDIT 1
            ================================================== --}}

            <div class="page-setting-card">

                <div>

                    <span class="page-setting-badge">
                        Edit 1
                    </span>


                    <h3>
                        WASIS TECHNOLOGY
                    </h3>

                </div>


                <a
                    href="{{ route('produk.page-setting.edit', ['bagian' => 'wasis']) }}"
                    class="page-setting-button"
                >
                    Edit 1
                </a>

            </div>


            {{-- =================================================
                 EDIT 2
            ================================================== --}}

            <div class="page-setting-card">

                <div>

                    <span class="page-setting-badge">
                        Edit 2
                    </span>


                    <h3>
                        Aplikasi yang Kami Buat
                    </h3>

                </div>


                <a
                    href="{{ route('produk.page-setting.edit', ['bagian' => 'sub']) }}"
                    class="page-setting-button"
                >
                    Edit 2
                </a>

            </div>



        </div>

    </div>


    {{-- =====================================================
         TABEL APLIKASI
    ====================================================== --}}

    <div class="produk-table-card">

        @if($products->count())


            <table class="produk-table">

                <thead>

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Gambar
                        </th>

                        <th>
                            Nama Aplikasi
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th>
                            Edit 1
                        </th>

                        <th>
                            Edit 2
                        </th>

                        <th>
                            Edit 3
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($products as $produk)

                        <tr>


                            {{-- NOMOR --}}

                            <td>

                                <div class="produk-number">
                                    {{ $produk->nomor }}
                                </div>

                            </td>


                            {{-- GAMBAR --}}

                            <td>

                                <div class="produk-image">

                                    @if($produk->gambar)

                                        <img
                                            src="{{ asset($produk->gambar) }}"
                                            alt="{{ $produk->nama }}"
                                        >

                                    @else

                                        <div class="produk-image-empty">
                                            Tidak ada
                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- NAMA --}}

                            <td>

                                <div class="produk-name">
                                    {{ $produk->nama }}
                                </div>

                            </td>


                            {{-- DESKRIPSI --}}

                            <td>

                                <div class="produk-description">

                                    <span class="produk-detail-label">
                                        Deskripsi
                                    </span>


                                    <div class="produk-text-preview">

                                        {{ strip_tags($produk->deskripsi) }}

                                    </div>

                                </div>

                            </td>


                            {{-- EDIT 1 --}}

                            <td>

                                <div class="produk-detail">

                                    <span class="produk-detail-label">
                                        Edit 1
                                    </span>


                                    <div class="produk-text-preview">

                                        {{ strip_tags($produk->fungsi) }}

                                    </div>

                                </div>

                            </td>


                            {{-- EDIT 2 --}}

                            <td>

                                <div class="produk-detail">

                                    <span class="produk-detail-label">
                                        Edit 2
                                    </span>


                                    <div class="produk-text-preview">

                                        {{ strip_tags($produk->manfaat) }}

                                    </div>

                                </div>

                            </td>


                            {{-- EDIT 3 --}}

                            <td>

                                <div class="produk-detail">

                                    <span class="produk-detail-label">
                                        Edit 3
                                    </span>


                                    <div class="produk-text-preview">

                                        {{ strip_tags($produk->dampak) }}

                                    </div>

                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if($produk->is_active)

                                    <span
                                        class="status-badge status-active"
                                    >
                                        Aktif
                                    </span>

                                @else

                                    <span
                                        class="status-badge status-inactive"
                                    >
                                        Nonaktif
                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================== --}}

                            <td>

                                <div class="produk-actions">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('produk.edit', ['produk' => $produk->id]) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    {{-- HAPUS --}}

                                    <button
                                        type="button"
                                        class="btn-hapus"
                                        onclick="bukaModalHapus({{ $produk->id }})"
                                    >
                                        Hapus
                                    </button>

                                </div>


                                {{-- FORM HAPUS --}}

                                <form
                                    id="form-hapus-{{ $produk->id }}"
                                    action="{{ route('produk.destroy', ['produk' => $produk->id]) }}"
                                    method="POST"
                                    style="display:none;"
                                >

                                    @csrf

                                    @method('DELETE')

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>


        @else


            <div class="produk-empty">

                <div class="produk-empty-icon">
                    +
                </div>


                <h3>
                    Belum Ada Aplikasi
                </h3>


                <p>
                    Belum ada aplikasi yang ditambahkan.
                </p>

            </div>


        @endif

    </div>

</div>


{{-- =========================================================
     MODAL HAPUS
========================================================= --}}

<div
    id="hapusModal"
    class="hapus-modal"
>

    <div class="hapus-modal-box">


        <div class="hapus-modal-icon">
            !
        </div>


        <h3>
            Hapus Aplikasi?
        </h3>


        <p>
            Apakah Anda yakin menghapus daftar ini?
        </p>


        <div class="hapus-modal-actions">


            <button
                type="button"
                class="btn-tidak"
                onclick="tutupModalHapus()"
            >
                Tidak
            </button>


            <button
                type="button"
                class="btn-ya"
                onclick="konfirmasiHapus()"
            >
                Ya
            </button>

        </div>

    </div>

</div>


<script>

    let produkYangAkanDihapus = null;


    /* =========================================================
       BUKA MODAL HAPUS
    ========================================================= */

    function bukaModalHapus(id)
    {
        produkYangAkanDihapus = id;


        const modal =
            document.getElementById('hapusModal');


        if (modal) {

            modal.classList.add('show');

        }
    }


    /* =========================================================
       TUTUP MODAL HAPUS
    ========================================================= */

    function tutupModalHapus()
    {
        produkYangAkanDihapus = null;


        const modal =
            document.getElementById('hapusModal');


        if (modal) {

            modal.classList.remove('show');

        }
    }


    /* =========================================================
       KONFIRMASI HAPUS
    ========================================================= */

    function konfirmasiHapus()
    {
        if (!produkYangAkanDihapus) {

            return;

        }


        const form =
            document.getElementById(
                'form-hapus-' +
                produkYangAkanDihapus
            );


        if (form) {

            form.submit();

        }
    }


    /* =========================================================
       KLIK DI LUAR MODAL
    ========================================================= */

    const hapusModal =
        document.getElementById('hapusModal');


    if (hapusModal) {

        hapusModal.addEventListener(
            'click',
            function(event)
            {

                if (event.target === this) {

                    tutupModalHapus();

                }

            }
        );

    }


    /* =========================================================
       ESC
    ========================================================= */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (event.key === 'Escape') {

                tutupModalHapus();

            }

        }
    );

</script>

@endsection