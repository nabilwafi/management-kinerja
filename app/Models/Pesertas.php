<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PDO;

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

    public function absensi(){
        return $this->hasMany(Absensis::class);
    }

    public function pembimbing(){
        return $this->hasOne(Pembimbings::class);
    }

    
}
