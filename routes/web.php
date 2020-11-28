<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Pengiriman;
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
    Route::delete('pengiriman/destroy',[Pengiriman::class,'hapusaction'])->name('pengiriman.destroy');
    Route::post('pengiriman/baru', [Pengiriman::class, 'baruaction']);
    Route::get('pengiriman/baru', [Pengiriman::class, 'baru'])->name('pengiriman.create');
    Route::get('pengiriman/lihat', [Pengiriman::class, 'lihat'])->name("pengirimen.index");
    Route::get('pengiriman/show', [Pengiriman::class, 'show'])->name("pengiriman.show");
});




//akun
Route::middleware([])->group(function () {
    Route::get('akun/login',[Akun::class,'login']);
    Route::post('akun/login',[Akun::class,'loginaction']);
    Route::get('akun/logout',[Akun::class,'logout']);
});
