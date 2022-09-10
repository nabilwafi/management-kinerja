<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pesertas extends Authenticatable
{
    
    use HasFactory;
    
    protected $table = 'pesertas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_peserta',
        'email',
        'instansi_pendidikan',
        'password',
        'jurusan',
        'role',
        'gambar',
    ];
    
    public function pesertaWithPembimbing($peserta)
    {
        return DB::table('pesertas')->Leftjoin('pembimbings','pesertas.id_pembimbing', '=', 'pembimbings.id')->where('pesertas.id', '=', $peserta)->select(['pesertas.*', 'pembimbings.nama_pembimbing']);
    }
    

    public function absensi(){
        return $this->hasMany(Absensis::class);
    }

    public function pembimbing(){
        return $this->hasOne(Pembimbings::class);
    }
}
