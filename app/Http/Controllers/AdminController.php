<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/home', [
            "title" => "Dasboard"
        ]);
    }
    public function dataPeserta()
    {
        return view('admin/pages/peserta', [
            "title" => "Peserta"
        ]);
    }
    public function dataPembimbing()
    {
        return view('admin/pages/pembimbing', [
            "title" => "Pembimbing"
        ]);
    }
    public function tambahPembimbing()
    {
        return view('admin/pages/tambahpembimbing', [
            "title" => "Tambah Pembimbing"
        ]);
    }
    public function dataKegiatan()
    {
        return view('admin/pages/kegiatan', [
            "title" => "Kegiatan"
        ]);
    }
}
