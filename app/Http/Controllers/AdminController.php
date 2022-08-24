<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $pesertas = DB::table('pesertas')->get();
        return view('admin/pages/peserta/peserta', [
            "title" => "Peserta",
            "peserta" => $pesertas
        ]);
    }
    public function dataPembimbing()
    {
        $pembimbings = DB::table('pembimbings')->get();
        return view('admin/pages/pembimbing/pembimbing', [
            "title" => "Pembimbing",
            "pembimbing" => $pembimbings
        ]);
    }
    public function tambahPembimbing()
    {
        return view('admin/pages/pembimbing/tambahpembimbing', [
            "title" => "Tambah Pembimbing"
        ]);
    }
    public function store(Request $request)
    {
        DB::table('pembimbings')->insert([
            'email' => $request->email,
            'password' => $request->password,
            'gambar_pembimbing' => $request->gambar_pembimbing,
            'nama_pembimbing' => $request->nama_pembimbing,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan
        ]);
        $pembimbings = DB::table('pembimbings')->get();
        return redirect('admin/pembimbing');
    }

    public function updatePembimbing($id)
    {
        $pembimbings = DB::table('pembimbings')->where('id', $id)->get();
        return view('admin/pages/pembimbing/updatePembimbing', [
            "title" => "Edit Pembimbing",
            'pembimbing' => $pembimbings
        ]);
    }

    public function saveUpdatePembimbing(Request $request)
    {
        DB::table('pembimbings')->where('id', $request->id)->update([
            'email' => $request->email,
            'password' => $request->password,
            'gambar_pembimbing' => $request->gambar_pembimbing,
            'nama_pembimbing' => $request->nama_pembimbing,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan
        ]);
        $pembimbings = DB::table('pembimbings')->get();
        return redirect('admin/pembimbing');
    }

    public function deletePembimbing($id)
    {
        DB::table('pembimbings')->where('id', $id)->delete();
        $pembimbings = DB::table('pembimbings')->get();
        return redirect('admin/pembimbing');
    }


    public function dataKegiatan()
    {
        $kegiatans = DB::table('kegiatans')->get();
        return view('admin/pages/kegiatan/kegiatan', [
            "title" => "Kegiatan",
            "kegiatan" => $kegiatans
        ]);
    }
}
