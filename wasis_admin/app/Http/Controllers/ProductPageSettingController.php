<?php

namespace App\Http\Controllers;

use App\Models\ProductPageSetting;
use Illuminate\Http\Request;

class ProductPageSettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AMBIL SETTING
    |--------------------------------------------------------------------------
    */

    private function getSetting()
    {
        $setting = ProductPageSetting::first();

        if (!$setting) {

            $setting = ProductPageSetting::create([

                'label' => 'WASIS TECHNOLOGY',

                'label_html' => 'WASIS TECHNOLOGY',

                'label_active' => true,


                'judul' => 'Aplikasi yang Kami Buat',

                'judul_html' => 'Aplikasi yang Kami Buat',

                'judul_active' => true,


                'deskripsi' =>
                    'Berbagai solusi aplikasi dan sistem informasi yang kami kembangkan untuk membantu kebutuhan bisnis, operasional, dan pelayanan.',

                'deskripsi_html' =>
                    'Berbagai solusi aplikasi dan sistem informasi yang kami kembangkan untuk membantu kebutuhan bisnis, operasional, dan pelayanan.',

                'deskripsi_active' => true,

            ]);
        }

        return $setting;
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(string $bagian)
    {
        if (!in_array($bagian, [
            'wasis',
            'sub',
            'ket'
        ])) {
            abort(404);
        }


        $setting = $this->getSetting();


        return view('produk.edit', [

            'produk' => null,

            'setting' => $setting,

            'bagian' => $bagian,

            'mode' => 'page-setting',

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PERUBAHAN
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        string $bagian
    ) {

        if (!in_array($bagian, [
            'wasis',
            'sub',
            'ket'
        ])) {
            abort(404);
        }


        $setting = $this->getSetting();


        /*
        |--------------------------------------------------------------------------
        | EDIT 1
        |--------------------------------------------------------------------------
        */

        if ($bagian === 'wasis') {

            $html = $request->input(
                'label_html',
                ''
            );


            $plainText = trim(
                strip_tags($html)
            );


            if ($plainText === '') {

                return back()
                    ->withErrors([
                        'label_html' =>
                            'Isi Edit 1 tidak boleh kosong.'
                    ])
                    ->withInput();

            }


            $setting->update([

                'label' => mb_substr(
                    $plainText,
                    0,
                    255
                ),

                'label_html' => $html,

                'label_active' =>
                    $request->boolean(
                        'label_active'
                    ),

            ]);


            return redirect()
                ->route('produk.index')
                ->with(
                    'success',
                    'Edit 1 berhasil disimpan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | EDIT 2
        |--------------------------------------------------------------------------
        */

        if ($bagian === 'sub') {

            $html = $request->input(
                'judul_html',
                ''
            );


            $plainText = trim(
                strip_tags($html)
            );


            if ($plainText === '') {

                return back()
                    ->withErrors([
                        'judul_html' =>
                            'Isi Edit 2 tidak boleh kosong.'
                    ])
                    ->withInput();

            }


            $setting->update([

                'judul' => mb_substr(
                    $plainText,
                    0,
                    255
                ),

                'judul_html' => $html,

                'judul_active' =>
                    $request->boolean(
                        'judul_active'
                    ),

            ]);


            return redirect()
                ->route('produk.index')
                ->with(
                    'success',
                    'Edit 2 berhasil disimpan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | EDIT 3
        |--------------------------------------------------------------------------
        */

        if ($bagian === 'ket') {

            $html = $request->input(
                'deskripsi_html',
                ''
            );


            $plainText = trim(
                strip_tags($html)
            );


            if ($plainText === '') {

                return back()
                    ->withErrors([
                        'deskripsi_html' =>
                            'Isi Edit 3 tidak boleh kosong.'
                    ])
                    ->withInput();

            }


            $setting->update([

                'deskripsi' => mb_substr(
                    $plainText,
                    0,
                    255
                ),

                'deskripsi_html' => $html,

                'deskripsi_active' =>
                    $request->boolean(
                        'deskripsi_active'
                    ),

            ]);


            return redirect()
                ->route('produk.index')
                ->with(
                    'success',
                    'Edit 3 berhasil disimpan.'
                );
        }


        abort(404);
    }
}