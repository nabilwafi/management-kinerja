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
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index');
});

// Peserta
Route::controller(PesertaController::class)->group(function() {
    Route::get('/peserta', 'index');
});

// Pembimbing
Route::controller(PembimbingController::class)->group(function() {
    Route::get('/pembimbing', 'index');
    Route::get('/pembimbing/peserta', 'dataPeserta');
    // Route::get('/pembimbing/pertemuan', 'dataPertemuan');
    Route::get('/pembimbing/detailabsensi/{id}', 'dataDetailAbsensi');
    Route::get('pembimbing/detailabsensi/delete/{id}', 'deleteAbsensi');
    Route::get('/pembimbing/tambahpertemuan/{id}', 'dataTambahPertemuan');
    Route::post('/pembimbing/tambahpertemuan/baru/', 'tambahPertemuan');
    Route::get('/pembimbing/editabsensi/{id}', 'dataEditAbsensi');
    Route::post('/pembimbing/editabsensi/update', 'saveEditAbsensi');
    Route::get('/pembimbing/detailkinerja/{id}', 'dataDetailKinerja');
    Route::post('/pembimbing/detailkinerja/filtersubkegiatan/', 'filterSubb');
    // Route::get('/pembimbing/filtersubkegiatan/{id}', 'filterSubKegiatan');
    // Route::get('/pembimbing/detailabsensi/{id}')
});
// Route::resource('/pembimbing/tambahpertemuan/baru', PembimbingController::class);


require __DIR__.'/auth.php';
