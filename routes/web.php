<?php

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
    return redirect()->to('/pengiriman/lihat');
});
Route::get('pengiriman/input', function () {
    return view('pengiriman.baru');
})->name('pengiriman.create');

Route::get('pengiriman/baru', function () {
    return view('pengiriman.baru');
})->name('pengiriman.edit');

Route::get('pengiriman/destroy', function () {
    return view('pengiriman.baru');
})->name('pengiriman.destroy');

Route::post('pengiriman/baruaction', [Pengiriman::class, 'baruaction']);
Route::get('pengiriman/baru', [Pengiriman::class, 'baru']);
Route::get('pengiriman/lihat', [Pengiriman::class, 'lihat'])->name("pengirimen.index");
