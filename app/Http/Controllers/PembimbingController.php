<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index()
    {
        return view ('pembimbing/index');
    }
    public function dataPeserta()
    {
        
        return view ('pembimbing/pages/peserta');
    }
    public function dataPertemuan()
    {
        return view ('pembimbing/pages/pertemuan');
    }
    public function dataDetailAbsensi()
    {
        return view ('pembimbing/pages/detailabsensi');
    }
    public function dataTambahPertemuan()
    {
        return view ('pembimbing/pages/tambahpertemuan');
    }
    public function dataEditAbsensi()
    {
        return view ('pembimbing/pages/editabsensi');
    }
    public function dataDetailKinerja()
    {
        return view ('pembimbing/pages/detailkinerja');
    }
}
