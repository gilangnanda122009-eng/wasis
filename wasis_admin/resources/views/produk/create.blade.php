@extends('layouts.admin')

@php
    $isPageSetting = ($mode ?? null) === 'page-setting';
@endphp

@section('title', $isPageSetting ? 'Edit Pengaturan Halaman' : 'Edit Aplikasi')
@section('page-title', $isPageSetting ? 'Edit Pengaturan Halaman' : 'Edit Aplikasi')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | MODE
    |--------------------------------------------------------------------------
    */

    $bagian = $bagian ?? null;

    $setting = $setting ?? null;

    $produk = $produk ?? null;

    /*
    |--------------------------------------------------------------------------
    | PASTIKAN DATA PRODUK TERSEDIA
    |--------------------------------------------------------------------------
    |
    | Saat mode CRUD produk dibuka dari /produk/{produk}/edit, data produk
    | seharusnya dikirim oleh ProductController. Jika variable $produk tidak
    | ikut terbawa, ambil kembali dari parameter route agar halaman edit tidak
    | membaca $produk->id dari null.
    |
    */

    if (!$isPageSetting && !$produk) {

        $routeProduk = request()->route('produk');

        if ($routeProduk instanceof \App\Models\Product) {
            $produk = $routeProduk;
        } elseif (is_numeric($routeProduk)) {
            $produk = \App\Models\Product::findOrFail($routeProduk);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | PAGE SETTING
    |--------------------------------------------------------------------------
    */

    if ($isPageSetting) {

        if ($bagian === 'wasis') {

            $pageField = 'label';
            $pageHtmlField = 'label_html';
            $pageActiveField = 'label_active';

            $pageTitle = 'Edit 1';
            $pageSubtitle = 'WASIS TECHNOLOGY';

            $pageValue = $setting?->label
                ?? 'WASIS TECHNOLOGY';

            $pageHtmlValue = $setting?->label_html
                ?? $pageValue;

            $pageActive = $setting?->label_active ?? true;

        } elseif ($bagian === 'sub') {

            $pageField = 'judul';
            $pageHtmlField = 'judul_html';
            $pageActiveField = 'judul_active';

            $pageTitle = 'Edit 2';
            $pageSubtitle = 'Aplikasi yang Kami Buat';

            $pageValue = $setting?->judul
                ?? 'Aplikasi yang Kami Buat';

            $pageHtmlValue = $setting?->judul_html
                ?? $pageValue;

            $pageActive = $setting?->judul_active ?? true;

        } else {

            $pageField = 'deskripsi';
            $pageHtmlField = 'deskripsi_html';
            $pageActiveField = 'deskripsi_active';

            $pageTitle = 'Edit 3';
            $pageSubtitle = 'Deskripsi';

            $pageValue = $setting?->deskripsi
                ?? 'Berbagai solusi aplikasi dan sistem informasi yang kami kembangkan untuk membantu kebutuhan bisnis, operasional, dan pelayanan.';

            $pageHtmlValue = $setting?->deskripsi_html
                ?? $pageValue;

            $pageActive = $setting?->deskripsi_active ?? true;
        }

    }

@endphp


<style>

/* =========================================================
   GENERAL
========================================================= */

.edit-page {
    width: 100%;
    max-width: 1150px;
    margin: 0 auto;
    padding: 20px 0 50px;
}

.edit-page-header {
    margin-bottom: 25px;
}

.edit-page-header h2 {
    margin: 0;
    font-size: 26px;
    font-weight: 800;
    color: #111827;
}

.edit-page-header p {
    margin: 7px 0 0;
    font-size: 14px;
    color: #6b7280;
}


/* =========================================================
   CARD
========================================================= */

.edit-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
}

.edit-card + .edit-card {
    margin-top: 25px;
}


/* =========================================================
   FORM GROUP
========================================================= */

.form-group {
    margin-bottom: 24px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    display: block;
    margin-bottom: 9px;
    font-size: 14px;
    font-weight: 700;
    color: #1f2937;
}

.form-help {
    margin-top: 6px;
    font-size: 12px;
    color: #6b7280;
}

.form-input,
.form-select {
    width: 100%;
    min-height: 45px;
    padding: 10px 13px;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    background: #ffffff;
    color: #111827;
    font-size: 14px;
    outline: none;
    transition: 0.2s ease;
    box-sizing: border-box;
}

.form-input:focus,
.form-select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
}


/* =========================================================
   PAGE SETTING HEADER
========================================================= */

.setting-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 25px;
}

.setting-number {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #eef4ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 800;
    flex-shrink: 0;
}

.setting-heading-text h3 {
    margin: 0;
    font-size: 20px;
    color: #111827;
}

.setting-heading-text p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}


/* =========================================================
   EDITOR
========================================================= */

.editor-wrapper {
    width: 100%;
    border: 1px solid #d1d5db;
    border-radius: 11px;
    overflow: visible;
    background: #ffffff;
}

.editor-wrapper:focus-within {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
}


/* =========================================================
   TOOLBAR
========================================================= */

.editor-toolbar {
    min-height: 48px;
    padding: 7px 8px;
    border-bottom: 1px solid #e5e7eb;
    background: #f8fafc;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
    border-radius: 11px 11px 0 0;
}

.toolbar-group {
    display: flex;
    align-items: center;
    gap: 4px;
    padding-right: 6px;
    margin-right: 2px;
    border-right: 1px solid #dfe3e8;
}

.toolbar-group:last-child {
    border-right: none;
}

.editor-toolbar button {
    width: 34px;
    height: 32px;
    padding: 0;
    border: 1px solid transparent;
    border-radius: 6px;
    background: transparent;
    color: #374151;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.15s ease;
}

.editor-toolbar button:hover {
    background: #e8eef8;
    border-color: #d6deeb;
    color: #111827;
}

.editor-toolbar button:active {
    background: #dbeafe;
}
.editor-toolbar select:focus {
    border-color: #2563eb;
}

.color-picker-wrapper {
    width: 34px;
    height: 32px;
    border: 1px solid transparent;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.color-picker-wrapper:hover {
    background: #e8eef8;
    border-color: #d6deeb;
}

.color-picker {
    width: 23px;
    height: 23px;
    padding: 0;
    border: none;
    background: transparent;
    cursor: pointer;
}


/* =========================================================
   EDITOR CONTENT
========================================================= */

.editor-content {
    min-height: 180px;
    padding: 16px;
    outline: none;
    background: #ffffff;
    color: #111827;
    font-size: 15px;
    line-height: 1.7;
    word-break: break-word;
    overflow-wrap: anywhere;
    border-radius: 0 0 11px 11px;
}

.editor-content:focus {
    outline: none;
}

.editor-content:empty::before {
    content: 'Tulis isi di sini...';
    color: #9ca3af;
    pointer-events: none;
}

.editor-content p {
    margin: 0 0 10px;
}

.editor-content ul,
.editor-content ol {
    margin-top: 8px;
    margin-bottom: 8px;
    padding-left: 25px;
}

.editor-content a {
    color: #2563eb;
    text-decoration: underline;
}

.editor-content img {
    max-width: 100%;
}


/* =========================================================
   ACTIVE SWITCH
========================================================= */

.active-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-top: 18px;
    padding: 14px 16px;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
}

.active-info strong {
    display: block;
    font-size: 14px;
    color: #111827;
}

.active-info span {
    display: block;
    margin-top: 3px;
    font-size: 12px;
    color: #6b7280;
}

.switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 26px;
    flex-shrink: 0;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    inset: 0;
    cursor: pointer;
    background: #d1d5db;
    border-radius: 30px;
    transition: 0.2s ease;
}

.slider::before {
    content: "";
    position: absolute;
    width: 20px;
    height: 20px;
    left: 3px;
    top: 3px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    transition: 0.2s ease;
}

.switch input:checked + .slider {
    background: #2563eb;
}

.switch input:checked + .slider::before {
    transform: translateX(22px);
}


/* =========================================================
   PRODUCT FORM
========================================================= */

.product-grid {
    display: grid;
    grid-template-columns: 130px 1fr;
    gap: 18px;
}

.image-preview-wrapper {
    margin-top: 10px;
}

.image-preview {
    width: 180px;
    max-width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 9px;
    border: 1px solid #e5e7eb;
    background: #f8fafc;
}

.delete-image-row {
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #4b5563;
}

.delete-image-row input {
    width: 16px;
    height: 16px;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.section-divider {
    margin: 30px 0;
    border: 0;
    border-top: 1px solid #e5e7eb;
}

.section-title {
    margin: 0 0 18px;
    font-size: 17px;
    font-weight: 800;
    color: #111827;
}


/* =========================================================
   BUTTONS
========================================================= */

.form-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid #e5e7eb;
}

.button-left,
.button-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn {
    min-height: 43px;
    padding: 10px 18px;
    border-radius: 9px;
    border: 1px solid transparent;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.2s ease;
}

.btn-secondary {
    background: #ffffff;
    border-color: #d1d5db;
    color: #374151;
}

.btn-secondary:hover {
    background: #f9fafb;
}

.btn-primary {
    background: #2563eb;
    color: #ffffff;
}

.btn-primary:hover {
    background: #1d4ed8;
}

.btn-danger {
    background: #fff1f2;
    border-color: #fecdd3;
    color: #be123c;
}


/* =========================================================
   ERROR
========================================================= */

.alert-error {
    margin-bottom: 20px;
    padding: 14px 16px;
    border-radius: 10px;
    background: #fff1f2;
    border: 1px solid #fecdd3;
    color: #be123c;
    font-size: 13px;
}

.alert-error ul {
    margin: 0;
    padding-left: 20px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 800px) {

    .edit-page {
        padding: 10px 0 35px;
    }

    .edit-card {
        padding: 20px;
    }

    .product-grid {
        grid-template-columns: 1fr;
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

    .editor-toolbar {
        gap: 3px;
    }

    .toolbar-group {
        border-right: none;
        padding-right: 0;
        margin-right: 0;
    }
.setting-heading {
        align-items: flex-start;
    }

}


/* =========================================================
   RICH TEXT IN ADMIN
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

</style>


<div class="edit-page">

    {{-- =====================================================
         ERROR
    ====================================================== --}}

    @if($errors->any())

        <div class="alert-error">

            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>

        </div>

    @endif


    {{-- =====================================================
         PAGE SETTING
    ====================================================== --}}

    @if($isPageSetting)

        <div class="edit-page-header">

            <h2>{{ $pageTitle }}</h2>

            <p>
                Atur isi dan tampilan teks yang akan ditampilkan
                pada halaman customer.
            </p>

        </div>


        <form
            action="{{ route('produk.page-setting.update', $bagian) }}"
            method="POST"
            id="page-setting-form"
        >

            @csrf
            @method('PUT')


            <div class="edit-card">

                <div class="setting-heading">

                    <div class="setting-number">

                        @if($bagian === 'wasis')
                            01
                        @elseif($bagian === 'sub')
                            02
                        @else
                            03
                        @endif

                    </div>

                    <div class="setting-heading-text">

                        <h3>{{ $pageTitle }}</h3>

                        <p>{{ $pageSubtitle }}</p>

                    </div>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Isi teks
                    </label>


                    <div class="editor-wrapper">

                        <div
                            class="editor-toolbar"
                            data-editor-toolbar="page"
                        >

                            {{-- FONT --}}
{{-- TEXT STYLE --}}

                            <div class="toolbar-group">

                                <button
                                    type="button"
                                    data-command="bold"
                                    title="Bold"
                                >
                                    <strong>B</strong>
                                </button>


                                <button
                                    type="button"
                                    data-command="italic"
                                    title="Italic"
                                >
                                    <em>I</em>
                                </button>


                                <button
                                    type="button"
                                    data-command="underline"
                                    title="Underline"
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


                            {{-- COLOR --}}

                            <div class="toolbar-group">

                                <label
                                    class="color-picker-wrapper"
                                    title="Warna teks"
                                >

                                    <input
                                        type="color"
                                        class="color-picker"
                                        value="#111827"
                                        title="Warna teks"
                                    >

                                </label>

                            </div>


                            {{-- ALIGNMENT --}}

                            <div class="toolbar-group">

                                <button
                                    type="button"
                                    data-command="justifyLeft"
                                    title="Rata kiri"
                                >
                                    ☰
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
                                    ≣
                                </button>


                                <button
                                    type="button"
                                    data-command="justifyFull"
                                    title="Rata penuh"
                                >
                                    ☷
                                </button>

                            </div>


                            {{-- LIST --}}

                            <div class="toolbar-group">

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

                            </div>


                            {{-- OTHER --}}

                            <div class="toolbar-group">

                                <button
                                    type="button"
                                    data-action="createLink"
                                    title="Link"
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

                        </div>


                        <div
                            class="editor-content"
                            contenteditable="true"
                            id="page-setting-editor"
                            spellcheck="true"
                        >{!! old($pageHtmlField, $pageHtmlValue) !!}</div>


                        <input
                            type="hidden"
                            name="{{ $pageHtmlField }}"
                            id="page-setting-input"
                            value="{{ old($pageHtmlField, $pageHtmlValue) }}"
                        >

                    </div>


                    <div class="form-help">

                        Pilih teks terlebih dahulu jika ingin mengubah
                        font, ukuran, warna, atau posisi.

                    </div>

                </div>


                {{-- ACTIVE --}}

                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Tampilkan pada customer
                        </strong>

                        <span>
                            Jika dimatikan, bagian ini tidak ditampilkan.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="{{ $pageActiveField }}"
                            value="1"
                            {{ old(
                                $pageActiveField,
                                $pageActive
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                {{-- BUTTON --}}

                <div class="form-actions">

                    <div class="button-left">

                        <a
                            href="{{ route('produk.index') }}"
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


    {{-- =====================================================
         PRODUCT CRUD
    ====================================================== --}}

    @else

        <div class="edit-page-header">

            <h2>Edit Aplikasi</h2>

            <p>
                Ubah informasi aplikasi dan isi deskripsi,
                fungsi, manfaat, serta dampak.
            </p>

        </div>


        <form
            action="{{ route('produk.update', $produk) }}"
            method="POST"
            enctype="multipart/form-data"
            id="product-form"
        >

            @csrf
            @method('PUT')


            <div class="edit-card">


                {{-- =================================================
                     INFORMASI DASAR
                ================================================== --}}

                <h3 class="section-title">
                    Informasi Aplikasi
                </h3>


                <div class="product-grid">


                    <div class="form-group">

                        <label class="form-label">
                            Nomor
                        </label>

                        <input
                            type="number"
                            name="nomor"
                            class="form-input"
                            min="1"
                            value="{{ old('nomor', $produk->nomor) }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Nama Aplikasi
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-input"
                            value="{{ old('nama', $produk->nama) }}"
                            required
                        >

                    </div>

                </div>


                {{-- GAMBAR --}}

                <div class="form-group">

                    <label class="form-label">
                        Gambar Aplikasi
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-input"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-help">
                        Format JPG, JPEG, PNG, atau WEBP.
                        Ukuran gambar harus tepat <strong>1080 x 800 pixel</strong>.
                    </div>


                    @if($produk->gambar)

                        <div class="image-preview-wrapper">

                            <img
                                src="{{ asset($produk->gambar) }}"
                                alt="{{ $produk->nama }}"
                                class="image-preview"
                            >

                        </div>


                        <label class="delete-image-row">

                            <input
                                type="checkbox"
                                name="hapus_gambar"
                                value="1"
                            >

                            Hapus gambar saat menyimpan

                        </label>

                    @endif

                </div>


                <hr class="section-divider">


                {{-- =================================================
                     DESKRIPSI
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Deskripsi
                    </label>


                    <div class="editor-wrapper">

                        <div
                            class="editor-toolbar product-toolbar"
                            data-editor-toolbar="deskripsi"
                        >
<div class="toolbar-group">

                                <button
                                    type="button"
                                    data-command="bold"
                                    title="Bold"
                                >
                                    <strong>B</strong>
                                </button>

                                <button
                                    type="button"
                                    data-command="italic"
                                    title="Italic"
                                >
                                    <em>I</em>
                                </button>

                                <button
                                    type="button"
                                    data-command="underline"
                                    title="Underline"
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


                            <div class="toolbar-group">

                                <label class="color-picker-wrapper">

                                    <input
                                        type="color"
                                        class="color-picker"
                                        value="#111827"
                                    >

                                </label>

                            </div>


                            <div class="toolbar-group">

                                <button
                                    type="button"
                                    data-command="justifyLeft"
                                >
                                    ☰
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
                                    ≣
                                </button>

                                <button
                                    type="button"
                                    data-command="justifyFull"
                                >
                                    ☷
                                </button>

                            </div>


                            <div class="toolbar-group">

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

                            </div>


                            <div class="toolbar-group">

                                <button
                                    type="button"
                                    data-action="createLink"
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

                        </div>


                        <div
                            class="editor-content"
                            contenteditable="true"
                            data-editor-name="deskripsi"
                        >{!! old('deskripsi', $produk->deskripsi) !!}</div>


                        <input
                            type="hidden"
                            name="deskripsi"
                            class="editor-hidden"
                            value="{{ old('deskripsi', $produk->deskripsi) }}"
                        >

                    </div>

                </div>


                {{-- JUDUL DESKRIPSI --}}

                <div class="form-group">

                    <label class="form-label">
                        Judul Deskripsi
                    </label>

                    <input
                        type="text"
                        name="deskripsi_judul"
                        class="form-input"
                        value="{{ old(
                            'deskripsi_judul',
                            $produk->deskripsi_judul ?? 'DESKRIPSI'
                        ) }}"
                        required
                    >

                </div>


                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Tampilkan Deskripsi
                        </strong>

                        <span>
                            Tampilkan bagian deskripsi pada customer.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="deskripsi_active"
                            value="1"
                            {{ old(
                                'deskripsi_active',
                                $produk->deskripsi_active
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <hr class="section-divider">


                {{-- =================================================
                     FUNGSI
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Fungsi
                    </label>


                    <div class="editor-wrapper">

                        <div
                            class="editor-toolbar product-toolbar"
                            data-editor-toolbar="fungsi"
                        >
<div class="toolbar-group">

                                <button type="button" data-command="bold">
                                    <strong>B</strong>
                                </button>

                                <button type="button" data-command="italic">
                                    <em>I</em>
                                </button>

                                <button type="button" data-command="underline">
                                    <u>U</u>
                                </button>

                                <button type="button" data-command="strikeThrough">
                                    <s>S</s>
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <label class="color-picker-wrapper">

                                    <input
                                        type="color"
                                        class="color-picker"
                                        value="#111827"
                                    >

                                </label>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="justifyLeft">
                                    ☰
                                </button>

                                <button type="button" data-command="justifyCenter">
                                    ≡
                                </button>

                                <button type="button" data-command="justifyRight">
                                    ≣
                                </button>

                                <button type="button" data-command="justifyFull">
                                    ☷
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="insertUnorderedList">
                                    •
                                </button>

                                <button type="button" data-command="insertOrderedList">
                                    1.
                                </button>

                                <button type="button" data-command="outdent">
                                    ←
                                </button>

                                <button type="button" data-command="indent">
                                    →
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-action="createLink">
                                    🔗
                                </button>

                                <button type="button" data-command="removeFormat">
                                    Tx
                                </button>

                            </div>

                        </div>


                        <div
                            class="editor-content"
                            contenteditable="true"
                            data-editor-name="fungsi"
                        >{!! old('fungsi', $produk->fungsi) !!}</div>


                        <input
                            type="hidden"
                            name="fungsi"
                            class="editor-hidden"
                            value="{{ old('fungsi', $produk->fungsi) }}"
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Judul Fungsi
                    </label>

                    <input
                        type="text"
                        name="fungsi_judul"
                        class="form-input"
                        value="{{ old(
                            'fungsi_judul',
                            $produk->fungsi_judul ?? 'FUNGSI'
                        ) }}"
                        required
                    >

                </div>


                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Tampilkan Fungsi
                        </strong>

                        <span>
                            Tampilkan bagian fungsi pada customer.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="fungsi_active"
                            value="1"
                            {{ old(
                                'fungsi_active',
                                $produk->fungsi_active
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <hr class="section-divider">


                {{-- =================================================
                     MANFAAT
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Manfaat
                    </label>


                    <div class="editor-wrapper">

                        <div
                            class="editor-toolbar product-toolbar"
                            data-editor-toolbar="manfaat"
                        >
<div class="toolbar-group">

                                <button type="button" data-command="bold">
                                    <strong>B</strong>
                                </button>

                                <button type="button" data-command="italic">
                                    <em>I</em>
                                </button>

                                <button type="button" data-command="underline">
                                    <u>U</u>
                                </button>

                                <button type="button" data-command="strikeThrough">
                                    <s>S</s>
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <label class="color-picker-wrapper">

                                    <input
                                        type="color"
                                        class="color-picker"
                                        value="#111827"
                                    >

                                </label>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="justifyLeft">
                                    ☰
                                </button>

                                <button type="button" data-command="justifyCenter">
                                    ≡
                                </button>

                                <button type="button" data-command="justifyRight">
                                    ≣
                                </button>

                                <button type="button" data-command="justifyFull">
                                    ☷
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="insertUnorderedList">
                                    •
                                </button>

                                <button type="button" data-command="insertOrderedList">
                                    1.
                                </button>

                                <button type="button" data-command="outdent">
                                    ←
                                </button>

                                <button type="button" data-command="indent">
                                    →
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-action="createLink">
                                    🔗
                                </button>

                                <button type="button" data-command="removeFormat">
                                    Tx
                                </button>

                            </div>

                        </div>


                        <div
                            class="editor-content"
                            contenteditable="true"
                            data-editor-name="manfaat"
                        >{!! old('manfaat', $produk->manfaat) !!}</div>


                        <input
                            type="hidden"
                            name="manfaat"
                            class="editor-hidden"
                            value="{{ old('manfaat', $produk->manfaat) }}"
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Judul Manfaat
                    </label>

                    <input
                        type="text"
                        name="manfaat_judul"
                        class="form-input"
                        value="{{ old(
                            'manfaat_judul',
                            $produk->manfaat_judul ?? 'MANFAAT'
                        ) }}"
                        required
                    >

                </div>


                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Tampilkan Manfaat
                        </strong>

                        <span>
                            Tampilkan bagian manfaat pada customer.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="manfaat_active"
                            value="1"
                            {{ old(
                                'manfaat_active',
                                $produk->manfaat_active
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <hr class="section-divider">


                {{-- =================================================
                     DAMPAK
                ================================================== --}}

                <div class="form-group">

                    <label class="form-label">
                        Dampak
                    </label>


                    <div class="editor-wrapper">

                        <div
                            class="editor-toolbar product-toolbar"
                            data-editor-toolbar="dampak"
                        >
<div class="toolbar-group">

                                <button type="button" data-command="bold">
                                    <strong>B</strong>
                                </button>

                                <button type="button" data-command="italic">
                                    <em>I</em>
                                </button>

                                <button type="button" data-command="underline">
                                    <u>U</u>
                                </button>

                                <button type="button" data-command="strikeThrough">
                                    <s>S</s>
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <label class="color-picker-wrapper">

                                    <input
                                        type="color"
                                        class="color-picker"
                                        value="#111827"
                                    >

                                </label>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="justifyLeft">
                                    ☰
                                </button>

                                <button type="button" data-command="justifyCenter">
                                    ≡
                                </button>

                                <button type="button" data-command="justifyRight">
                                    ≣
                                </button>

                                <button type="button" data-command="justifyFull">
                                    ☷
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-command="insertUnorderedList">
                                    •
                                </button>

                                <button type="button" data-command="insertOrderedList">
                                    1.
                                </button>

                                <button type="button" data-command="outdent">
                                    ←
                                </button>

                                <button type="button" data-command="indent">
                                    →
                                </button>

                            </div>


                            <div class="toolbar-group">

                                <button type="button" data-action="createLink">
                                    🔗
                                </button>

                                <button type="button" data-command="removeFormat">
                                    Tx
                                </button>

                            </div>

                        </div>


                        <div
                            class="editor-content"
                            contenteditable="true"
                            data-editor-name="dampak"
                        >{!! old('dampak', $produk->dampak) !!}</div>


                        <input
                            type="hidden"
                            name="dampak"
                            class="editor-hidden"
                            value="{{ old('dampak', $produk->dampak) }}"
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Judul Dampak
                    </label>

                    <input
                        type="text"
                        name="dampak_judul"
                        class="form-input"
                        value="{{ old(
                            'dampak_judul',
                            $produk->dampak_judul ?? 'DAMPAK'
                        ) }}"
                        required
                    >

                </div>


                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Tampilkan Dampak
                        </strong>

                        <span>
                            Tampilkan bagian dampak pada customer.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="dampak_active"
                            value="1"
                            {{ old(
                                'dampak_active',
                                $produk->dampak_active
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                {{-- =================================================
                     STATUS APLIKASI
                ================================================== --}}

                <hr class="section-divider">


                <div class="active-row">

                    <div class="active-info">

                        <strong>
                            Status Aplikasi
                        </strong>

                        <span>
                            Jika aktif, aplikasi dapat ditampilkan
                            pada halaman customer.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old(
                                'is_active',
                                $produk->is_active
                            ) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                {{-- =================================================
                     BUTTON
                ================================================== --}}

                <div class="form-actions">

                    <div class="button-left">

                        <a
                            href="{{ route('produk.index') }}"
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

    @endif

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | GLOBAL EDITOR STATE
    |--------------------------------------------------------------------------
    */

    let savedRange = null;


    /*
    |--------------------------------------------------------------------------
    | SAVE SELECTION
    |--------------------------------------------------------------------------
    */

    function saveSelection(editor) {

        const selection = window.getSelection();

        if (!selection || selection.rangeCount === 0) {
            return;
        }

        const range = selection.getRangeAt(0);

        if (
            editor.contains(range.commonAncestorContainer)
        ) {
            savedRange = range.cloneRange();
        }

    }


    /*
    |--------------------------------------------------------------------------
    | RESTORE SELECTION
    |--------------------------------------------------------------------------
    */

    function restoreSelection(editor) {

        if (!savedRange) {
            return;
        }

        const selection = window.getSelection();

        selection.removeAllRanges();

        try {

            selection.addRange(savedRange);

        } catch (error) {

            // Abaikan jika selection sudah tidak valid.

        }

    }


    /*
    |--------------------------------------------------------------------------
    | GET EDITOR
    |--------------------------------------------------------------------------
    */

    function getEditorFromToolbar(toolbar) {

        const wrapper = toolbar.closest('.editor-wrapper');

        if (!wrapper) {
            return null;
        }

        return wrapper.querySelector('.editor-content');

    }


    /*
    |--------------------------------------------------------------------------
    | INLINE STYLE
    |--------------------------------------------------------------------------
    */

    function applyInlineStyle(
        editor,
        styleName,
        styleValue
    ) {

        restoreSelection(editor);

        const selection = window.getSelection();

        if (!selection || selection.rangeCount === 0) {
            return;
        }

        const range = selection.getRangeAt(0);

        if (!editor.contains(range.commonAncestorContainer)) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | ADA TEXT YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        if (!range.collapsed) {

            const span = document.createElement('span');

            span.style[styleName] = styleValue;


            try {

                const fragment =
                    range.extractContents();

                span.appendChild(fragment);

                range.insertNode(span);


                const newRange =
                    document.createRange();

                newRange.selectNodeContents(span);

                selection.removeAllRanges();

                selection.addRange(newRange);

                savedRange =
                    newRange.cloneRange();

            } catch (error) {

                console.error(
                    'Gagal menerapkan style:',
                    error
                );

            }

        } else {

            /*
            |--------------------------------------------------------------------------
            | TIDAK ADA TEXT YANG DIPILIH
            |--------------------------------------------------------------------------
            */

            const span =
                document.createElement('span');

            span.style[styleName] =
                styleValue;

            span.appendChild(
                document.createTextNode('\u200B')
            );

            range.insertNode(span);

            const newRange =
                document.createRange();

            newRange.setStart(
                span.firstChild,
                1
            );

            newRange.collapse(true);

            selection.removeAllRanges();

            selection.addRange(newRange);

            savedRange =
                newRange.cloneRange();

        }


        editor.focus();

        syncEditor(editor);

    }


    /*
    |--------------------------------------------------------------------------
    | COMMAND
    |--------------------------------------------------------------------------
    */

    function runCommand(
        editor,
        command,
        value = null
    ) {

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
                'Command error:',
                command,
                error
            );

        }


        saveSelection(editor);

        syncEditor(editor);

    }


    /*
    |--------------------------------------------------------------------------
    | LINK
    |--------------------------------------------------------------------------
    */

    function createLink(editor) {

        restoreSelection(editor);

        const url = window.prompt(
            'Masukkan URL:',
            'https://'
        );

        if (!url) {
            return;
        }

        editor.focus();

        document.execCommand(
            'createLink',
            false,
            url
        );

        saveSelection(editor);

        syncEditor(editor);

    }


    /*
    |--------------------------------------------------------------------------
    | SYNC EDITOR
    |--------------------------------------------------------------------------
    */

    function syncEditor(editor) {

        if (!editor) {
            return;
        }

        const wrapper =
            editor.closest('.editor-wrapper');

        if (!wrapper) {
            return;
        }


        const hidden =
            wrapper.querySelector('.editor-hidden');

        if (hidden) {

            hidden.value =
                editor.innerHTML.trim();

        }


        /*
        |--------------------------------------------------------------------------
        | PAGE SETTING
        |--------------------------------------------------------------------------
        */

        if (
            editor.id ===
            'page-setting-editor'
        ) {

            const pageInput =
                document.getElementById(
                    'page-setting-input'
                );

            if (pageInput) {

                pageInput.value =
                    editor.innerHTML.trim();

            }

        }

    }


    /*
    |--------------------------------------------------------------------------
    | SETUP EDITOR
    |--------------------------------------------------------------------------
    */

    function setupEditor(editor) {

        if (!editor) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | SELECTION
        |--------------------------------------------------------------------------
        */

        editor.addEventListener(
            'mouseup',
            function () {

                saveSelection(editor);

            }
        );


        editor.addEventListener(
            'keyup',
            function () {

                saveSelection(editor);
                syncEditor(editor);

            }
        );


        editor.addEventListener(
            'input',
            function () {

                saveSelection(editor);
                syncEditor(editor);

            }
        );


        editor.addEventListener(
            'focus',
            function () {

                saveSelection(editor);

            }
        );


        /*
        |--------------------------------------------------------------------------
        | PASTE
        |--------------------------------------------------------------------------
        */

        editor.addEventListener(
            'paste',
            function () {

                setTimeout(
                    function () {

                        syncEditor(editor);

                    },
                    50
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | SETUP ALL EDITORS
    |--------------------------------------------------------------------------
    */

    const editors =
        document.querySelectorAll(
            '.editor-content'
        );


    editors.forEach(
        function (editor) {

            setupEditor(editor);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | TOOLBAR
    |--------------------------------------------------------------------------
    */

    const toolbars =
        document.querySelectorAll(
            '.editor-toolbar'
        );


    toolbars.forEach(
        function (toolbar) {

            const editor =
                getEditorFromToolbar(toolbar);


            if (!editor) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | SAVE SELECTION SAAT MOUSE MASUK TOOLBAR
            |--------------------------------------------------------------------------
            */

            toolbar.addEventListener(
                'mousedown',
                function (event) {

                    const target =
                        event.target.closest(
                            'button, select, input'
                        );


                    if (!target) {
                        return;
                    }


                    saveSelection(editor);


                    /*
                    | Button harus prevent default
                    | supaya selection editor tidak hilang.
                    */

                    if (
                        target.tagName ===
                        'BUTTON'
                    ) {

                        event.preventDefault();

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | BUTTON
            |--------------------------------------------------------------------------
            */

            toolbar
                .querySelectorAll(
                    'button[data-command]'
                )
                .forEach(
                    function (button) {

                        button.addEventListener(
                            'click',
                            function () {

                                const command =
                                    this.dataset.command;

                                runCommand(
                                    editor,
                                    command
                                );

                            }
                        );

                    }
                );


            /*
            |--------------------------------------------------------------------------
            | LINK
            |--------------------------------------------------------------------------
            */

            toolbar
                .querySelectorAll(
                    'button[data-action="createLink"]'
                )
                .forEach(
                    function (button) {

                        button.addEventListener(
                            'click',
                            function () {

                                createLink(
                                    editor
                                );

                            }
                        );

                    }
                );



            /*
            |--------------------------------------------------------------------------
            | COLOR
            |--------------------------------------------------------------------------
            */

            toolbar
                .querySelectorAll(
                    '.color-picker'
                )
                .forEach(
                    function (colorInput) {

                        colorInput.addEventListener(
                            'change',
                            function () {

                                applyInlineStyle(
                                    editor,
                                    'color',
                                    this.value
                                );

                            }
                        );

                    }
                );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | PAGE SETTING FORM
    |--------------------------------------------------------------------------
    */

    const pageForm =
        document.getElementById(
            'page-setting-form'
        );


    if (pageForm) {

        pageForm.addEventListener(
            'submit',
            function () {

                const editor =
                    document.getElementById(
                        'page-setting-editor'
                    );


                const input =
                    document.getElementById(
                        'page-setting-input'
                    );


                if (
                    editor &&
                    input
                ) {

                    input.value =
                        editor.innerHTML.trim();

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | PRODUCT FORM
    |--------------------------------------------------------------------------
    */

    const productForm =
        document.getElementById(
            'product-form'
        );


    if (productForm) {

        productForm.addEventListener(
            'submit',
            function () {

                document
                    .querySelectorAll(
                        '.editor-content'
                    )
                    .forEach(
                        function (editor) {

                            syncEditor(editor);

                        }
                    );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL SYNC
    |--------------------------------------------------------------------------
    */

    editors.forEach(
        function (editor) {

            syncEditor(editor);

        }
    );

});

</script>

@endsection