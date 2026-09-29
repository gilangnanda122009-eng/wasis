<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPageSetting;

class ProductController extends Controller
{
    /**
     * Menampilkan detail aplikasi pada website customer.
     *
     * Data produk diambil langsung dari tabel products yang sama
     * dengan data yang dikelola oleh CRUD Aplikasi di Admin.
     */
    public function show(Product $product)
    {
        // Jangan tampilkan aplikasi yang dinonaktifkan.
        if (!$product->is_active) {
            abort(404);
        }

        // Daftar aplikasi aktif untuk bagian "PILIH APLIKASI".
        $products = Product::where('is_active', true)
            ->orderBy('nomor')
            ->get();

        // Pengaturan halaman Aplikasi Kami.
        $pageSetting = ProductPageSetting::first();

        return view('produk', compact(
            'product',
            'products',
            'pageSetting'
        ));
    }
}
