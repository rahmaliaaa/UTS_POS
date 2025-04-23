<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route CRUD mobil
Route::group(['prefix' => 'mobil'], function () {
    Route::get('/', [MobilController::class, 'index']); // halaman utama
    Route::post("/list", [MobilController::class, 'list']); // data untuk datatable

    Route::get('/create_ajax', [MobilController::class, 'create_ajax']);
    Route::post('/', [MobilController::class, 'store']);

    // Create AJAX
    Route::post('/store_ajax', [MobilController::class, 'store_ajax']);

    Route::get('/{id}', [MobilController::class, 'show']);
    Route::get('/{id}/edit', [MobilController::class, 'edit']);
    Route::put('/{id}', [MobilController::class, 'update']);

    // Edit AJAX
    Route::get('/{id}/edit_ajax', [MobilController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [MobilController::class, 'update_ajax']);

    // Delete AJAX
    Route::get('/{id}/delete_ajax', [MobilController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [MobilController::class, 'delete_ajax']);

    // Delete biasa
    Route::delete('/{id}', [MobilController::class, 'destroy']);
});


// Route Pelanggan
Route::resource('pelanggan', PelangganController::class);

// Route Transaksi
Route::resource('transaksi', TransaksiController::class);