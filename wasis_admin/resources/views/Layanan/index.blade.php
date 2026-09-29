@extends('layouts.admin')

@section('title', 'OUR SERVICES')
@section('page-title', 'OUR SERVICES')

@section('content')

<style>

    /* =========================================================
       WRAPPER
    ========================================================= */

    .layanan-index-wrapper {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .layanan-index-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .layanan-index-header-left h2 {
        margin: 0 0 7px;
        font-size: 32px;
        color: #123f68;
        font-weight: 700;
    }

    .layanan-index-header-left p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .layanan-index-header-actions {
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
        box-shadow:
            0 4px 12px rgba(22, 131, 255, .18);
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
       TABEL
    ========================================================= */

    .layanan-table-card {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        box-shadow:
            0 4px 18px rgba(0, 0, 0, .04);
        overflow-x: auto;
    }

    .layanan-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 1200px;
    }

    .layanan-table thead th {
        background: #f7f9fc;
        color: #40566e;
        font-size: 13px;
        font-weight: 700;
        padding: 15px 13px;
        text-align: left;
        border-bottom: 1px solid #e8edf3;
        white-space: nowrap;
    }

    .layanan-table thead th:first-child {
        border-radius: 10px 0 0 0;
    }

    .layanan-table thead th:last-child {
        border-radius: 0 10px 0 0;
    }

    .layanan-table tbody td {
        padding: 16px 13px;
        border-bottom: 1px solid #edf1f5;
        vertical-align: middle;
        color: #334155;
        font-size: 13px;
    }

    .layanan-table tbody tr:last-child td {
        border-bottom: none;
    }

    .layanan-table tbody tr:hover {
        background: #fbfdff;
    }


    /* =========================================================
       NOMOR
    ========================================================= */

    .layanan-number {
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

    .layanan-image {
        width: 90px;
        height: 65px;
        border-radius: 8px;
        overflow: hidden;
        background: #edf1f5;
        border: 1px solid #e1e7ee;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .layanan-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .layanan-image-empty {
        color: #94a3b8;
        font-size: 10px;
        text-align: center;
        padding: 5px;
    }


    /* =========================================================
       NAMA
    ========================================================= */

    .layanan-name {
        font-weight: 700;
        color: #1e3f60;
        font-size: 14px;
        min-width: 160px;
        max-width: 220px;
        line-height: 1.5;
    }


    /* =========================================================
       DESKRIPSI / DETAIL
    ========================================================= */

    .layanan-description {
        width: 170px;
        max-width: 170px;
        line-height: 1.5;
        color: #64748b;
    }

    .layanan-detail {
        width: 155px;
        max-width: 155px;
        line-height: 1.5;
        color: #64748b;
    }

    .layanan-text-preview {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        word-break: break-word;
    }

    .layanan-detail-label {
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

    .layanan-actions {
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

    .layanan-empty {
        text-align: center;
        padding: 50px 20px;
        color: #64748b;
    }

    .layanan-empty-icon {
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

    .layanan-empty h3 {
        margin: 0 0 8px;
        color: #334155;
    }

    .layanan-empty p {
        margin: 0;
    }


    /* =========================================================
       MODAL HAPUS
    ========================================================= */

    .hapus-modal {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, .55);
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
        background: #b91c1b;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .layanan-table-card {
            padding: 18px;
        }

    }


    @media (max-width: 850px) {

        .layanan-index-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .layanan-index-header-actions {
            width: 100%;
        }

        .btn-kembali,
        .btn-tambah {
            flex: 1;
        }

        .layanan-table-card {
            padding: 15px;
        }

    }


    @media (max-width: 600px) {

        .layanan-index-header-left h2 {
            font-size: 28px;
        }

        .layanan-index-header-left p {
            font-size: 13px;
        }

        .layanan-index-header-actions {
            flex-direction: column;
            align-items: stretch;
            width: 100%;
        }

        .btn-kembali,
        .btn-tambah {
            width: 100%;
            flex: none;
        }

    }

</style>


<div class="layanan-index-wrapper">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="layanan-index-header">

        <div class="layanan-index-header-left">

            <h2>
                OUR SERVICES
            </h2>

            <p>
                Kelola layanan yang akan ditampilkan pada website.
            </p>

        </div>


        <div class="layanan-index-header-actions">

            {{-- KEMBALI --}}

            <a
                href="{{ route('produk.index') }}"
                class="btn-kembali"
            >
                ← Aplikasi Kami
            </a>


            {{-- TAMBAH --}}

            <a
                href="{{ route('service.create') }}"
                class="btn-tambah"
            >
                + Tambah Layanan
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
         TABEL
    ====================================================== --}}

    <div class="layanan-table-card">

        @if(isset($services) && $services->count())

            <table class="layanan-table">

                <thead>

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Gambar
                        </th>

                        <th>
                            Nama Layanan
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th>
                            Fungsi
                        </th>

                        <th>
                            Manfaat
                        </th>

                        <th>
                            Dampak
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

                    @foreach($services as $service)

                        <tr>


                            {{-- NOMOR --}}

                            <td>

                                <div class="layanan-number">

                                    {{ $service->nomor ?? '01' }}

                                </div>

                            </td>


                            {{-- GAMBAR --}}

                            <td>

                                <div class="layanan-image">

                                    @if(!empty($service->gambar))

                                        <img
                                            src="{{ asset($service->gambar) }}"
                                            alt="{{ $service->nama ?? 'Layanan' }}"
                                        >

                                    @else

                                        <div class="layanan-image-empty">
                                            Tidak ada
                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- NAMA --}}

                            <td>

                                <div class="layanan-name">

                                    {{ $service->nama ?? 'Belum ada nama' }}

                                </div>

                            </td>


                            {{-- DESKRIPSI --}}

                            <td>

                                <div class="layanan-description">

                                    <span class="layanan-detail-label">
                                        Deskripsi
                                    </span>

                                    <div class="layanan-text-preview">

                                        {{ strip_tags($service->deskripsi ?? '') }}

                                    </div>

                                </div>

                            </td>


                            {{-- FUNGSI --}}

                            <td>

                                <div class="layanan-detail">

                                    <span class="layanan-detail-label">
                                        Fungsi
                                    </span>

                                    <div class="layanan-text-preview">

                                        {{ strip_tags($service->fungsi ?? '') }}

                                    </div>

                                </div>

                            </td>


                            {{-- MANFAAT --}}

                            <td>

                                <div class="layanan-detail">

                                    <span class="layanan-detail-label">
                                        Manfaat
                                    </span>

                                    <div class="layanan-text-preview">

                                        {{ strip_tags($service->manfaat ?? '') }}

                                    </div>

                                </div>

                            </td>


                            {{-- DAMPAK --}}

                            <td>

                                <div class="layanan-detail">

                                    <span class="layanan-detail-label">
                                        Dampak
                                    </span>

                                    <div class="layanan-text-preview">

                                        {{ strip_tags($service->dampak ?? '') }}

                                    </div>

                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if(!empty($service->is_active))

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


                            {{-- AKSI --}}

                            <td>

                                <div class="layanan-actions">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'service.edit',
                                            ['service' => $service->id]
                                        ) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    {{-- HAPUS --}}

                                    <button
                                        type="button"
                                        class="btn-hapus"
                                        onclick="bukaModalHapus({{ $service->id }})"
                                    >
                                        Hapus
                                    </button>

                                </div>


                                {{-- FORM HAPUS --}}

                                <form
                                    id="form-hapus-{{ $service->id }}"
                                    action="{{ route(
                                        'service.destroy',
                                        ['service' => $service->id]
                                    ) }}"
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


            <div class="layanan-empty">

                <div class="layanan-empty-icon">
                    +
                </div>


                <h3>
                    Belum Ada Layanan
                </h3>


                <p>
                    Belum ada layanan OUR SERVICES yang ditambahkan.
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
            Hapus Layanan?
        </h3>


        <p>
            Apakah Anda yakin menghapus layanan ini?
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

    let layananYangAkanDihapus = null;


    /* =========================================================
       BUKA MODAL HAPUS
    ========================================================= */

    function bukaModalHapus(id)
    {
        layananYangAkanDihapus = id;


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
        layananYangAkanDihapus = null;


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
        if (!layananYangAkanDihapus) {

            return;

        }


        const form =
            document.getElementById(
                'form-hapus-' +
                layananYangAkanDihapus
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