@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | DATA EDIT LAYANAN
    |--------------------------------------------------------------------------
    */

    $layanan = $layanan ?? null;

    /*
    |--------------------------------------------------------------------------
    | SECTION EDITOR
    |--------------------------------------------------------------------------
    */

    $serviceSections = [
        [
            'name' => 'deskripsi',
            'label' => 'Deskripsi',
            'title_field' => 'deskripsi_judul',
            'title_default' => 'DESKRIPSI',
            'content_label' => 'Isi Deskripsi',
            'description' => 'Atur judul dan isi deskripsi OUR SERVICES.',
            'active_label' => 'Tampilkan Deskripsi',
            'active_help' => 'Tampilkan bagian deskripsi pada customer.',
        ],
        [
            'name' => 'fungsi',
            'label' => 'Fungsi',
            'title_field' => 'fungsi_judul',
            'title_default' => 'FUNGSI',
            'content_label' => 'Isi Fungsi',
            'description' => 'Atur judul dan isi fungsi.',
            'active_label' => 'Tampilkan Fungsi',
            'active_help' => 'Tampilkan bagian fungsi pada customer.',
        ],
        [
            'name' => 'manfaat',
            'label' => 'Manfaat',
            'title_field' => 'manfaat_judul',
            'title_default' => 'MANFAAT',
            'content_label' => 'Isi Manfaat',
            'description' => 'Atur judul dan isi manfaat.',
            'active_label' => 'Tampilkan Manfaat',
            'active_help' => 'Tampilkan bagian manfaat pada customer.',
        ],
        [
            'name' => 'dampak',
            'label' => 'Dampak',
            'title_field' => 'dampak_judul',
            'title_default' => 'DAMPAK',
            'content_label' => 'Isi Dampak',
            'description' => 'Atur judul dan isi dampak.',
            'active_label' => 'Tampilkan Dampak',
            'active_help' => 'Tampilkan bagian dampak pada customer.',
        ],
    ];

@endphp

<style>

    /* =========================================================
       WRAPPER
    ========================================================= */

    .layanan-edit-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding-bottom: 30px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .layanan-edit-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .layanan-edit-header h2 {
        margin: 0 0 8px;
        font-size: 28px;
        color: #1f2937;
    }

    .layanan-edit-header p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .back-link {
        color: #64748b;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        padding-top: 7px;
        white-space: nowrap;
    }

    .back-link:hover {
        color: #2563eb;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .error-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 25px;
        font-size: 13px;
        line-height: 1.6;
    }

    .error-box strong {
        display: block;
        margin-bottom: 6px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 20px;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .layanan-edit-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,.05);
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-group {
        margin-bottom: 24px;
    }

    .main-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #374151;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        color: #111827;
        outline: none;
        background: #fff;
        transition: .2s ease;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.10);
    }

    .form-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 20px;
    }


    /* =========================================================
       GAMBAR
    ========================================================= */

    .image-upload-box {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 18px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: #fafafa;
    }

    .image-preview {
        width: 270px;
        height: 200px;
        flex-shrink: 0;
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        color: #9ca3af;
        font-size: 13px;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .image-upload-info {
        flex: 1;
    }

    .image-upload-info strong {
        display: block;
        margin-bottom: 7px;
        color: #2563eb;
        font-size: 14px;
    }

    .image-upload-info p {
        margin: 0 0 15px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }

    .image-upload-info input[type="file"] {
        width: 100%;
        font-size: 13px;
    }

    .image-remove-button {
        display: inline-block;
        margin-top: 12px;
        padding: 8px 14px;
        border: 1px solid #fecaca;
        border-radius: 8px;
        background: #fef2f2;
        color: #dc2626;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .image-remove-button:hover {
        background: #fee2e2;
    }

    .delete-image-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 12px;
        color: #4b5563;
        font-size: 13px;
    }

    .delete-image-row input {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    .image-size-note {
        margin-top: 8px;
        color: #64748b;
        font-size: 12px;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .section-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        margin-bottom: 22px;
        overflow: hidden;
        background: #fff;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 20px;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
        gap: 15px;
    }

    .section-header-left {
        min-width: 0;
    }

    .section-header-left h3 {
        margin: 0 0 4px;
        font-size: 16px;
        color: #111827;
    }

    .section-header-left p {
        margin: 0;
        font-size: 12px;
        color: #6b7280;
        line-height: 1.5;
    }

    .section-body {
        padding: 20px;
    }


    /* =========================================================
       TOGGLE
    ========================================================= */

    .toggle-wrapper {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-shrink: 0;
    }

    .toggle {
        position: relative;
        width: 48px;
        height: 26px;
        flex-shrink: 0;
    }

    .toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        background: #d1d5db;
        border-radius: 30px;
        cursor: pointer;
        transition: .2s ease;
    }

    .toggle-slider::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 3px;
        top: 3px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0,0,0,.2);
        transition: .2s ease;
    }

    .toggle input:checked + .toggle-slider {
        background: #2563eb;
    }

    .toggle input:checked + .toggle-slider::before {
        transform: translateX(22px);
    }

    .toggle-status {
        min-width: 24px;
        font-size: 13px;
        color: #6b7280;
        font-weight: 600;
    }


    /* =========================================================
       EDITOR
    ========================================================= */

    .editor-wrapper {
        border: 1px solid #d1d5db;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        transition: .2s ease;
    }

    .editor-wrapper.active {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.08);
    }

    .editor-toolbar {
        display: none;
        flex-wrap: wrap;
        align-items: center;
        gap: 5px;
        padding: 9px;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }

    .editor-wrapper.active .editor-toolbar {
        display: flex;
    }

    .toolbar-group {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .toolbar-separator {
        width: 1px;
        height: 28px;
        background: #cbd5e1;
        margin: 0 3px;
    }

    .editor-toolbar button,
    .editor-toolbar select {
        height: 34px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #fff;
        color: #334155;
    }

    .editor-toolbar button {
        min-width: 34px;
        padding: 0 9px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .editor-toolbar button:hover,
    .editor-toolbar select:hover {
        border-color: #2563eb;
        background: #eff6ff;
    }

    .editor-toolbar button:active {
        background: #dbeafe;
    }

    .editor-toolbar select {
        min-width: 125px;
        padding: 0 8px;
        font-size: 13px;
        cursor: pointer;
    }

    .color-command {
        width: 42px;
        height: 34px;
        padding: 3px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #fff;
        cursor: pointer;
    }

    .editor-content {
        min-height: 170px;
        padding: 15px;
        outline: none;
        color: #334155;
        font-size: 15px;
        line-height: 1.7;
        word-break: break-word;
        overflow-wrap: anywhere;
    }

    .editor-content:empty::before {
        content: "Tulis di sini...";
        color: #94a3b8;
        pointer-events: none;
    }

    .editor-content p {
        margin: 0 0 10px;
    }

    .editor-content ul,
    .editor-content ol {
        margin-top: 7px;
        margin-bottom: 7px;
        padding-left: 25px;
    }

    .editor-content a {
        color: #2563eb;
        text-decoration: underline;
    }

    .editor-content img {
        max-width: 100%;
        height: auto;
    }

    .editor-done {
        margin-top: 10px;
        padding: 8px 14px;
        border: 0;
        border-radius: 7px;
        background: #2563eb;
        color: #fff;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
    }

    .editor-done:hover {
        background: #1d4ed8;
    }


    /* =========================================================
       STATUS OUR SERVICES
    ========================================================= */

    .status-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        margin-top: 8px;
        background: #fff;
    }

    .status-card h3 {
        margin: 0 0 5px;
        font-size: 16px;
        color: #111827;
    }

    .status-card p {
        margin: 0;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       BUTTONS
    ========================================================= */

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .button-left,
    .button-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 43px;
        padding: 11px 20px;
        border-radius: 9px;
        border: 0;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #e5e7eb;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }


    /* =========================================================
       RICH TEXT SUPPORT
    ========================================================= */

    .editor-content [style*="font-size"] {
        line-height: inherit;
    }

    .editor-content [style*="text-align: center"] {
        text-align: center;
    }

    .editor-content [style*="text-align: right"] {
        text-align: right;
    }

    .editor-content [style*="text-align: left"] {
        text-align: left;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 800px) {

        .layanan-edit-card {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .image-upload-box {
            flex-direction: column;
            align-items: stretch;
        }

        .image-preview {
            width: 100%;
            height: 220px;
        }

        .section-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .toggle-wrapper {
            align-self: flex-end;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .button-left,
        .button-right {
            width: 100%;
        }

        .button-left .btn,
        .button-right .btn {
            width: 100%;
        }

    }

    @media (max-width: 600px) {

        .layanan-edit-header {
            flex-direction: column;
        }

        .back-link {
            padding-top: 0;
        }

        .layanan-edit-header h2 {
            font-size: 25px;
        }

        .editor-toolbar {
            gap: 3px;
        }

        .toolbar-separator {
            display: none;
        }

        .editor-toolbar select {
            max-width: 120px;
        }

        .editor-toolbar button {
            min-width: 32px;
            padding: 0 7px;
        }

    }

</style>


<div class="layanan-edit-wrapper">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="layanan-edit-header">

        <div>

            <h2>
                Edit Layanan
            </h2>

            <p>
                Ubah informasi layanan, gambar, deskripsi,
                fungsi, manfaat, dan dampak yang ditampilkan pada customer.
            </p>

        </div>

        <a
            href="{{ route('service.index') }}"
            class="back-link"
        >
            ← Kembali
        </a>

    </div>


    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if ($errors->any())

        <div class="error-box">

            <strong>
                Terdapat data yang belum benar:
            </strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         FORM
    ====================================================== --}}

    <form
        action="{{ route('service.update', ['service' => $layanan->id]) }}"
        method="POST"
        enctype="multipart/form-data"
        id="layananEditForm"
    >

        @csrf
        @method('PUT')


        <div class="layanan-edit-card">


            {{-- =================================================
                 INFORMASI DASAR
            ================================================== --}}

            <div class="form-row">

                <div class="form-group">

                    <label class="main-label">
                        Nomor
                    </label>

                    <input
                        type="number"
                        name="nomor"
                        class="form-control"
                        value="{{ old('nomor', $layanan->nomor) }}"
                        min="1"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="main-label">
                        Nama Layanan
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama', $layanan->nama) }}"
                        placeholder="Masukkan nama layanan"
                        required
                    >

                </div>

            </div>


            {{-- =================================================
                 GAMBAR
            ================================================== --}}

            <div class="form-group">

                <label class="main-label">
                    Gambar Layanan
                </label>

                <div class="image-upload-box">

                    <div
                        class="image-preview"
                        id="imagePreview"
                    >

                        @if ($layanan->gambar)

                            <img
                                id="imagePreviewImage"
                                src="{{ asset($layanan->gambar) }}"
                                alt="{{ $layanan->nama }}"
                            >

                        @else

                            <span id="imagePreviewText">
                                Preview Gambar
                            </span>

                        @endif

                    </div>


                    <div class="image-upload-info">

                        <strong>
                            Ganti gambar OUR SERVICES
                        </strong>

                        <p>
                            Format JPG, JPEG, PNG, atau WEBP.
                            Untuk menyimpan gambar baru, ukuran harus tepat
                            <strong>1080 x 800 pixel</strong>.
                        </p>

                        <input
                            type="file"
                            name="gambar"
                            id="gambarInput"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <button
                            type="button"
                            class="image-remove-button"
                            id="removeImageButton"
                            style="display:none;"
                        >
                            Batalkan Gambar Baru
                        </button>

                        <div class="image-size-note">
                            Gambar lama tetap dipakai jika tidak memilih gambar baru.
                        </div>

                    </div>

                </div>


                @if ($layanan->gambar)

                    <label class="delete-image-row">

                        <input
                            type="checkbox"
                            name="hapus_gambar"
                            value="1"
                        >

                        Hapus gambar lama saat menyimpan

                    </label>

                @endif

            </div>


            {{-- =================================================
                 DESKRIPSI, FUNGSI, MANFAAT, DAMPAK
            ================================================== --}}

            @foreach ($serviceSections as $section)

                @php
                    $name = $section['name'];
                    $titleField = $section['title_field'];
                    $activeField = $name . '_active';

                    $contentValue = old($name, $layanan->{$name});
                    $titleValue = old(
                        $titleField,
                        $layanan->{$titleField} ?? $section['title_default']
                    );

                    $activeValue = old(
                        $activeField,
                        $layanan->{$activeField}
                    );
                @endphp


                <div class="section-card">

                    <div class="section-header">

                        <div class="section-header-left">

                            <h3>
                                {{ $section['label'] }}
                            </h3>

                            <p>
                                {{ $section['description'] }}
                            </p>

                        </div>


                        <div class="toggle-wrapper">

                            <label class="toggle">

                                <input
                                    type="checkbox"
                                    name="{{ $activeField }}"
                                    value="1"
                                    {{ $activeValue ? 'checked' : '' }}
                                >

                                <span class="toggle-slider"></span>

                            </label>

                            <span class="toggle-status">
                                {{ $activeValue ? 'ON' : 'OFF' }}
                            </span>

                        </div>

                    </div>


                    <div class="section-body">

                        <div class="form-group">

                            <label class="main-label">
                                Judul {{ $section['label'] }}
                            </label>

                            <input
                                type="text"
                                name="{{ $titleField }}"
                                class="form-control"
                                value="{{ $titleValue }}"
                                placeholder="Contoh: {{ $section['title_default'] }}"
                                maxlength="100"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label class="main-label">
                                {{ $section['content_label'] }}
                            </label>


                            <div
                                class="editor-wrapper"
                                data-editor="{{ $name }}"
                            >

                                <div class="editor-toolbar">
                                    <span class="toolbar-separator"></span>


                                    <div class="toolbar-group">

                                        <button
                                            type="button"
                                            data-command="bold"
                                            title="Tebal"
                                        >
                                            B
                                        </button>

                                        <button
                                            type="button"
                                            data-command="italic"
                                            title="Miring"
                                        >
                                            <i>I</i>
                                        </button>

                                        <button
                                            type="button"
                                            data-command="underline"
                                            title="Garis bawah"
                                        >
                                            <u>U</u>
                                        </button>

                                        <button
                                            type="button"
                                            data-command="strikeThrough"
                                            title="Coret"
                                        >
                                            <s>S</s>
                                        </button>

                                    </div>


                                    <span class="toolbar-separator"></span>


                                    <input
                                        type="color"
                                        class="color-command"
                                        value="#334155"
                                        title="Warna teks"
                                    >


                                    <span class="toolbar-separator"></span>


                                    <div class="toolbar-group">

                                        <button
                                            type="button"
                                            data-command="justifyLeft"
                                            title="Rata kiri"
                                        >
                                            ≡
                                        </button>

                                        <button
                                            type="button"
                                            data-command="justifyCenter"
                                            title="Rata tengah"
                                        >
                                            ≡
                                        </button>

                                        <button
                                            type="button"
                                            data-command="justifyRight"
                                            title="Rata kanan"
                                        >
                                            ≡
                                        </button>

                                        <button
                                            type="button"
                                            data-command="justifyFull"
                                            title="Rata kiri kanan"
                                        >
                                            ≡
                                        </button>

                                    </div>


                                    <span class="toolbar-separator"></span>


                                    <button
                                        type="button"
                                        data-command="insertUnorderedList"
                                        title="Bullet"
                                    >
                                        •
                                    </button>

                                    <button
                                        type="button"
                                        data-command="insertOrderedList"
                                        title="Numbering"
                                    >
                                        1.
                                    </button>

                                    <button
                                        type="button"
                                        data-command="outdent"
                                        title="Kurangi indentasi"
                                    >
                                        ←
                                    </button>

                                    <button
                                        type="button"
                                        data-command="indent"
                                        title="Tambah indentasi"
                                    >
                                        →
                                    </button>


                                    <span class="toolbar-separator"></span>


                                    <button
                                        type="button"
                                        class="link-command"
                                        title="Tambah link"
                                    >
                                        🔗
                                    </button>

                                    <button
                                        type="button"
                                        data-command="removeFormat"
                                        title="Hapus format"
                                    >
                                        Tx
                                    </button>

                                </div>


                                <div
                                    class="editor-content"
                                    contenteditable="true"
                                    data-editor-content="{{ $name }}"
                                >{!! $contentValue !!}</div>

                            </div>


                            <input
                                type="hidden"
                                name="{{ $name }}"
                                id="input-{{ $name }}"
                                value="{{ $contentValue }}"
                            >


                            <button
                                type="button"
                                class="editor-done"
                                data-editor-done="{{ $name }}"
                            >
                                Selesai
                            </button>

                        </div>

                    </div>

                </div>

            @endforeach


            {{-- =================================================
                 STATUS OUR SERVICES
            ================================================== --}}

            <div class="status-card">

                <h3>
                    Status OUR SERVICES
                </h3>

                <p>
                    Jika aktif, layanan dapat ditampilkan pada halaman customer.
                </p>

                <div class="toggle-wrapper" style="margin-top:15px;">

                    <label class="toggle">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $layanan->is_active) ? 'checked' : '' }}
                        >

                        <span class="toggle-slider"></span>

                    </label>

                    <span class="toggle-status" id="mainStatusText">
                        {{ old('is_active', $layanan->is_active) ? 'ON' : 'OFF' }}
                    </span>

                </div>

            </div>


            {{-- =================================================
                 BUTTON
            ================================================== --}}

            <div class="form-actions">

                <div class="button-left">

                    <a
                        href="{{ route('service.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                </div>

                <div class="button-right">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /* =====================================================
           GAMBAR
        ===================================================== */

        const gambarInput =
            document.getElementById('gambarInput');

        const imagePreview =
            document.getElementById('imagePreview');

        const removeImageButton =
            document.getElementById('removeImageButton');

        const existingImage = @json($layanan->gambar ? asset($layanan->gambar) : null);

        const existingImageAlt = @json($layanan->nama ?? '');


        if (gambarInput && imagePreview && removeImageButton) {

            gambarInput.addEventListener(
                'change',
                function () {

                    const file = this.files[0];

                    if (!file) {

                        restoreExistingImage();
                        removeImageButton.style.display = 'none';

                        return;

                    }

                    const imageUrl = URL.createObjectURL(file);

                    imagePreview.innerHTML = `
                        <img
                            src="${imageUrl}"
                            alt="Preview Gambar Baru"
                        >
                    `;

                    removeImageButton.style.display = 'inline-block';

                }
            );


            removeImageButton.addEventListener(
                'click',
                function () {

                    gambarInput.value = '';

                    restoreExistingImage();

                    removeImageButton.style.display = 'none';

                }
            );

        }


        function restoreExistingImage() {

            if (existingImage) {

                imagePreview.innerHTML = `
                    <img
                        src="${existingImage}"
                        alt="${escapeHtml(existingImageAlt)}"
                    >
                `;

            } else {

                imagePreview.innerHTML = `
                    <span id="imagePreviewText">
                        Preview Gambar
                    </span>
                `;

            }

        }


        function escapeHtml(value) {

            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');

        }


        /* =====================================================
           EDITOR
        ===================================================== */

        let activeEditor = null;

        const savedRanges = new WeakMap();


        function getSelectionRange(editor) {

            const selection = window.getSelection();

            if (!selection || !selection.rangeCount) {
                return null;
            }

            const range = selection.getRangeAt(0);

            if (!editor.contains(range.commonAncestorContainer)) {
                return null;
            }

            return range.cloneRange();

        }


        function saveSelection(editor) {

            if (!editor) {
                return;
            }

            const range = getSelectionRange(editor);

            if (range) {

                savedRanges.set(editor, range);
                activeEditor = editor;

            }

        }


        function restoreSelection(editor) {

            if (!editor) {
                return false;
            }

            const range = savedRanges.get(editor);

            if (!range) {
                return false;
            }

            const selection = window.getSelection();

            selection.removeAllRanges();

            try {

                selection.addRange(range.cloneRange());

            } catch (error) {

                return false;

            }

            activeEditor = editor;

            return true;

        }


        function syncEditor(editor) {

            if (!editor) {
                return;
            }

            const wrapper = editor.closest('.editor-wrapper');

            if (!wrapper) {
                return;
            }

            const name = wrapper.dataset.editor;
            const input = document.getElementById('input-' + name);

            if (input) {
                input.value = editor.innerHTML.trim();
            }

        }


        function normalizeFontTags(editor) {

            if (!editor) {
                return;
            }

            editor.querySelectorAll('font').forEach(function (fontElement) {

                const span = document.createElement('span');

                const face = fontElement.getAttribute('face');
                const size = fontElement.getAttribute('size');
                const color = fontElement.getAttribute('color');

                if (face) {
                    span.style.fontFamily = face;
                }

                if (size) {

                    const sizeMap = {
                        '1': '10px',
                        '2': '12px',
                        '3': '14px',
                        '4': '16px',
                        '5': '18px',
                        '6': '24px',
                        '7': '32px'
                    };

                    span.style.fontSize = sizeMap[size] || size + 'px';

                }

                if (color) {
                    span.style.color = color;
                }

                if (fontElement.style.cssText) {
                    span.style.cssText += fontElement.style.cssText;
                }

                while (fontElement.firstChild) {
                    span.appendChild(fontElement.firstChild);
                }

                fontElement.replaceWith(span);

            });

        }


        function runCommand(editor, command, value = null) {

            if (!editor) {
                return;
            }

            restoreSelection(editor);
            editor.focus();

            try {

                document.execCommand(
                    command,
                    false,
                    value
                );

            } catch (error) {

                console.error(
                    'Command editor error:',
                    command,
                    error
                );

            }

            normalizeFontTags(editor);
            saveSelection(editor);
            syncEditor(editor);

        }


        function activateEditor(wrapper, content) {

            document
                .querySelectorAll('.editor-wrapper')
                .forEach(function (other) {

                    if (other !== wrapper) {
                        other.classList.remove('active');
                    }

                });

            wrapper.classList.add('active');
            activeEditor = content;
            saveSelection(content);

        }


        /* =====================================================
           SETUP SEMUA EDITOR
        ===================================================== */

        document
            .querySelectorAll('.editor-wrapper[data-editor]')
            .forEach(function (wrapper) {

                const content =
                    wrapper.querySelector('.editor-content');

                const toolbar =
                    wrapper.querySelector('.editor-toolbar');

                if (!content || !toolbar) {
                    return;
                }


                content.addEventListener(
                    'click',
                    function (event) {

                        event.stopPropagation();

                        activateEditor(
                            wrapper,
                            content
                        );

                    }
                );


                content.addEventListener(
                    'focus',
                    function () {

                        activateEditor(
                            wrapper,
                            content
                        );

                    }
                );


                content.addEventListener(
                    'keyup',
                    function () {

                        saveSelection(content);
                        syncEditor(content);

                    }
                );


                content.addEventListener(
                    'mouseup',
                    function () {

                        saveSelection(content);

                    }
                );


                content.addEventListener(
                    'input',
                    function () {

                        saveSelection(content);
                        syncEditor(content);

                    }
                );


                content.addEventListener(
                    'paste',
                    function () {

                        window.setTimeout(
                            function () {

                                normalizeFontTags(content);
                                syncEditor(content);
                                saveSelection(content);

                            },
                            50
                        );

                    }
                );


                toolbar.addEventListener(
                    'click',
                    function (event) {

                        event.stopPropagation();

                    }
                );


                toolbar
                    .querySelectorAll('[data-command]')
                    .forEach(function (button) {

                        button.addEventListener(
                            'mousedown',
                            function (event) {

                                event.preventDefault();

                                activeEditor = content;
                                restoreSelection(content);

                                runCommand(
                                    content,
                                    this.dataset.command
                                );

                            }
                        );

                    });

                const colorInput =
                    toolbar.querySelector('.color-command');

                if (colorInput) {

                    colorInput.addEventListener(
                        'mousedown',
                        function () {

                            activeEditor = content;
                            saveSelection(content);

                        }
                    );

                    colorInput.addEventListener(
                        'input',
                        function () {

                            runCommand(
                                content,
                                'foreColor',
                                this.value
                            );

                        }
                    );

                }


                const linkButton =
                    toolbar.querySelector('.link-command');

                if (linkButton) {

                    linkButton.addEventListener(
                        'mousedown',
                        function (event) {

                            event.preventDefault();

                            activeEditor = content;
                            saveSelection(content);
                            restoreSelection(content);

                            const url = window.prompt(
                                'Masukkan alamat link:',
                                'https://'
                            );

                            if (url && url !== 'https://') {

                                runCommand(
                                    content,
                                    'createLink',
                                    url
                                );

                            }

                        }
                    );

                }


                normalizeFontTags(content);
                syncEditor(content);

            });


        /* =====================================================
           KLIK DI LUAR EDITOR
        ===================================================== */

        document.addEventListener(
            'click',
            function (event) {

                if (!event.target.closest('.editor-wrapper')) {

                    document
                        .querySelectorAll('.editor-wrapper')
                        .forEach(function (wrapper) {

                            wrapper.classList.remove('active');

                        });

                    activeEditor = null;

                }

            }
        );


        /* =====================================================
           TOMBOL SELESAI
        ===================================================== */

        document
            .querySelectorAll('[data-editor-done]')
            .forEach(function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const name =
                            this.dataset.editorDone;

                        const editor =
                            document.querySelector(
                                '[data-editor-content="' +
                                name +
                                '"]'
                            );

                        const input =
                            document.getElementById(
                                'input-' + name
                            );

                        if (editor && input) {

                            normalizeFontTags(editor);
                            input.value = editor.innerHTML.trim();

                        }

                        const wrapper =
                            editor
                                ? editor.closest('.editor-wrapper')
                                : null;

                        if (wrapper) {
                            wrapper.classList.remove('active');
                        }

                    }
                );

            });


        /* =====================================================
           TOGGLE STATUS SECTION
        ===================================================== */

        document
            .querySelectorAll('.section-card .toggle input')
            .forEach(function (toggle) {

                toggle.addEventListener(
                    'change',
                    function () {

                        const wrapper =
                            this.closest('.toggle-wrapper');

                        if (!wrapper) {
                            return;
                        }

                        const status =
                            wrapper.querySelector('.toggle-status');

                        if (status) {
                            status.textContent =
                                this.checked ? 'ON' : 'OFF';
                        }

                    }
                );

            });


        /* =====================================================
           TOGGLE STATUS UTAMA
        ===================================================== */

        const mainStatusToggle =
            document.querySelector(
                '.status-card input[name="is_active"]'
            );

        const mainStatusText =
            document.getElementById('mainStatusText');

        if (mainStatusToggle && mainStatusText) {

            mainStatusToggle.addEventListener(
                'change',
                function () {

                    mainStatusText.textContent =
                        this.checked ? 'ON' : 'OFF';

                }
            );

        }


        /* =====================================================
           SEBELUM SUBMIT
        ===================================================== */

        const layananForm =
            document.getElementById('layananEditForm');

        if (layananForm) {

            layananForm.addEventListener(
                'submit',
                function () {

                    document
                        .querySelectorAll('.editor-wrapper[data-editor]')
                        .forEach(function (wrapper) {

                            const editor =
                                wrapper.querySelector('.editor-content');

                            if (!editor) {
                                return;
                            }

                            normalizeFontTags(editor);
                            syncEditor(editor);

                        });

                }
            );

        }

    }
);

</script>

@endsection
