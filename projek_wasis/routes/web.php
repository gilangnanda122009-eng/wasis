<?php

use Illuminate\Support\Facades\Route;

use App\Models\Customer;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServicePageSetting;

use App\Http\Controllers\ProductController;

Route::get('/', function () {

    $customers = Customer::where('is_active', true)->get();

    $promotions = Promotion::where('is_active', true)
        ->latest()
        ->get();

    $products = Product::where('is_active', true)
        ->orderBy('nomor')
        ->get();

    $services = Service::where('is_active', true)
        ->orderBy('nomor')
        ->get();

    $servicePageSetting = ServicePageSetting::first();

    return view('home', compact(
        'customers',
        'promotions',
        'products',
        'services',
        'servicePageSetting'
    ));
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/layanan/{service}', function (Service $service) {

    if (!$service->is_active) {
        abort(404);
    }

    $services = Service::where('is_active', true)
        ->orderBy('nomor')
        ->get();

    return view('layanan-detail', compact(
        'service',
        'services'
    ));
})->name('layanan.show');

Route::get('/produk/{product}', [
    ProductController::class,
    'show'
])->name('produk.show');
