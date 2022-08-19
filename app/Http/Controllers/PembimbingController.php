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
}
