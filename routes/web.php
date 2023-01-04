<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\InputSiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SpjpController;
use Illuminate\Support\Facades\Auth;
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
    });
});

