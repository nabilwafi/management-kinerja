<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesertas extends Model
{
    use HasFactory;

    public function pesertaWithPembimbing($peserta)
    {
        return DB::table('pesertas')->join('pembimbings','pesertas.id_pembimbing', '=', 'pembimbings.id')->where('pesertas.id', '=', $peserta)->select(['pesertas.*', 'pembimbings.nama_pembimbing']);
    }
}
