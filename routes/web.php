<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SatuanController;
use App\Http\Livewire\Kategori\MainIndex;
use App\Http\Livewire\MasterData\SupplierMainIndex;
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

Route::get('/', [MainController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix('backend')->name('backend.')->group(function () {
        Route::get('/', [MainController::class, 'main'])->name('main');

        Route::resource('jenis', JenisController::class);
        Route::resource('satuan', SatuanController::class);
        Route::resource('barang', BarangController::class);
        
        Route::get('/supplier', SupplierMainIndex::class)->name('supplier');
    });
});

