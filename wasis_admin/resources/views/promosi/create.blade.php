@extends('layouts.admin')

@section('title', 'Masukkan Aplikasi')
@section('page-title', 'Masukkan Aplikasi')

@section('content')

<style>
    .produk-form-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    .produk-form-header {
        margin-bottom: 25px;
    }

    .produk-form-header h2 {
        margin: 0 0 8px;
        font-size: 28px;
        color: #1f2937;
    }

    .produk-form-header p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .produk-form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label.main-label {
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
        background: #ffffff;
        outline: none;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 20px;
    }

    .image-input-wrapper {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 20px;
        background: #fafafa;
    }

    .image-input-wrapper input[type="file"] {
        width: 100%;
        font-size: 14px;
    }

    .image-note {
        margin-top: 8px;
        font-size: 12px;
        color: #6b7280;
    }

    .section-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        margin-bottom: 22px;
        overflow: hidden;
        background: #ffffff;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 20px;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
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
    }

    .section-body {
        padding: 20px;
    }

    .section-title-input {
        margin-bottom: 18px;
    }

    .toggle-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toggle {
        position: relative;
        width: 48px;
        height: 26px;
        flex-shrink: 0;
    }

    .toggle input {
        display: none;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        background: #d1d5db;
        border-radius: 30px;
        cursor: pointer;
        transition: 0.2s;
    }

    .toggle-slider::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 3px;
        top: 3px;
        background: #ffffff;
        border-radius: 50%;
        transition: 0.2s;
        box-shadow: 0 1px 3px rgba(0,0,0,.2);
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
        min-width: 25px;
    }

    .editor-wrapper {
        border: 1px solid #d1d5db;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
    }

    .editor-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 5px;
        padding: 8px;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }

    .editor-toolbar button {
        border: 1px solid #d1d5db;
        background: #ffffff;
        color: #374151;
        border-radius: 6px;
        min-width: 32px;
        height: 32px;
        cursor: pointer;
        font-size: 13px;
    }

    .editor-toolbar button:hover {
        background: #f3f4f6;
    }

    .editor-toolbar select {
        height: 32px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: #ffffff;
        padding: 0 8px;
        color: #374151;
        cursor: pointer;
    }

    .editor-color {
        width: 32px;
        height: 32px;
        padding: 2px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        cursor: pointer;
    }

    .editor-content {
        min-height: 180px;
        padding: 15px;
        outline: none;
        font-size: 14px;
        line-height: 1.7;
        color: #111827;
    }

    .editor-content:focus {
        box-shadow: inset 0 0 0 2px rgba(37, 99, 235, 0.08);
    }

    .editor-content:empty::before {
        content: "Tulis isi di sini...";
        color: #9ca3af;
    }

    .editor-done {
        margin-top: 10px;
        padding: 7px 13px;
        border: 0;
        border-radius: 7px;
        background: #2563eb;
        color: white;
        cursor: pointer;
        font-size: 12px;
    }

    .status-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        margin-top: 25px;
        background: #ffffff;
    }

    .status-card h3 {
        margin: 0 0 5px;
        font-size: 16px;
        color: #111827;
    }

    .status-card p {
        margin: 0 0 15px;
        font-size: 13px;
        color: #6b7280;
    }

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
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

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

    @media (max-width: 700px) {
        .produk-form-card {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .section-header {
            align-items: flex-start;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>


<div class="produk-form-wrapper">

    <div class="produk-form-header">
        <h2>Masukkan Aplikasi</h2>
        <p>Isi seluruh data aplikasi sebelum menyimpan.</p>
    </div>


    @if ($errors->any())
        <div class="error-box">
            <strong>Terdapat kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form
        action="{{ route('produk.store') }}"
        method="POST"
        enctype="multipart/form-data"
        id="produkForm"
    >

        @csrf


        <div class="produk-form-card">

            {{-- NOMOR + NAMA --}}
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
                        Nama Aplikasi
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama aplikasi"
                        required
                    >

                </div>

            </div>


            {{-- GAMBAR --}}
            <div class="form-group">

                <label class="main-label">
                    Gambar Aplikasi
                </label>

                <div class="image-input-wrapper">

                    <input
                        type="file"
                        name="gambar"
                        accept=".jpg,.jpeg,.png,.webp"
                        required
                    >

                    <div class="image-note">
                        Format JPG, JPEG, PNG, atau WEBP.
                        Ukuran gambar harus 1080 × 800 px.
                    </div>

                </div>

            </div>


            {{-- DESKRIPSI --}}
            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>Deskripsi</h3>

                        <p>
                            Atur judul dan isi bagian deskripsi.
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

                    <div class="form-group section-title-input">

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


                        <div class="editor-wrapper">

                            <div class="editor-toolbar">

                                <button
                                    type="button"
                                    onclick="formatText('bold', 'editor-deskripsi')"
                                    title="Bold"
                                >
                                    <b>B</b>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('italic', 'editor-deskripsi')"
                                    title="Italic"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('underline', 'editor-deskripsi')"
                                    title="Underline"
                                >
                                    <u>U</u>
                                </button>


                                <select
                                    onchange="formatFont(this.value, 'editor-deskripsi')"
                                >
                                    <option value="">Font</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Times New Roman">
                                        Times New Roman
                                    </option>
                                </select>


                                <select
                                    onchange="formatSize(this.value, 'editor-deskripsi')"
                                >
                                    <option value="">Ukuran</option>
                                    <option value="1">Kecil</option>
                                    <option value="3">Normal</option>
                                    <option value="5">Besar</option>
                                    <option value="7">Sangat Besar</option>
                                </select>


                                <input
                                    type="color"
                                    class="editor-color"
                                    value="#111827"
                                    onchange="formatColor(this.value, 'editor-deskripsi')"
                                    title="Warna teks"
                                />


                                <button
                                    type="button"
                                    onclick="formatText('justifyLeft', 'editor-deskripsi')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyCenter', 'editor-deskripsi')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyRight', 'editor-deskripsi')"
                                >
                                    ≡
                                </button>


                                <button
                                    type="button"
                                    onclick="formatText('insertUnorderedList', 'editor-deskripsi')"
                                >
                                    • List
                                </button>

                            </div>


                            <div
                                id="editor-deskripsi"
                                class="editor-content"
                                contenteditable="true"
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
                            onclick="syncEditor('editor-deskripsi', 'input-deskripsi')"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- FUNGSI --}}
            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>Fungsi</h3>

                        <p>
                            Atur judul dan isi bagian fungsi.
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

                    <div class="form-group section-title-input">

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


                        <div class="editor-wrapper">

                            <div class="editor-toolbar">

                                <button
                                    type="button"
                                    onclick="formatText('bold', 'editor-fungsi')"
                                >
                                    <b>B</b>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('italic', 'editor-fungsi')"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('underline', 'editor-fungsi')"
                                >
                                    <u>U</u>
                                </button>


                                <select
                                    onchange="formatFont(this.value, 'editor-fungsi')"
                                >
                                    <option value="">Font</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Times New Roman">
                                        Times New Roman
                                    </option>
                                </select>


                                <select
                                    onchange="formatSize(this.value, 'editor-fungsi')"
                                >
                                    <option value="">Ukuran</option>
                                    <option value="1">Kecil</option>
                                    <option value="3">Normal</option>
                                    <option value="5">Besar</option>
                                    <option value="7">Sangat Besar</option>
                                </select>


                                <input
                                    type="color"
                                    class="editor-color"
                                    value="#111827"
                                    onchange="formatColor(this.value, 'editor-fungsi')"
                                    title="Warna teks"
                                />


                                <button
                                    type="button"
                                    onclick="formatText('justifyLeft', 'editor-fungsi')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyCenter', 'editor-fungsi')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyRight', 'editor-fungsi')"
                                >
                                    ≡
                                </button>


                                <button
                                    type="button"
                                    onclick="formatText('insertUnorderedList', 'editor-fungsi')"
                                >
                                    • List
                                </button>

                            </div>


                            <div
                                id="editor-fungsi"
                                class="editor-content"
                                contenteditable="true"
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
                            onclick="syncEditor('editor-fungsi', 'input-fungsi')"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- MANFAAT --}}
            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>Manfaat</h3>

                        <p>
                            Atur judul dan isi bagian manfaat.
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

                    <div class="form-group section-title-input">

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


                        <div class="editor-wrapper">

                            <div class="editor-toolbar">

                                <button
                                    type="button"
                                    onclick="formatText('bold', 'editor-manfaat')"
                                >
                                    <b>B</b>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('italic', 'editor-manfaat')"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('underline', 'editor-manfaat')"
                                >
                                    <u>U</u>
                                </button>


                                <select
                                    onchange="formatFont(this.value, 'editor-manfaat')"
                                >
                                    <option value="">Font</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Times New Roman">
                                        Times New Roman
                                    </option>
                                </select>


                                <select
                                    onchange="formatSize(this.value, 'editor-manfaat')"
                                >
                                    <option value="">Ukuran</option>
                                    <option value="1">Kecil</option>
                                    <option value="3">Normal</option>
                                    <option value="5">Besar</option>
                                    <option value="7">Sangat Besar</option>
                                </select>


                                <input
                                    type="color"
                                    class="editor-color"
                                    value="#111827"
                                    onchange="formatColor(this.value, 'editor-manfaat')"
                                />


                                <button
                                    type="button"
                                    onclick="formatText('justifyLeft', 'editor-manfaat')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyCenter', 'editor-manfaat')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyRight', 'editor-manfaat')"
                                >
                                    ≡
                                </button>


                                <button
                                    type="button"
                                    onclick="formatText('insertUnorderedList', 'editor-manfaat')"
                                >
                                    • List
                                </button>

                            </div>


                            <div
                                id="editor-manfaat"
                                class="editor-content"
                                contenteditable="true"
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
                            onclick="syncEditor('editor-manfaat', 'input-manfaat')"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- DAMPAK --}}
            <div class="section-card">

                <div class="section-header">

                    <div class="section-header-left">

                        <h3>Dampak</h3>

                        <p>
                            Atur judul dan isi bagian dampak.
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

                    <div class="form-group section-title-input">

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


                        <div class="editor-wrapper">

                            <div class="editor-toolbar">

                                <button
                                    type="button"
                                    onclick="formatText('bold', 'editor-dampak')"
                                >
                                    <b>B</b>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('italic', 'editor-dampak')"
                                >
                                    <i>I</i>
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('underline', 'editor-dampak')"
                                >
                                    <u>U</u>
                                </button>


                                <select
                                    onchange="formatFont(this.value, 'editor-dampak')"
                                >
                                    <option value="">Font</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Times New Roman">
                                        Times New Roman
                                    </option>
                                </select>


                                <select
                                    onchange="formatSize(this.value, 'editor-dampak')"
                                >
                                    <option value="">Ukuran</option>
                                    <option value="1">Kecil</option>
                                    <option value="3">Normal</option>
                                    <option value="5">Besar</option>
                                    <option value="7">Sangat Besar</option>
                                </select>


                                <input
                                    type="color"
                                    class="editor-color"
                                    value="#111827"
                                    onchange="formatColor(this.value, 'editor-dampak')"
                                />


                                <button
                                    type="button"
                                    onclick="formatText('justifyLeft', 'editor-dampak')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyCenter', 'editor-dampak')"
                                >
                                    ≡
                                </button>

                                <button
                                    type="button"
                                    onclick="formatText('justifyRight', 'editor-dampak')"
                                >
                                    ≡
                                </button>


                                <button
                                    type="button"
                                    onclick="formatText('insertUnorderedList', 'editor-dampak')"
                                >
                                    • List
                                </button>

                            </div>


                            <div
                                id="editor-dampak"
                                class="editor-content"
                                contenteditable="true"
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
                            onclick="syncEditor('editor-dampak', 'input-dampak')"
                        >
                            Selesai
                        </button>

                    </div>

                </div>

            </div>


            {{-- STATUS --}}
            <div class="status-card">

                <h3>Status Aplikasi</h3>

                <p>
                    Aktifkan jika aplikasi ingin ditampilkan di website.
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


            {{-- BUTTON --}}
            <div class="form-actions">

                <a
                    href="{{ route('produk.menu') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Aplikasi
                </button>

            </div>

        </div>

    </form>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | EDITOR
    |--------------------------------------------------------------------------
    */

    let activeEditor = null;


    function getEditor(id) {

        const editor = document.getElementById(id);

        if (editor) {
            activeEditor = editor;
            editor.focus();
        }

        return editor;
    }


    function formatText(command, editorId) {

        const editor = getEditor(editorId);

        if (!editor) {
            return;
        }

        document.execCommand(command, false, null);

        syncEditor(
            editorId,
            editorId.replace('editor-', 'input-')
        );
    }


    function formatFont(font, editorId) {

        if (!font) {
            return;
        }

        const editor = getEditor(editorId);

        if (!editor) {
            return;
        }

        document.execCommand(
            'fontName',
            false,
            font
        );

        syncEditor(
            editorId,
            editorId.replace('editor-', 'input-')
        );
    }


    function formatSize(size, editorId) {

        if (!size) {
            return;
        }

        const editor = getEditor(editorId);

        if (!editor) {
            return;
        }

        document.execCommand(
            'fontSize',
            false,
            size
        );

        syncEditor(
            editorId,
            editorId.replace('editor-', 'input-')
        );
    }


    function formatColor(color, editorId) {

        const editor = getEditor(editorId);

        if (!editor) {
            return;
        }

        document.execCommand(
            'foreColor',
            false,
            color
        );

        syncEditor(
            editorId,
            editorId.replace('editor-', 'input-')
        );
    }


    function syncEditor(editorId, inputId) {

        const editor = document.getElementById(editorId);
        const input = document.getElementById(inputId);

        if (!editor || !input) {
            return;
        }

        input.value = editor.innerHTML;
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS TEXT
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.toggle input').forEach(function(toggle) {

        toggle.addEventListener('change', function() {

            const status = this
                .closest('.toggle-wrapper')
                .querySelector('.toggle-status');

            if (!status) {
                return;
            }

            status.textContent = this.checked
                ? 'ON'
                : 'OFF';

        });

    });


    /*
    |--------------------------------------------------------------------------
    | SEBELUM SUBMIT
    |--------------------------------------------------------------------------
    */

    document.getElementById('produkForm').addEventListener('submit', function() {

        syncEditor(
            'editor-deskripsi',
            'input-deskripsi'
        );

        syncEditor(
            'editor-fungsi',
            'input-fungsi'
        );

        syncEditor(
            'editor-manfaat',
            'input-manfaat'
        );

        syncEditor(
            'editor-dampak',
            'input-dampak'
        );

    });

</script>

@endsection