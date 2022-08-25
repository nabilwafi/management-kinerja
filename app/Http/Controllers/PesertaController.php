<?php

namespace App\Http\Controllers;

use App\Models\Kinerjas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    protected $kinerjas;
    public function __construct()
    {
        $this->kinerjas = new Kinerjas();
    }

    public function index($peserta = 1)
    {

        $data = [
            'link' => 'overview',
            'peserta' => $this->kinerjas->pesertaWithKinerja($peserta)->first(),
            'kinerja' => $this->kinerjas->kinerjaFilterByPeserta($peserta)->first(),
            'sub_kegiatans' => $this->kinerjas->subKegiatanWithKinerja($peserta)->get()
        ];

        // dd($data['kinerja']);

        return view('peserta/index', $data);
    }

    public function updateSubKegiatanAndStatusKegiatan(Request $request, $id_kinerja, $id_peserta)
    {
        if($request->has('sub_kegiatan_diambil')) {
            $kinerja = $this->kinerjas->find($id_kinerja);
            
            $kinerja->mulai_kinerja = date('Y-m-d H:i:s');
            $kinerja->status_kegiatan = 'melakukan aktivitas';
            $kinerja->sub_kegiatan_diambil = $request->sub_kegiatan_diambil;

            if($kinerja->save()) {
                return redirect()->route('kegiatanku', $id_peserta)->with('success', 'Success Selected Sub Category');
            }else {
                return redirect()->back()->withInput()->with('error', 'Failed Selected Sub Category, Please check again!');
            }

        }else {
            return redirect()->back()->withInput()->with('error', 'Need Input Sub Category');
        }
    }

    public function updateStatusKegiatanAndSelesaiKinerja(Request $request, $id_kinerja, $id_peserta)
    {
        if($request->has('keterangan')) {
            $kinerja = $this->kinerjas->find($id_kinerja);

            $kinerja->selesai_kinerja = date('Y-m-d H:i:s');
            $kinerja->status_kegiatan = 'selesai';
            $kinerja->keterangan = $request->keterangan;

            if($kinerja->save()) {
                return redirect()->route('kegiatanku', $id_peserta)->with('success', 'Success Selected Sub Category');
            }else {
                return redirect()->back()->withInput()->with('error', 'Failed Selected Sub Category, Please check again!');
            }

        }else {
            return redirect()->back()->withInput()->with('error', 'Need Input Sub Category');
        }
    }

    public function kegiatanku($peserta)
    {
        $data = [
            'link' => 'kegiatan',
            'kinerja' => $this->kinerjas->kinerjaFilterByPeserta($peserta)->first(),
        ];

        return view('peserta/kegiatanku/index', $data);
    }

    public function dataAbsensi()
    {
        $data = [
        'link' => 'absensi',
        ];

        return view('peserta/absensi/index', $data);
    }

    public function historyKegiatan($peserta)
    {
        $data = [
            'link' => 'h_kegiatan',
            'kinerja' => $this->kinerjas->kinerjaFilterByPeserta($peserta)->first(),
            'kinerjas' => $this->kinerjas->kinerjasWithStatusSelesai($peserta)->get(['pesertas.nama_peserta', 'kegiatans.kegiatan', 'detail_kinerjas.keterangan', 'sub_kegiatans.sub_kegiatan', 'detail_kinerjas.status_kegiatan', DB::raw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja, detail_kinerjas.mulai_kinerja), "%H") as hours'), DB::raw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja, detail_kinerjas.mulai_kinerja), "%i") as minutes'), DB::raw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja, detail_kinerjas.mulai_kinerja), "%s") as seconds')])
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
