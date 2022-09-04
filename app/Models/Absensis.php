<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensis extends Model
{
    protected $table = 'absensis';
    protected $primaryKey = 'id';

    public function peserta(){
        return $this->belongsTo(Pesertas::class, 'id_peserta', 'id');
    }

    use HasFactory;
}
