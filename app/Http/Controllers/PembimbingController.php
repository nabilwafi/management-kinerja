<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\absensi;
use App\Models\peserta;

class PembimbingController extends Controller
{
    public function index()
    {
        $pesertas = DB::table('pesertas')->get();
        return view ('pembimbing/index', [
            "title" => "Dashboard",
            "peserta" => $pesertas
        ]);
    }

    public function dataPeserta()
    {
        $pesertas = DB::table('pesertas')->get();
        // $users = Peserta::join('absensis', 'pesertas.id', '=', 'absensis.id_peserta')
        // ->get(['pesertas.*', 'absensis.no_pertemuan']);
        return view('pembimbing/pages/peserta', [
            "title" => "Peserta",
            "peserta" => $pesertas
            // "pst" => $users
        ]);
    }
    // public function getDataAbsensi(){
    //     $users = Peserta::join('absensi', 'id', '=', 'absensi.id_peserta')
    //                         ->get(['peserta.*', 'absensi.no_pertemuan']);
    // }
    public function dataPertemuan()
    {
        return view ('pembimbing/pages/pertemuan');
    }
    public function dataDetailAbsensi($id)
    {
        $pesertas = DB::table('pesertas')->where('id', $id)->get();
        $namas = Peserta::where('id', $id)->pluck('nama_peserta')->first();
        $ids = Peserta::where('id', $id)->pluck('id')->first();
        $data_absens = DB::table('absensis')
                ->join('pesertas', 'pesertas.id', '=', 'absensis.id_peserta')
                ->select(['absensis.*'])
                ->where('pesertas.id', $id)
                ->get();
        return view ('pembimbing/pages/detailabsensi', [
            "title" => "Detail Absensi",
            'peserta' => $pesertas,
            'data_absen' => $data_absens,
            'nama' => $namas,
            'id' => $ids
        ]);
    }

    public function deleteAbsensi($id)
    {
        DB::table('absensis')->where('id', $id)->delete();
        return redirect('pembimbing/peserta');
    }

    public function dataTambahPertemuan($id)
    {
        $datas = $id;
        return view ('pembimbing/pages/tambahpertemuan', [
            'data' => $datas
        ]);
    }
    public function tambahPertemuan(Request $request)
    {
        DB::table('absensis')->insert([
            'id_peserta' => $request->id_peserta,
            'no_pertemuan' => $request->no_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan
        ]);
        $absensis = DB::table('absensis')->get();
        return redirect('pembimbing/peserta');
    }
    public function dataEditAbsensi($id)
    {
        $absensis = DB::table('absensis')->where('id', $id)->get();
        return view ('pembimbing/pages/editabsensi', [
            "Title" => "Edit Absensi",
            'absensi' => $absensis
        ]);
    }
    public function saveEditAbsensi(Request $request)
    {
        // dd($request->no_pertemuan);
        DB::table('absensis')->where('id', $request->id)->update([
            'no_pertemuan' => $request->no_pertemuan,
            'tanggal_pertemuan' => $request->tanggal_pertemuan,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);
        $absensis = DB::table('absensis')->get();
        return redirect('pembimbing/peserta');
    }
    public function dataDetailKinerja($id)
    {
        $detailkinerjas = DB::table('pesertas')->where('id', $id)->get();
        $kinerjas = DB::table('kinerjas')
                ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
                ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'kinerjas.sub_kegiatan_diambil')
                ->select(['kinerjas.*','sub_kegiatans.*','kegiatans.*'])
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%H") AS hours')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%i") AS minutes')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%s") AS seconds')
                ->where('kinerjas.id_peserta', $id)
                ->where('kinerjas.status_kegiatan', '=', 'selesai')
                ->get();
        $totals = DB::table('kinerjas')
        ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
        ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'kinerjas.sub_kegiatan_diambil')
        ->where('kinerjas.id_peserta', $id)
        ->where('kinerjas.status_kegiatan', '=', 'selesai')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%H")) AS hours')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%i")) AS minutes')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%s")) AS seconds')
        ->first();
        // dd($totals);
        $id_kegiatans = DB::table('kinerjas')
                ->select(['kinerjas.id_kegiatan'])
                ->where('kinerjas.id_peserta', $id)
                // ->where('kinerjas.id_kegiatan', 1)
                ->first();
        $sub_kegiatans = DB::table('sub_kegiatans')
                ->where('id_kegiatan', $id_kegiatans->id_kegiatan)
                ->get();
                // dd($sub_kegiatans);
        $ids = DB::table('kinerjas')
                ->join('sub_kegiatans', 'sub_kegiatans.id_kegiatan', '=', 'kinerjas.id_kegiatan')
                ->where('kinerjas.id_peserta', $id)
                ->pluck('sub_kegiatans.id')
                ->first();
        // $subkegiatans = DB::table('sub_kegiatans')
                        // ->join('')
        return view ('pembimbing/pages/detailkinerja', [
            "title" => "Detail Kinerja",
            'detailkinerja' => $detailkinerjas,
            'kinerja' => $kinerjas,
            'sub_kegiatan' => $sub_kegiatans,
            'id' => $ids,
            'total' => $totals
        ]);
    }

    public function filterSubb(Request $request)
    {
        // dd($request->get('id_peserta'));
        $kinerjas = DB::table('kinerjas')
                ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
                ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'kinerjas.sub_kegiatan_diambil')
                ->select(['kinerjas.*','sub_kegiatans.*','kegiatans.*'])
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%H") AS hours')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%i") AS minutes')
                ->selectRaw('TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%s") AS seconds')
                ->where('kinerjas.id_peserta', $request->get('id_peserta'))
                ->where('sub_kegiatans.id', $request->get('pilihsub'))
                ->where('kinerjas.status_kegiatan', '=', 'selesai')
                ->get();
        $subs = DB::table('sub_kegiatans')
        ->where('id', '=', $request->get('pilihsub'))
        ->pluck('sub_kegiatan')
        ->first();
        $totals = DB::table('kinerjas')
        ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
        ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'kinerjas.sub_kegiatan_diambil')
        ->where('kinerjas.id_peserta', $request->get('id_peserta'))
        ->where('sub_kegiatans.id', $request->get('pilihsub'))
        ->where('kinerjas.status_kegiatan', '=', 'selesai')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%H")) AS hours')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%i")) AS minutes')
        ->selectRaw('sum(TIME_FORMAT(TIMEDIFF(selesai_kinerja,mulai_kinerja), "%s")) AS seconds')
        ->first();
        return view ('pembimbing/pages/filtersubkegiatan', [
            'kinerja' => $kinerjas,
            'sub' => $subs,
            'total' => $totals
        ]);
    }

    // public function filterSubKegiatan($id)
    // {
    //     $sub_kegiatans = DB::table('sub_kegiatans')
    //     ->join('kegiatans', 'kegiatans.id', '=', 'sub_kegiatans.id_kegiatan')
    //     ->where('sub_kegiatans.id_kegiatan', $id)
    //     ->get();
    //     return view('pembimbing/pages/filtersubkegiatan', ['sub_kegiatan' => $sub_kegiatans]);
    // }

    // public function filterSub()
    // {
    //     $kinerjas = DB::table('kinerjas')
    //     ->join('kegiatans', 'kegiatans.id', '=', 'kinerjas.id_kegiatan')
    //     ->join('sub_kegiatans', 'sub_kegiatans.id', '=', 'kinerjas.sub_kegiatan_diambil')
    //     // ->where('sub_kegiatans.id', '=', "kinerjas.sub_kegiatan_diambil")
    //     ->where('kinerjas.id_peserta')
    //     ->where('kinerjas.status_kegiatan', '=', 'selesai')
    //     ->get();
    //     return view('pembimbing/pages/detailkinerja', [
    //         'kinerja' => $kinerjas
    //     ]);
    // }
}
