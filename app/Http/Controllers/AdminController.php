<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/home');
    }
    public function dataPeserta()
    {
        return view('admin/pages/peserta');
    }
    public function dataPembimbing()
    {
        return view('admin/pages/pembimbing');
    }
    public function tambahPembimbing()
    {
        return view('admin/pages/tambahpembimbing');
    }
    public function dataKegiatan()
    {
        return view('admin/pages/kegiatan');
    }
}
