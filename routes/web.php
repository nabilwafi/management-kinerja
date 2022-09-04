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
    Route::get('/admin/kegiatan/addSub', 'tambahSub');
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
        Route::get('{num}', 'index')->name('home')->whereNumber('num');
        Route::patch('{kinerja}/{peserta}', 'updateSubKegiatanAndStatusKegiatan')->whereNumber('kinerja')->whereNumber('peserta');
        Route::patch('update/{kinerja}/{peserta}', 'updateStatusKegiatanAndSelesaiKinerja')->whereNumber('kinerja')->whereNumber('peserta');
        
        Route::get('/kegiatanku/{num}', 'kegiatanku')->whereNumber('num')->name('kegiatanku');

        //Login Route
        Route::match(['get','post'],'login','login');
        Route::match(['get','post'],'register','register');
        Route::get('/logout','logout');
        Route::get('/', 'index');
        Route::get('/kegiatanku/{num}', 'kegiatanku')->whereNumber('num');

        Route::get('/absensi/{num}', 'dataAbsensi')->whereNumber('num');
        Route::get('/history-kegiatan/{num}', 'historyKegiatan')->whereNumber('num');
        Route::get('/detail-kegiatan/{num}', 'detailKegiatan')->whereNumber('num');

        //Melakukan Absensi
        Route::get('/absensi/view-absen/{id}', 'viewAbsen');
        Route::post('/absen/{id}','absen');

    });
});

// Pembimbing
Route::controller(PembimbingController::class)->group(function () {
    //Login Pembimbing
    Route::get('/pembimbing', function() {
        return view('form/login_pembimbing');
        });
    Route::get('/logout','logout');
    Route::match(['get','post'],'/pembimbing/login','loginPembimbing');

    Route::get('/pembimbing/index', 'index');
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
    Route::get('/pembimbing/verifikasi/{id}', 'verifikasiPeserta');
    // Route::get('/pembimbing/filtersubkegiatan/{id}', 'filterSubKegiatan');
    // Route::get('/pembimbing/detailabsensi/{id}')
});


require __DIR__ . '/auth.php';
