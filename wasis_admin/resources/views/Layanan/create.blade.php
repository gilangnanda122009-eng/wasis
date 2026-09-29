@extends('layouts.admin')

@section('title', 'Masukkan Layanan')
@section('page-title', 'Masukkan Layanan')

@section('content')

<style>

    /* =========================================================
       WRAPPER
    ========================================================= */

    .layanan-form-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .layanan-form-header {
        margin-bottom: 25px;
    }

    .layanan-form-header h2 {
        margin: 0 0 8px;
        font-size: 28px;
        color: #1f2937;
    }

    .layanan-form-header p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .layanan-form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 30px;
        box-shadow:
            0 4px 20px rgba(0,0,0,.05);
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
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow:
            0 0 0 3px rgba(37,99,235,.1);
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
        display: none;
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
        box-shadow:
            0 1px 3px rgba(0,0,0,.2);
        transition: .2s ease;
    }

    .toggle input:checked + .toggle-slider {
        background: #2563eb;
    }

    .toggle input:checked + .toggle-slider::before {
        transform: translateX(22px);
    }

    .toggle-status {
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
        box-shadow:
            0 0 0 3px rgba(37,99,235,.08);
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
    }

    .editor-content:empty::before {
        content: "Tulis di sini...";
        color: #94a3b8;
    }

    .editor-content ul,
    .editor-content ol {
        margin-top: 7px;
        margin-bottom: 7px;
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
       STATUS
    ========================================================= */

    .status-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        margin-top: 25px;
        background: #fff;
    }

    .status-card h3 {
        margin: 0 0 5px;
        font-size: 16px;
        color: #111827;
    }

    .status-card p {
        margin: 0 0 15px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 20px;
        border-radius: 9px;
        border: 0;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
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
       ERROR
    ========================================================= */

    .error-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 25px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 20px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .layanan-form-card {
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
        }

        .btn {
            width: 100%;
        }

    }

</style>


<div class="layanan-form-wrapper">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="layanan-form-header">

        <h2>
            Masukkan Layanan
        </h2>

        <p>
            Isi data OUR SERVICES yang akan ditampilkan pada website.
        </p>

    </div>


    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if ($errors->any())

        <div class="error-box">

            <strong>
                Terdapat kesalahan:
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
        action="{{ route('service.store') }}"
        method="POST"
        enctype="multipart/form-data"
        id="layananForm"
    >

        @csrf


        <div class="layanan-form-card">


            {{-- =================================================
                 NOMOR + NAMA
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
                        value="{{ old('nomor') }}"
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
                        value="{{ old('nama') }}"
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

                        <span>
                            Preview Gambar
                        </span>

                    </div>


                    <div class="image-upload-info">

                        <strong>
                            Pilih gambar OUR SERVICES
                        </strong>

                        <p>
                            Format JPG, JPEG, PNG, atau WEBP.
                            Ukuran gambar harus tepat <strong>1080 x 800 pixel</strong>.
                        </p>

                        <input
                            type="file"
                            name="gambar"
                            id="gambarInput"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                        >


                        <button
                            type="button"
                            class="image-remove-button"
                            id="removeImageButton"
                        >
                            Hapus Gambar
                        </button>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DESKRIPSI
            ================================================== --}}

            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>
                            Deskripsi
                        </h3>

                        <p>
                            Atur judul dan isi deskripsi OUR SERVICES.
                        </p>

                    </div>


                    <div class="toggle-wrapper">

                        <label class="toggle">

                            <input
                                type="checkbox"
                                name="deskripsi_active"
                                value="1"
                                checked
                            >

                            <span class="toggle-slider"></span>

                        </label>

                        <span class="toggle-status">
                            ON
                        </span>

                    </div>

                </div>


                <div class="section-body">


                    <div class="form-group">

                        <label class="main-label">
                            Judul Deskripsi
                        </label>

                        <input
                            type="text"
                            name="deskripsi_judul"
                            class="form-control"
                            value="{{ old('deskripsi_judul', 'DESKRIPSI') }}"
                            placeholder="Contoh: DESKRIPSI"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="main-label">
                            Isi Deskripsi
                        </label>


                        <div
                            class="editor-wrapper"
                            data-editor="deskripsi"
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
                                    value="#073763"
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
                                data-editor-content="deskripsi"
                            >{!! old('deskripsi') !!}</div>

                        </div>


                        <input
                            type="hidden"
                            name="deskripsi"
                            id="input-deskripsi"
                            value="{{ old('deskripsi') }}"
                        >


                        <button
                            type="button"
                            class="editor-done"
                            data-editor-done="deskripsi"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 FUNGSI
            ================================================== --}}

            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>
                            Fungsi
                        </h3>

                        <p>
                            Atur judul dan isi fungsi.
                        </p>

                    </div>


                    <div class="toggle-wrapper">

                        <label class="toggle">

                            <input
                                type="checkbox"
                                name="fungsi_active"
                                value="1"
                                checked
                            >

                            <span class="toggle-slider"></span>

                        </label>

                        <span class="toggle-status">
                            ON
                        </span>

                    </div>

                </div>


                <div class="section-body">


                    <div class="form-group">

                        <label class="main-label">
                            Judul Fungsi
                        </label>

                        <input
                            type="text"
                            name="fungsi_judul"
                            class="form-control"
                            value="{{ old('fungsi_judul', 'FUNGSI') }}"
                            placeholder="Contoh: FUNGSI"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="main-label">
                            Isi Fungsi
                        </label>


                        <div
                            class="editor-wrapper"
                            data-editor="fungsi"
                        >

                            <div class="editor-toolbar">
<span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="bold"
                                >
                                    B
                                </button>

                                <button
                                    type="button"
                                    data-command="italic"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    data-command="underline"
                                >
                                    <u>U</u>
                                </button>

                                <button
                                    type="button"
                                    data-command="strikeThrough"
                                >
                                    <s>S</s>
                                </button>


                                <span class="toolbar-separator"></span>


                                <input
                                    type="color"
                                    class="color-command"
                                    value="#073763"
                                >


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="justifyLeft"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyCenter"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyRight"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyFull"
                                >
                                    ≡
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="insertUnorderedList"
                                >
                                    •
                                </button>

                                <button
                                    type="button"
                                    data-command="insertOrderedList"
                                >
                                    1.
                                </button>


                                <button
                                    type="button"
                                    data-command="outdent"
                                >
                                    ←
                                </button>

                                <button
                                    type="button"
                                    data-command="indent"
                                >
                                    →
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    class="link-command"
                                >
                                    🔗
                                </button>

                                <button
                                    type="button"
                                    data-command="removeFormat"
                                >
                                    Tx
                                </button>

                            </div>


                            <div
                                class="editor-content"
                                contenteditable="true"
                                data-editor-content="fungsi"
                            >{!! old('fungsi') !!}</div>

                        </div>


                        <input
                            type="hidden"
                            name="fungsi"
                            id="input-fungsi"
                            value="{{ old('fungsi') }}"
                        >


                        <button
                            type="button"
                            class="editor-done"
                            data-editor-done="fungsi"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 MANFAAT
            ================================================== --}}

            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>
                            Manfaat
                        </h3>

                        <p>
                            Atur judul dan isi manfaat.
                        </p>

                    </div>


                    <div class="toggle-wrapper">

                        <label class="toggle">

                            <input
                                type="checkbox"
                                name="manfaat_active"
                                value="1"
                                checked
                            >

                            <span class="toggle-slider"></span>

                        </label>

                        <span class="toggle-status">
                            ON
                        </span>

                    </div>

                </div>


                <div class="section-body">


                    <div class="form-group">

                        <label class="main-label">
                            Judul Manfaat
                        </label>

                        <input
                            type="text"
                            name="manfaat_judul"
                            class="form-control"
                            value="{{ old('manfaat_judul', 'MANFAAT') }}"
                            placeholder="Contoh: MANFAAT"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="main-label">
                            Isi Manfaat
                        </label>


                        <div
                            class="editor-wrapper"
                            data-editor="manfaat"
                        >

                            <div class="editor-toolbar">
<span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="bold"
                                >
                                    B
                                </button>

                                <button
                                    type="button"
                                    data-command="italic"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    data-command="underline"
                                >
                                    <u>U</u>
                                </button>

                                <button
                                    type="button"
                                    data-command="strikeThrough"
                                >
                                    <s>S</s>
                                </button>


                                <span class="toolbar-separator"></span>


                                <input
                                    type="color"
                                    class="color-command"
                                    value="#073763"
                                >


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="justifyLeft"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyCenter"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyRight"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyFull"
                                >
                                    ≡
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="insertUnorderedList"
                                >
                                    •
                                </button>

                                <button
                                    type="button"
                                    data-command="insertOrderedList"
                                >
                                    1.
                                </button>


                                <button
                                    type="button"
                                    data-command="outdent"
                                >
                                    ←
                                </button>

                                <button
                                    type="button"
                                    data-command="indent"
                                >
                                    →
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    class="link-command"
                                >
                                    🔗
                                </button>

                                <button
                                    type="button"
                                    data-command="removeFormat"
                                >
                                    Tx
                                </button>

                            </div>


                            <div
                                class="editor-content"
                                contenteditable="true"
                                data-editor-content="manfaat"
                            >{!! old('manfaat') !!}</div>

                        </div>


                        <input
                            type="hidden"
                            name="manfaat"
                            id="input-manfaat"
                            value="{{ old('manfaat') }}"
                        >


                        <button
                            type="button"
                            class="editor-done"
                            data-editor-done="manfaat"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DAMPAK
            ================================================== --}}

            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>
                            Dampak
                        </h3>

                        <p>
                            Atur judul dan isi dampak.
                        </p>

                    </div>


                    <div class="toggle-wrapper">

                        <label class="toggle">

                            <input
                                type="checkbox"
                                name="dampak_active"
                                value="1"
                                checked
                            >

                            <span class="toggle-slider"></span>

                        </label>

                        <span class="toggle-status">
                            ON
                        </span>

                    </div>

                </div>


                <div class="section-body">


                    <div class="form-group">

                        <label class="main-label">
                            Judul Dampak
                        </label>

                        <input
                            type="text"
                            name="dampak_judul"
                            class="form-control"
                            value="{{ old('dampak_judul', 'DAMPAK') }}"
                            placeholder="Contoh: DAMPAK"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="main-label">
                            Isi Dampak
                        </label>


                        <div
                            class="editor-wrapper"
                            data-editor="dampak"
                        >

                            <div class="editor-toolbar">
<span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="bold"
                                >
                                    B
                                </button>

                                <button
                                    type="button"
                                    data-command="italic"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    data-command="underline"
                                >
                                    <u>U</u>
                                </button>

                                <button
                                    type="button"
                                    data-command="strikeThrough"
                                >
                                    <s>S</s>
                                </button>


                                <span class="toolbar-separator"></span>


                                <input
                                    type="color"
                                    class="color-command"
                                    value="#073763"
                                >


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="justifyLeft"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyCenter"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyRight"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyFull"
                                >
                                    ≡
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    data-command="insertUnorderedList"
                                >
                                    •
                                </button>

                                <button
                                    type="button"
                                    data-command="insertOrderedList"
                                >
                                    1.
                                </button>


                                <button
                                    type="button"
                                    data-command="outdent"
                                >
                                    ←
                                </button>

                                <button
                                    type="button"
                                    data-command="indent"
                                >
                                    →
                                </button>


                                <span class="toolbar-separator"></span>


                                <button
                                    type="button"
                                    class="link-command"
                                >
                                    🔗
                                </button>

                                <button
                                    type="button"
                                    data-command="removeFormat"
                                >
                                    Tx
                                </button>

                            </div>


                            <div
                                class="editor-content"
                                contenteditable="true"
                                data-editor-content="dampak"
                            >{!! old('dampak') !!}</div>

                        </div>


                        <input
                            type="hidden"
                            name="dampak"
                            id="input-dampak"
                            value="{{ old('dampak') }}"
                        >


                        <button
                            type="button"
                            class="editor-done"
                            data-editor-done="dampak"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 STATUS
            ================================================== --}}

            <div class="status-card">

                <h3>
                    Status OUR SERVICES
                </h3>

                <p>
                    Aktifkan jika layanan ingin ditampilkan pada website.
                </p>


                <div class="toggle-wrapper">

                    <label class="toggle">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked
                        >

                        <span class="toggle-slider"></span>

                    </label>

                    <span class="toggle-status">
                        ON
                    </span>

                </div>

            </div>


            {{-- =================================================
                 BUTTON
            ================================================== --}}

            <div class="form-actions">

                <a
                    href="{{ route('service.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Layanan
                </button>

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
            document.getElementById(
                'gambarInput'
            );

        const imagePreview =
            document.getElementById(
                'imagePreview'
            );

        const removeImageButton =
            document.getElementById(
                'removeImageButton'
            );


        if (
            gambarInput &&
            imagePreview &&
            removeImageButton
        ) {


            gambarInput.addEventListener(
                'change',
                function () {

                    const file =
                        this.files[0];

                    if (!file) {

                        imagePreview.innerHTML = `
                            <span>
                                Preview Gambar
                            </span>
                        `;

                        removeImageButton.style.display =
                            'none';

                        return;
                    }


                    const imageUrl =
                        URL.createObjectURL(
                            file
                        );


                    imagePreview.innerHTML = `
                        <img
                            src="${imageUrl}"
                            alt="Preview Gambar"
                        >
                    `;


                    removeImageButton.style.display =
                        'inline-block';

                }
            );


            removeImageButton.addEventListener(
                'click',
                function () {

                    gambarInput.value = '';

                    imagePreview.innerHTML = `
                        <span>
                            Preview Gambar
                        </span>
                    `;

                    removeImageButton.style.display =
                        'none';

                }
            );

        }


        /* =====================================================
           EDITOR
        ===================================================== */

        let activeEditor = null;

        const savedRanges =
            new WeakMap();


        function getSelectionRange(
            editor
        ) {

            const selection =
                window.getSelection();

            if (
                !selection ||
                !selection.rangeCount
            ) {
                return null;
            }

            const range =
                selection.getRangeAt(0);

            if (
                !editor.contains(
                    range.commonAncestorContainer
                )
            ) {
                return null;
            }

            return range.cloneRange();

        }


        function saveSelection(
            editor
        ) {

            if (!editor) {
                return;
            }

            const range =
                getSelectionRange(
                    editor
                );

            if (range) {

                savedRanges.set(
                    editor,
                    range
                );

                activeEditor =
                    editor;

            }

        }


        function restoreSelection(
            editor
        ) {

            if (!editor) {
                return false;
            }

            const range =
                savedRanges.get(
                    editor
                );

            if (!range) {
                return false;
            }

            const selection =
                window.getSelection();

            selection.removeAllRanges();

            selection.addRange(
                range.cloneRange()
            );

            activeEditor =
                editor;

            return true;

        }


        function syncEditor(
            editor,
            input
        ) {

            if (
                !editor ||
                !input
            ) {
                return;
            }

            input.value =
                editor.innerHTML.trim();

        }


        function normalizeFontTags(
            editor
        ) {

            if (!editor) {
                return;
            }


            editor
                .querySelectorAll('font')
                .forEach(
                    function (
                        fontElement
                    ) {

                        const span =
                            document.createElement(
                                'span'
                            );


                        const face =
                            fontElement.getAttribute(
                                'face'
                            );

                        const size =
                            fontElement.getAttribute(
                                'size'
                            );

                        const color =
                            fontElement.getAttribute(
                                'color'
                            );


                        if (face) {

                            span.style.fontFamily =
                                face;

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


                            span.style.fontSize =
                                sizeMap[size] ||
                                size + 'px';

                        }


                        if (color) {

                            span.style.color =
                                color;

                        }


                        if (
                            fontElement.style.cssText
                        ) {

                            span.style.cssText +=
                                fontElement.style.cssText;

                        }


                        while (
                            fontElement.firstChild
                        ) {

                            span.appendChild(
                                fontElement.firstChild
                            );

                        }


                        fontElement.replaceWith(
                            span
                        );

                    }
                );

        }


        function runCommand(
            editor,
            command,
            value = null
        ) {

            if (!editor) {
                return;
            }


            editor.focus();


            restoreSelection(
                editor
            );


            document.execCommand(
                command,
                false,
                value
            );


            normalizeFontTags(
                editor
            );


            saveSelection(
                editor
            );

        }


        function activateEditor(
            wrapper,
            content
        ) {

            document
                .querySelectorAll(
                    '.editor-wrapper'
                )
                .forEach(
                    function (
                        other
                    ) {

                        if (
                            other !== wrapper
                        ) {

                            other.classList.remove(
                                'active'
                            );

                        }

                    }
                );


            wrapper.classList.add(
                'active'
            );


            activeEditor =
                content;


            saveSelection(
                content
            );

        }


        /* =====================================================
           SEMUA EDITOR
        ===================================================== */

        document
            .querySelectorAll(
                '.editor-wrapper'
            )
            .forEach(
                function (
                    wrapper
                ) {

                    const content =
                        wrapper.querySelector(
                            '.editor-content'
                        );

                    const toolbar =
                        wrapper.querySelector(
                            '.editor-toolbar'
                        );

                    if (
                        !content ||
                        !toolbar
                    ) {
                        return;
                    }


                    content.addEventListener(
                        'click',
                        function (
                            event
                        ) {

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

                            saveSelection(
                                content
                            );

                        }
                    );


                    content.addEventListener(
                        'mouseup',
                        function () {

                            saveSelection(
                                content
                            );

                        }
                    );


                    content.addEventListener(
                        'input',
                        function () {

                            saveSelection(
                                content
                            );

                        }
                    );


                    toolbar.addEventListener(
                        'click',
                        function (
                            event
                        ) {

                            event.stopPropagation();

                        }
                    );


                    /* =========================
                       BUTTON FORMAT
                    ========================= */

                    toolbar
                        .querySelectorAll(
                            '[data-command]'
                        )
                        .forEach(
                            function (
                                button
                            ) {

                                button.addEventListener(
                                    'mousedown',
                                    function (
                                        event
                                    ) {

                                        event.preventDefault();


                                        activeEditor =
                                            content;


                                        restoreSelection(
                                            content
                                        );


                                        runCommand(
                                            content,
                                            this.dataset.command
                                        );

                                    }
                                );

                            }
                        );



                    /* =========================
                       LINK
                    ========================= */

                    const linkButton =
                        toolbar.querySelector(
                            '.link-command'
                        );


                    if (linkButton) {

                        linkButton.addEventListener(
                            'mousedown',
                            function (
                                event
                            ) {

                                event.preventDefault();


                                activeEditor =
                                    content;


                                saveSelection(
                                    content
                                );


                                restoreSelection(
                                    content
                                );


                                const url =
                                    window.prompt(
                                        'Masukkan alamat link:',
                                        'https://'
                                    );


                                if (
                                    url &&
                                    url !== 'https://'
                                ) {

                                    runCommand(
                                        content,
                                        'createLink',
                                        url
                                    );

                                }

                            }
                        );

                    }


                    normalizeFontTags(
                        content
                    );

                }
            );


        /* =====================================================
           KLIK DI LUAR EDITOR
        ===================================================== */

        document.addEventListener(
            'click',
            function (
                event
            ) {

                if (
                    !event.target.closest(
                        '.editor-wrapper'
                    )
                ) {

                    document
                        .querySelectorAll(
                            '.editor-wrapper'
                        )
                        .forEach(
                            function (
                                wrapper
                            ) {

                                wrapper.classList.remove(
                                    'active'
                                );

                            }
                        );


                    activeEditor =
                        null;

                }

            }
        );


        /* =====================================================
           TOMBOL SELESAI
        ===================================================== */

        document
            .querySelectorAll(
                '[data-editor-done]'
            )
            .forEach(
                function (
                    button
                ) {

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
                                    'input-' +
                                    name
                                );


                            syncEditor(
                                editor,
                                input
                            );


                            const wrapper =
                                editor
                                    ? editor.closest(
                                        '.editor-wrapper'
                                    )
                                    : null;


                            if (wrapper) {

                                wrapper.classList.remove(
                                    'active'
                                );

                            }

                        }
                    );

                }
            );


        /* =====================================================
           TOGGLE
        ===================================================== */

        document
            .querySelectorAll(
                '.toggle input'
            )
            .forEach(
                function (
                    toggle
                ) {

                    toggle.addEventListener(
                        'change',
                        function () {

                            const wrapper =
                                this.closest(
                                    '.toggle-wrapper'
                                );


                            if (!wrapper) {
                                return;
                            }


                            const status =
                                wrapper.querySelector(
                                    '.toggle-status'
                                );


                            if (!status) {
                                return;
                            }


                            status.textContent =
                                this.checked
                                    ? 'ON'
                                    : 'OFF';

                        }
                    );

                }
            );


        /* =====================================================
           SEBELUM SUBMIT
        ===================================================== */

        const layananForm =
            document.getElementById(
                'layananForm'
            );


        if (layananForm) {

            layananForm.addEventListener(
                'submit',
                function () {

                    document
                        .querySelectorAll(
                            '.editor-wrapper[data-editor]'
                        )
                        .forEach(
                            function (
                                wrapper
                            ) {

                                const name =
                                    wrapper.dataset.editor;


                                const editor =
                                    wrapper.querySelector(
                                        '.editor-content'
                                    );


                                const input =
                                    document.getElementById(
                                        'input-' +
                                        name
                                    );


                                if (
                                    editor &&
                                    input
                                ) {

                                    normalizeFontTags(
                                        editor
                                    );


                                    input.value =
                                        editor.innerHTML.trim();

                                }

                            }
                        );

                }
            );

        }

    }
);

</script>

@endsection