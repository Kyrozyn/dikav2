<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\Kendaraan;
use App\Http\Controllers\Pengiriman;
use App\Http\Controllers\Rekomendasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/akun/login');
});

//akun
Route::middleware(['cekLogin'])->group(function () {
    Route::get('pengiriman/edit', [Pengiriman::class, 'edit'])->name('pengiriman.edit');
    Route::post('pengiriman/edit', [Pengiriman::class, 'editaction'])->name('pengiriman.editaction');
    Route::delete('pengiriman/destroy', [Pengiriman::class, 'hapusaction'])->name('pengiriman.destroy');
    Route::post('pengiriman/baru', [Pengiriman::class, 'baruaction']);
    Route::get('pengiriman/baru', [Pengiriman::class, 'baru'])->name('pengiriman.create');
    Route::get('pengiriman/lihat', [Pengiriman::class, 'lihat'])->name("pengirimen.index");
    Route::get('pengiriman/lihatv2', [Pengiriman::class, 'lihatv2'])->name("pengirimen.index");
    Route::get('pengiriman/lihatv2pending', [Pengiriman::class, 'lihatv2pending'])->name("pengirimen.index");
    Route::get('pengiriman/show', [Pengiriman::class, 'show'])->name("pengiriman.show");
});

//kendaraan
Route::middleware(['cekLogin'])->group(function () {
    Route::get('kendaraan/lihat', [Kendaraan::class, 'lihat'])->name("kendaraans.index");
    Route::get('kendaraan/baru', [Kendaraan::class, 'baru'])->name('kendaraans.create');
    Route::post('kendaraan/baru', [Kendaraan::class, 'baruaction']);
    Route::get('kendaraan/edit', [Kendaraan::class, 'edit'])->name('kendaraans.edit');
    Route::post('kendaraan/edit', [Kendaraan::class, 'editaction'])->name('kendaraans.editaction');
    Route::delete('kendaraan/destroy', [Kendaraan::class, 'hapusaction'])->name('kendaraan.destroy');
});

//rekomendasi
Route::middleware(['cekLogin'])->group(function () {
    Route::get('rekomendasi', [Rekomendasi::class, 'rekomendasiawal'])->name('rekomendasi');
//    Route::get('rekomendasi/kendaraan/{kendaraan}', [Rekomendasi::class, 'rekomendasipilih'])->name('hitung');
    Route::get('rekomendasi/kendaraan/{kendaraan}/invoice/{opsi}', [Rekomendasi::class, 'invoice'])->name('rekomendasi.invoice');
    Route::post('rekomendasi/kendaraan/{kendaraan}/invoice/{opsi}', [Rekomendasi::class, 'buatinvoicebaru'])->name('rekomendasi.post');
});

//akun
Route::middleware([])->group(function () {
    Route::get('akun/login', [Akun::class, 'login']);
    Route::post('akun/login', [Akun::class, 'loginaction']);
    Route::get('akun/logout', [Akun::class, 'logout']);
    Route::get('akun/baru', [Akun::class, 'baru']);
    Route::post('akun/baru', [Akun::class, 'baruaction']);
    Route::get('akun/lihat', [Akun::class, 'lihat']);
    Route::get('akun/edit', [Akun::class, 'edit']);
    Route::post('akun/edit', [Akun::class, 'editaction']);
    Route::delete('akun/destroy', [Akun::class, 'hapusaction'])->name('akun.destroy');

});

//invoice
Route::middleware(['cekLogin'])->group(function () {
    Route::get('invoice', [Invoice::class, 'lihat'])->name('lihatinvoice');
    Route::get('invoice/verifikasi', [Invoice::class, 'verifikasi'])->name('lihatinvoice');
    Route::get('invoice/{idinvoice}', [Invoice::class, 'detailinvoice'])->name('lihatinvoice');
    Route::get('invoice/terima/{idinvoice}', [Invoice::class, 'terimainvoice'])->name('lihatinvoice');
    Route::get('invoice/tolak/{idinvoice}', [Invoice::class, 'tolakinvoice'])->name('lihatinvoice');
});

Route::get('rek', [Rekomendasi::class, 'rek']);
Route::get('rekomendasi/kendaraan/{kendaraan}/{opsi}', [Rekomendasi::class, 'rekomendasiv2']);
Route::get('laporaninvoice/{id}', [Invoice::class, 'laporaninvoice']);
Route::get('laporanresi/{id}', [Pengiriman::class, 'cetakresi']);

Route::get('dashboard',[\App\Http\Controllers\Dashboard::class,'index']);
Route::get('laporanpengiriman',[\App\Http\Controllers\Pengiriman::class,'laporankirim']);
Route::post('laporanpengiriman',[\App\Http\Controllers\Pengiriman::class,'laporan'])->name('laporankirimpost');
