<?php

namespace App\Http\Controllers;

use App\Models\ServicePageSetting;
use Illuminate\Http\Request;

class ServicePageSettingController extends Controller
{
    /**
     * Menampilkan halaman pengaturan judul OUR SERVICES.
     */
    public function edit()
    {
        $setting = ServicePageSetting::first();

        // Jika data belum ada, buat otomatis.
        if (!$setting) {
            $setting = ServicePageSetting::create([
                'judul' => 'OUR SERVICES',
            ]);
        }

        return view('layanan.page-setting', compact('setting'));
    }

    /**
     * Menyimpan perubahan judul OUR SERVICES.
     */
    public function update(Request $request)
    {
        $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],
        ], [
            'judul.required' => 'Judul OUR SERVICES wajib diisi.',
            'judul.string'   => 'Judul harus berupa teks.',
            'judul.max'      => 'Judul maksimal 255 karakter.',
        ]);

        $setting = ServicePageSetting::first();

        if (!$setting) {
            $setting = new ServicePageSetting();
        }

        $setting->judul = $request->judul;
        $setting->save();

        return redirect()
            ->route('service.page-setting.edit')
            ->with('success', 'Judul OUR SERVICES berhasil diperbarui.');
    }
}