<?php

namespace App\Http\Controllers;

use App\Models\Detail_Kinerjas;
use App\Models\Kinerjas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    protected $kinerjas;
    protected $detail_kinerjas;
    public function __construct()
    {
        $this->kinerjas = new Kinerjas();
        $this->detail_kinerjas = new Detail_Kinerjas();
    }

    public function index($peserta = 1)
    {

        $data = [
            'link' => 'overview',
            'peserta' => $this->kinerjas->pesertaWithKinerja($peserta)->first(),
            'kinerja' => $this->kinerjas->kinerjaJoinDetailFilterByPeserta($peserta)->first(),
            'sub_kegiatans' => $this->kinerjas->subKegiatanWithKinerja($peserta)->get()
        ];

        return view('peserta/index', $data);
    }

    public function updateSubKegiatanAndStatusKegiatan(Request $request, $id_kinerja, $id_peserta)
    {
        if($request->has('sub_kegiatan_diambil')) {
            $detail_kinerja = new Detail_Kinerjas();
            $detail_kinerja->id_kinerja = $id_kinerja;
            $detail_kinerja->mulai_kinerja = date('Y-m-d H:i:s');
            $detail_kinerja->sub_kegiatan_diambil = $request->sub_kegiatan_diambil;

            if($detail_kinerja->save()) {
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
            $detail_kinerja = Detail_Kinerjas::where('id_kinerja', $id_kinerja)->latest()->first();
            $detail_kinerja->selesai_kinerja = date('Y-m-d H:i:s');
            $detail_kinerja->status_kegiatan = 'selesai';
            $detail_kinerja->keterangan = $request->keterangan;

            if($detail_kinerja->save()) {
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
            'kinerja' => $this->kinerjas->getIdPesertaFromKinerja($peserta)->first(['kinerjas.id_peserta']),
            'kegiatan' => $this->kinerjas->getKinerjaFilterByStatusKegiatanMelakukanAktivitas()->first()
        ];

        // dd($data['kegiatan']);

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
            'kinerja' => $this->kinerjas->getIdPesertaFromKinerja($peserta)->first(['kinerjas.id_peserta']),
            'detail_kinerjas' => $this->detail_kinerjas->detailKinerjaByIdPeserta($peserta)->get()
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
