<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $pesertas = DB::table('pesertas')->get();
        $pembimbings = DB::table('pembimbings')->get();
        $kegiatans = DB::table('kegiatans')->get();
        return view('admin/home', [
            "title" => "Dasboard",
            "peserta" => $pesertas,
            "pembimbing" => $pembimbings,
            'kegiatan' => $kegiatans
        ]);
    }

    //admin peserta
    public function dataPeserta()
    {
        $pesertas = DB::table('pesertas')->get();
        return view('admin/pages/peserta/peserta', [
            "title" => "Peserta",
            "peserta" => $pesertas
        ]);
    }
    public function updatePeserta($id)
    {
        $pesertas = DB::table('pesertas')->where('id', $id)->get();
        return view('admin/pages/peserta/updatePeserta', [
            "title" => "Edit Peserta",
            'peserta' => $pesertas
        ]);
    }

    public function saveUpdatePeserta(Request $request)
    {
        DB::table('pesertas')->where('id', $request->id)->update([
            'email' => $request->email,
            'nama_peserta' => $request->nama_peserta,
            'instansi_pendidikan' => $request->instansi_pendidikan,
            'jurusan' => $request->jurusan,
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]);
        $pesertas = DB::table('pesertas')->get();
        return redirect('admin/peserta');
    }

    public function deletePeserta($id)
    {
        DB::table('pesertas')->where('id', $id)->delete();
        $pesertas = DB::table('pesertas')->get();
        return redirect('admin/peserta');
    }

    //admin pembimbing
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
    public function savePembimbing(Request $request)
    {
        DB::table('pembimbings')->insert([
            'email' => $request->email,
            'password' => $request->password,
            'gambar_pembimbing' => $request->gambar_pembimbing,
            'nama_pembimbing' => $request->nama_pembimbing,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'created_at' => date("Y-m-d H:i:s", strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
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
            'nama_pembimbing' => $request->nama_pembimbing,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
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

    //admin kegiatan
    public function dataKegiatan()
    {
        $kegiatans = DB::table('kegiatans')->get();
        return view('admin/pages/kegiatan/kegiatan', [
            "title" => "Kegiatan",
            "kegiatan" => $kegiatans
        ]);
    }
    public function tambahKegiatan()
    {
        return view('admin/pages/kegiatan/tambahkegiatan', [
            "title" => "Tambah Kegiatan"
        ]);
    }
    public function saveKegiatan(Request $request)
    {
        DB::table('kegiatans')->insert([
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'created_at' => date("Y-m-d H:i:s", strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]);
        $kegiatans = DB::table('kegiatans')->get();
        return redirect('admin/kegiatan');
    }
    public function updateKegiatan($id)
    {
        $kegiatans = DB::table('kegiatans')->where('id', $id)->get();
        return view('admin/pages/kegiatan/updateKegiatan', [
            "title" => "Edit Kegiatan",
            'kegiatan' => $kegiatans
        ]);
    }

    public function saveUpdateKegiatan(Request $request)
    {
        DB::table('kegiatans')->where('id', $request->id)->update([
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]);
        $kegiatans = DB::table('kegiatans')->get();
        return redirect('admin/kegiatan');
    }

    public function tambahSub($id)
    {

        $kegiatans = DB::table('kegiatans')->where('kegiatans.id', '=', $id)->get('id');
        return view('admin/pages/kegiatan/tambahsub', [
            "title" => "Tambah SubKegiatan",
            "kegiatan" => $kegiatans
        ]);
    }

    public function saveSub(Request $request)
    {
        for ($i = 0; $i < Count($request->subkegiatan); $i++) {
            $data[] =
                [
                    'id_kegiatan' => $request->id_kegiatan,
                    'sub_kegiatan' => $request->subkegiatan[$i],
                    'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
                ];
        };
        DB::table('sub_kegiatans')->insert($data);
        return redirect('admin/kegiatan');
    }

    public function deleteKegiatan($id)
    {
        DB::table('kegiatans')->where('id', $id)->delete();
        $kegiatans = DB::table('kegiatans')->get();
        return redirect('admin/kegiatan');
    }

    public function detailKegiatan($id)
    {
        $kegiatans = DB::table('kegiatans')->where('id', $id)->get();
        $subkegiatans = DB::table('sub_kegiatans')->where('id_kegiatan', $id)->get();
        return view('admin/pages/kegiatan/detailKegiatan', [
            "title" => "Detail Kegiatan",
            "kegiatan" => $kegiatans,
            "subkegiatan" => $subkegiatans,
        ]);
    }

    public function updateSubKegiatan($id)
    {
        $subkegiatans = DB::table('sub_kegiatans')->where('id', $id)->get();
        return view('admin/pages/kegiatan/updateSubKegiatan', [
            "title" => "Edit Sub Kegiatan",
            'subkegiatan' => $subkegiatans
        ]);
    }

    public function saveUpdateSubKegiatan(Request $request)
    {
        DB::table('sub_kegiatans')->where('id', $request->id)->update([
            'sub_kegiatan' => $request->sub_kegiatan,
            'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]);
        return redirect('admin/kegiatan');
    }

    public function deleteSubKegiatan($id)
    {
        DB::table('sub_kegiatans')->where('id', $id)->delete();
        return redirect('admin/kegiatan');
    }
}
