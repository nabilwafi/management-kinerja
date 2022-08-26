<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerjas extends Model
{
    use HasFactory;
    protected $fillable = ['id_peserta', 'id_kegiatan', 'mulai_kinerja', 'selesai_kinerja', 'selesai_kinerja', 'status_kegiatan', 'sub_kegiatan_diambil'];

    public function pesertaWithKinerja($peserta)
    {
        return Kinerjas::leftJoin('pesertas', 'kinerjas.id_peserta', '=', 'pesertas.id')->where('kinerjas.id_peserta', '=', $peserta)->join('pembimbings', 'pesertas.id_pembimbing', '=', 'pembimbings.id')->select(['pesertas.*', 'pembimbings.nama_pembimbing']);
    }

    public function getIdPesertaFromKinerja($peserta)
    {
        return Kinerjas::Where('id_peserta', $peserta);
    }

    public function kinerjaJoinDetailFilterByPeserta($peserta)
    {
        return Kinerjas::join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')
                ->leftJoin('detail_kinerjas', function ($query) {
                    $query->on('kinerjas.id', '=', 'detail_kinerjas.id_kinerja')
                        ->whereRaw('detail_kinerjas.id IN (SELECT MAX(a2.id) from detail_kinerjas as a2 join kinerjas as u2 on u2.id = a2.id_kinerja group by u2.id)');
                })
                ->where('kinerjas.id_peserta', $peserta)
                ->select(['kinerjas.*', 'detail_kinerjas.status_kegiatan', 'kegiatans.kegiatan', 'kegiatans.keterangan']);
    }

    public function getKinerjaFilterByStatusKegiatanMelakukanAktivitas()
    {
        return Kinerjas::leftJoin('detail_kinerjas', function ($query) {
            $query->on('detail_kinerjas.id_kinerja', '=', 'kinerjas.id')
                ->whereRaw('detail_kinerjas.id In (SELECT MAX(a2.id) from detail_kinerjas AS a2 JOIN kinerjas AS u2 ON u2.id = a2.id_kinerja GROUP BY u2.id)')
                ->where('detail_kinerjas.status_kegiatan', '=', 'melakukan aktivitas');
        })
        ->join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')
        ->leftJoin('sub_kegiatans', 'sub_kegiatans.id', 'detail_kinerjas.sub_kegiatan_diambil')
        ->select(['detail_kinerjas.id as id_detail_kinerja', 'detail_kinerjas.status_kegiatan', 'kegiatans.kegiatan', 'kegiatans.keterangan', 'sub_kegiatans.sub_kegiatan']);
    }

    public function subKegiatanWithKinerja($peserta)
    {
        return Kinerjas::join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')->leftJoin('sub_kegiatans', 'sub_kegiatans.id_kegiatan', '=', 'kegiatans.id')->where('kinerjas.id_peserta', '=', $peserta)->select(['sub_kegiatans.id', 'sub_kegiatans.sub_kegiatan']);
    }

    public function kinerjaWithId($id_kinerja)
    {
        return Kinerjas::find($id_kinerja)->first();
    }

}
