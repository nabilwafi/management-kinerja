<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'link' => 'overview'
        ];

        return view('peserta/index', $data);
    }

    public function kegiatanku()
    {
        $data = [
            'link' => 'kegiatan'
        ];

        return view('peserta/kegiatanku/index', $data);
    }

    public function dataAbsensi()
    {
        $data = [
        'link' => 'absensi'
        ];

        return view('peserta/absensi/index', $data);
    }

    public function historyKegiatan()
    {
        $data = [
            'link' => 'h_kegiatan'
        ];

        return view('peserta/history/index', $data);
    }

    public function detailKegiatan()
    {
        $data = [
            'link' => 'detail_kegiatan'
        ];

        return view('peserta/detail_kegiatan/index', $data);
    }
}
