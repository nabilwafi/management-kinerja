<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PesertaController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::get('/admin/peserta', 'dataPeserta');
    Route::get('/admin/pembimbing', 'dataPembimbing');
    Route::get('/admin/kegiatan', 'dataKegiatan');
});

// Peserta
Route::controller(PesertaController::class)->group(function () {
    Route::get('/peserta', 'index');
});

// Pembimbing
Route::controller(PembimbingController::class)->group(function () {
    Route::get('/pembimbing', 'index');
});


require __DIR__ . '/auth.php';
