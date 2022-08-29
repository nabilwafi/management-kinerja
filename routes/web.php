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
    return view('form/login');
});

Route::get('/form/register', function () {
    return view('form/register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    //admin peserta
    Route::get('/admin/peserta', 'dataPeserta');
    Route::get('/admin/peserta/update/{id}', 'updatepeserta');
    Route::post('/admin/peserta/update/baru', 'saveUpdatepeserta');
    Route::get('/admin/peserta/delete/{id}', 'deletepeserta');
    //admin pembimbing
    Route::get('/admin/pembimbing', 'dataPembimbing');
    Route::get('/admin/pembimbing/tambah', 'tambahPembimbing');
    Route::post('/admin/pembimbing/tambah/baru', 'savePembimbing');
    Route::get('/admin/pembimbing/update/{id}', 'updatePembimbing');
    Route::post('/admin/pembimbing/update/baru', 'saveUpdatePembimbing');
    Route::get('/admin/pembimbing/delete/{id}', 'deletePembimbing');
    //admin kegiatan
    Route::get('/admin/kegiatan', 'dataKegiatan');
    Route::get('/admin/kegiatan/tambah', 'tambahKegiatan');
    Route::post('/admin/kegiatan/tambah/baru', 'saveKegiatan');
    Route::get('/admin/kegiatan/update/{id}', 'updateKegiatan');
    Route::post('/admin/kegiatan/update/baru', 'saveUpdateKegiatan');
    Route::get('/admin/kegiatan/delete/{id}', 'deleteKegiatan');
    Route::get('/admin/kegiatan/addSub/{id}', 'tambahSub');
    Route::post('/admin/kegiatan/tambah/saveSub', 'saveSub');
    Route::post('/admin/kegiatan/tambah/baru', 'saveKegiatan');

    Route::get('/admin/kegiatan/detailKegiatan/{id}', 'detailKegiatan');
    Route::get('/admin/kegiatan/detailKegiatan/update/{id}', 'updateSubKegiatan');
    Route::post('/admin/kegiatan/detailKegiatan/saveUpdateSub', 'saveUpdateSubKegiatan');
    Route::get('/admin/kegiatan/detailKegiatan/delete/{id}', 'deleteSubKegiatan');
});

// Peserta
Route::controller(PesertaController::class)->group(function () {
    Route::prefix('peserta')->group(function () {
        Route::get('/', 'index')->name('home');
        Route::patch('{kinerja}/{peserta}', 'updateSubKegiatanAndStatusKegiatan')->whereNumber('kinerja')->whereNumber('peserta');
        Route::patch('update/{kinerja}/{peserta}', 'updateStatusKegiatanAndSelesaiKinerja')->whereNumber('kinerja')->whereNumber('peserta');

        Route::get('/kegiatanku/{num}', 'kegiatanku')->whereNumber('num')->name('kegiatanku');

        Route::get('/absensi/{num}', 'dataAbsensi')->whereNumber('num');
        Route::get('/history-kegiatan/{num}', 'historyKegiatan')->whereNumber('num');
        Route::get('/detail-kegiatan/{num}', 'detailKegiatan')->whereNumber('num');
    });
});

// Pembimbing
Route::controller(PembimbingController::class)->group(function () {
    Route::get('/pembimbing', 'index');
    Route::get('/pembimbing/peserta', 'dataPeserta');
    // Route::get('/pembimbing/pertemuan', 'dataPertemuan');
    Route::get('/pembimbing/detailabsensi', 'dataDetailAbsensi');
    Route::get('/pembimbing/tambahpertemuan', 'dataTambahPertemuan');
    Route::get('/pembimbing/editabsensi', 'dataEditAbsensi');
    Route::get('/pembimbing/detailkinerja', 'dataDetailKinerja');
});


require __DIR__ . '/auth.php';
