<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPageSettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePageSettingController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| DATA LAINNYA
|--------------------------------------------------------------------------
*/

Route::resource('/pelanggan', CustomerController::class)
    ->middleware('auth');

Route::resource('/promosi', PromotionController::class)
    ->middleware('auth');

Route::resource('/hero', HeroController::class)
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| APLIKASI KAMI & OUR SERVICES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | APLIKASI KAMI
    |--------------------------------------------------------------------------
    */

    /*
     * Halaman pilihan aplikasi kami
     */
    Route::get(
        '/produk/menu',
        [ProductController::class, 'menu']
    )->name('produk.menu');


    /*
     * Daftar aplikasi
     */
    Route::get(
        '/produk',
        [ProductController::class, 'index']
    )->name('produk.index');


    /*
     * Form tambah aplikasi
     */
    Route::get(
        '/produk/create',
        [ProductController::class, 'create']
    )->name('produk.create');


    /*
     * Simpan aplikasi baru
     */
    Route::post(
        '/produk',
        [ProductController::class, 'store']
    )->name('produk.store');


    /*
     * Form edit aplikasi
     */
    Route::get(
        '/produk/{produk}/edit',
        [ProductController::class, 'edit']
    )->name('produk.edit');


    /*
     * Simpan perubahan aplikasi
     */
    Route::put(
        '/produk/{produk}',
        [ProductController::class, 'update']
    )->name('produk.update');


    /*
     * Hapus aplikasi
     */
    Route::delete(
        '/produk/{produk}',
        [ProductController::class, 'destroy']
    )->name('produk.destroy');


    /*
     * Pengaturan halaman aplikasi
     */
    Route::get(
        '/produk/page-setting/{bagian}',
        [ProductPageSettingController::class, 'edit']
    )->name('produk.page-setting.edit');


    Route::put(
        '/produk/page-setting/{bagian}',
        [ProductPageSettingController::class, 'update']
    )->name('produk.page-setting.update');


    /*
    |--------------------------------------------------------------------------
    | OUR SERVICES
    |--------------------------------------------------------------------------
    */

    /*
     * Daftar OUR SERVICES
     */
    Route::get(
        '/layanan',
        [ServiceController::class, 'index']
    )->name('service.index');


    /*
     * Form tambah OUR SERVICES
     */
    Route::get(
        '/layanan/create',
        [ServiceController::class, 'create']
    )->name('service.create');


    /*
     * Simpan OUR SERVICES baru
     */
    Route::post(
        '/layanan',
        [ServiceController::class, 'store']
    )->name('service.store');


    /*
     * Pengaturan judul OUR SERVICES
     *
     * HARUS berada sebelum route /layanan/{service}/edit
     */
    Route::get(
        '/layanan/page-setting',
        [ServicePageSettingController::class, 'edit']
    )->name('service.page-setting.edit');


    Route::put(
        '/layanan/page-setting',
        [ServicePageSettingController::class, 'update']
    )->name('service.page-setting.update');


    /*
     * Form edit OUR SERVICES
     */
    Route::get(
        '/layanan/{service}/edit',
        [ServiceController::class, 'edit']
    )->name('service.edit');


    /*
     * Simpan perubahan OUR SERVICES
     */
    Route::put(
        '/layanan/{service}',
        [ServiceController::class, 'update']
    )->name('service.update');


    /*
     * Hapus OUR SERVICES
     */
    Route::delete(
        '/layanan/{service}',
        [ServiceController::class, 'destroy']
    )->name('service.destroy');

});