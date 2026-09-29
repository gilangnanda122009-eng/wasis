<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR OUR SERVICES
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $services = Service::orderBy('nomor')->get();

        return view(
            'layanan.index',
            compact('services')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('layanan.create');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN OUR SERVICES BARU
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | DATA UTAMA
            |--------------------------------------------------------------------------
            */

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
            |--------------------------------------------------------------------------
            | GAMBAR
            |--------------------------------------------------------------------------
            | Wajib tepat 1080 x 800 pixel.
            */

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'dimensions:width=1080,height=800',
            ],


            /*
            |--------------------------------------------------------------------------
            | DESKRIPSI
            |--------------------------------------------------------------------------
            */

            'deskripsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | FUNGSI
            |--------------------------------------------------------------------------
            */

            'fungsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'fungsi' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | MANFAAT
            |--------------------------------------------------------------------------
            */

            'manfaat_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'manfaat' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | DAMPAK
            |--------------------------------------------------------------------------
            */

            'dampak_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'dampak' => [
                'required',
                'string',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | FOLDER GAMBAR
        |--------------------------------------------------------------------------
        */

        $folder =
            public_path(
                'uploads/services'
            );


        if (!is_dir($folder)) {

            mkdir(
                $folder,
                0755,
                true
            );

        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $file =
            $request->file('gambar');


        $namaFile =
            time() .
            '_' .
            Str::slug(
                $request->nama
            ) .
            '_' .
            uniqid() .
            '.' .
            $file->getClientOriginalExtension();


        $file->move(
            $folder,
            $namaFile
        );


        /*
        |--------------------------------------------------------------------------
        | PATH GAMBAR
        |--------------------------------------------------------------------------
        */

        $validated['gambar'] =
            'uploads/services/' .
            $namaFile;


        /*
        |--------------------------------------------------------------------------
        | STATUS SECTION
        |--------------------------------------------------------------------------
        */

        $validated['deskripsi_active'] =
            $request->has(
                'deskripsi_active'
            );


        $validated['fungsi_active'] =
            $request->has(
                'fungsi_active'
            );


        $validated['manfaat_active'] =
            $request->has(
                'manfaat_active'
            );


        $validated['dampak_active'] =
            $request->has(
                'dampak_active'
            );


        /*
        |--------------------------------------------------------------------------
        | STATUS OUR SERVICES
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has(
                'is_active'
            );


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        Service::create(
            $validated
        );


        return redirect()
            ->route('service.index')
            ->with(
                'success',
                'Layanan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Service $service)
    {
        return view(
            'layanan.edit',
            [
                'layanan' => $service,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Service $service
    ) {

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | DATA UTAMA
            |--------------------------------------------------------------------------
            */

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
            |--------------------------------------------------------------------------
            | GAMBAR
            |--------------------------------------------------------------------------
            | Jika gambar diganti, harus tepat 1080 x 800 pixel.
            */

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'dimensions:width=1080,height=800',
            ],


            /*
            |--------------------------------------------------------------------------
            | DESKRIPSI
            |--------------------------------------------------------------------------
            */

            'deskripsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | FUNGSI
            |--------------------------------------------------------------------------
            */

            'fungsi_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'fungsi' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | MANFAAT
            |--------------------------------------------------------------------------
            */

            'manfaat_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'manfaat' => [
                'required',
                'string',
            ],


            /*
            |--------------------------------------------------------------------------
            | DAMPAK
            |--------------------------------------------------------------------------
            */

            'dampak_judul' => [
                'required',
                'string',
                'max:100',
            ],

            'dampak' => [
                'required',
                'string',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if (
            $request->hasFile(
                'gambar'
            )
        ) {

            /*
            |----------------------------------------------------------------------
            | HAPUS GAMBAR LAMA
            |----------------------------------------------------------------------
            */

            if (
                $service->gambar &&
                file_exists(
                    public_path(
                        $service->gambar
                    )
                )
            ) {

                unlink(
                    public_path(
                        $service->gambar
                    )
                );

            }


            /*
            |----------------------------------------------------------------------
            | FOLDER
            |----------------------------------------------------------------------
            */

            $folder =
                public_path(
                    'uploads/services'
                );


            if (!is_dir($folder)) {

                mkdir(
                    $folder,
                    0755,
                    true
                );

            }


            /*
            |----------------------------------------------------------------------
            | UPLOAD
            |----------------------------------------------------------------------
            */

            $file =
                $request->file(
                    'gambar'
                );


            $namaFile =
                time() .
                '_' .
                Str::slug(
                    $request->nama
                ) .
                '_' .
                uniqid() .
                '.' .
                $file->getClientOriginalExtension();


            $file->move(
                $folder,
                $namaFile
            );


            /*
            |----------------------------------------------------------------------
            | SIMPAN PATH
            |----------------------------------------------------------------------
            */

            $validated['gambar'] =
                'uploads/services/' .
                $namaFile;

        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        elseif (
            $request->boolean(
                'hapus_gambar'
            )
        ) {

            if (
                $service->gambar &&
                file_exists(
                    public_path(
                        $service->gambar
                    )
                )
            ) {

                unlink(
                    public_path(
                        $service->gambar
                    )
                );

            }


            $validated['gambar'] =
                null;

        }


        /*
        |--------------------------------------------------------------------------
        | GAMBAR TIDAK DIUBAH
        |--------------------------------------------------------------------------
        */

        else {

            $validated['gambar'] =
                $service->gambar;

        }


        /*
        |--------------------------------------------------------------------------
        | STATUS SECTION
        |--------------------------------------------------------------------------
        */

        $validated['deskripsi_active'] =
            $request->has(
                'deskripsi_active'
            );


        $validated['fungsi_active'] =
            $request->has(
                'fungsi_active'
            );


        $validated['manfaat_active'] =
            $request->has(
                'manfaat_active'
            );


        $validated['dampak_active'] =
            $request->has(
                'dampak_active'
            );


        /*
        |--------------------------------------------------------------------------
        | STATUS OUR SERVICES
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has(
                'is_active'
            );


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $service->update(
            $validated
        );


        return redirect()
            ->route('service.index')
            ->with(
                'success',
                'Perubahan layanan berhasil disimpan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */

    public function destroy(Service $service)
    {
        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if (
            $service->gambar &&
            file_exists(
                public_path(
                    $service->gambar
                )
            )
        ) {

            unlink(
                public_path(
                    $service->gambar
                )
            );

        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $service->delete();


        return redirect()
            ->route('service.index')
            ->with(
                'success',
                'Layanan berhasil dihapus.'
            );
    }
}