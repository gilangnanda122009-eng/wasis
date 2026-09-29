<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PILIHAN
    |--------------------------------------------------------------------------
    */

    public function menu()
    {
        return view('produk.menu');
    }


    /*
    |--------------------------------------------------------------------------
    | DAFTAR APLIKASI
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::orderBy('nomor')->get();

        return view('produk.index', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('produk.create');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN APLIKASI BARU
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'nomor' => [
                'required',
                'integer',
                'min:1',
            ],

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            /*
             * Gambar wajib diisi.
             * Tidak ada batas ukuran pixel.
             */
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'fungsi' => [
                'required',
                'string',
            ],

            'manfaat' => [
                'required',
                'string',
            ],

            'dampak' => [
                'required',
                'string',
            ],

            'deskripsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'fungsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'manfaat_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'dampak_judul' => [
                'required',
                'string',
                'max:100',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | PASTIKAN FOLDER GAMBAR ADA
        |--------------------------------------------------------------------------
        */

        $folder = public_path('uploads/products');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        |
        | File disimpan sesuai ukuran aslinya.
        | Tidak crop.
        | Tidak resize.
        | Tidak dipaksa 1920 x 1080.
        |
        */

        $file = $request->file('gambar');

        $namaFile =
            time() .
            '_' .
            Str::slug($request->nama) .
            '_' .
            uniqid() .
            '.' .
            $file->getClientOriginalExtension();

        $file->move(
            $folder,
            $namaFile
        );

        $validated['gambar'] =
            'uploads/products/' . $namaFile;


        /*
        |--------------------------------------------------------------------------
        | STATUS APLIKASI
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | STATUS SETIAP SECTION
        |--------------------------------------------------------------------------
        */

        $validated['deskripsi_active'] =
            $request->has('deskripsi_active');

        $validated['fungsi_active'] =
            $request->has('fungsi_active');

        $validated['manfaat_active'] =
            $request->has('manfaat_active');

        $validated['dampak_active'] =
            $request->has('dampak_active');


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Product::create($validated);


        return redirect()
            ->route('produk.index')
            ->with(
                'success',
                'Aplikasi berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Product $produk)
    {
        return view(
            'produk.edit',
            compact('produk')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Product $produk
    ) {

        $validated = $request->validate([

            'nomor' => [
                'required',
                'integer',
                'min:1',
            ],

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            /*
             * Gambar tidak wajib diganti.
             * Jika diganti, ukuran pixel bebas.
             */
            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'fungsi' => [
                'required',
                'string',
            ],

            'manfaat' => [
                'required',
                'string',
            ],

            'dampak' => [
                'required',
                'string',
            ],

            'deskripsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'fungsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'manfaat_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'dampak_judul' => [
                'required',
                'string',
                'max:100',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | GAMBAR
        |--------------------------------------------------------------------------
        |
        | Prioritas:
        |
        | 1. Jika memilih gambar baru → ganti gambar lama.
        | 2. Jika hapus gambar → hapus gambar lama.
        | 3. Jika tidak melakukan apa-apa → gambar lama tetap.
        |
        */

        if ($request->hasFile('gambar')) {

            /*
             * Hapus gambar lama
             */

            if (
                $produk->gambar &&
                file_exists(
                    public_path($produk->gambar)
                )
            ) {
                unlink(
                    public_path($produk->gambar)
                );
            }


            /*
             * Pastikan folder tersedia
             */

            $folder = public_path('uploads/products');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }


            /*
             * Upload gambar baru
             */

            $file = $request->file('gambar');

            $namaFile =
                time() .
                '_' .
                Str::slug($request->nama) .
                '_' .
                uniqid() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $namaFile
            );


            /*
             * Simpan lokasi gambar baru
             */

            $validated['gambar'] =
                'uploads/products/' . $namaFile;
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        elseif ($request->boolean('hapus_gambar')) {

            if (
                $produk->gambar &&
                file_exists(
                    public_path($produk->gambar)
                )
            ) {
                unlink(
                    public_path($produk->gambar)
                );
            }

            $validated['gambar'] = null;
        }


        /*
        |--------------------------------------------------------------------------
        | GAMBAR TIDAK DIUBAH
        |--------------------------------------------------------------------------
        */

        else {

            $validated['gambar'] =
                $produk->gambar;
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS APLIKASI
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | STATUS SETIAP SECTION
        |--------------------------------------------------------------------------
        */

        $validated['deskripsi_active'] =
            $request->has('deskripsi_active');

        $validated['fungsi_active'] =
            $request->has('fungsi_active');

        $validated['manfaat_active'] =
            $request->has('manfaat_active');

        $validated['dampak_active'] =
            $request->has('dampak_active');


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $produk->update($validated);


        return redirect()
            ->route('produk.index')
            ->with(
                'success',
                'Perubahan aplikasi berhasil disimpan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS APLIKASI
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $produk)
    {
        /*
         * Hapus file gambar
         */

        if (
            $produk->gambar &&
            file_exists(
                public_path($produk->gambar)
            )
        ) {
            unlink(
                public_path($produk->gambar)
            );
        }


        /*
         * Hapus data database
         */

        $produk->delete();


        return redirect()
            ->route('produk.index')
            ->with(
                'success',
                'Aplikasi berhasil dihapus.'
            );
    }
}