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

    public function kinerjaFilterByPeserta($peserta)
    {
        return Kinerjas::join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')->where('kinerjas.id_peserta', '=', $peserta);
    }

    public function subKegiatanWithKinerja($peserta)
    {
        return Kinerjas::join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')->leftJoin('sub_kegiatans', 'sub_kegiatans.id_kegiatan', '=', 'kegiatans.id')->where('kinerjas.id_peserta', '=', $peserta)->select(['sub_kegiatans.id', 'sub_kegiatans.sub_kegiatan']);
    }

    public function kinerjasWithStatusSelesai($peserta)
    {
        return Kinerjas::join('kegiatans', 'kinerjas.id_kegiatan', '=', 'kegiatans.id')->join('pesertas', 'kinerjas.id_peserta', '=', 'pesertas.id')->leftJoin('sub_kegiatans', 'sub_kegiatans.id', '=', 'detail_kinerjas.sub_kegiatan_diambil')->where('kinerjas.id_peserta', '=', $peserta)->leftJoin('detail_kinerjas', 'kinerjas.id', '=', 'detail_kinerjas.id_kinerja');
    }

    public function kinerjaWithId($id_kinerja)
    {
        return Kinerjas::find($id_kinerja)->first();
    }

}
