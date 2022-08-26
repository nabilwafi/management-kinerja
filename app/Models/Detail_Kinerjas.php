<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Kinerjas extends Model
{
    use HasFactory;
    protected $table = 'detail_kinerjas';

    public function detailKinerjaByIdPeserta($peserta)
    {
        return Detail_Kinerjas::join('kinerjas', 'detail_kinerjas.id_kinerja', '=', 'kinerjas.id')
                            ->join('pesertas', 'kinerjas.id_peserta', '=', 'pesertas.id')
                            ->join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')
                            ->leftJoin('sub_kegiatans', 'detail_kinerjas.sub_kegiatan_diambil', '=', 'sub_kegiatans.id')
                            ->where('kinerjas.id_peserta', $peserta)
                            ->where('detail_kinerjas.status_kegiatan', 'selesai')
                            ->select(['pesertas.nama_peserta', 'kegiatans.kegiatan', 'sub_kegiatans.sub_kegiatan', 'detail_kinerjas.keterangan', 'detail_kinerjas.status_kegiatan'])
                            ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%H") AS hours')
                            ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%i") AS minutes')
                            ->selectRaw('TIME_FORMAT(TIMEDIFF(detail_kinerjas.selesai_kinerja,detail_kinerjas.mulai_kinerja), "%s") AS seconds');
    }

}
