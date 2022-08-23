<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_kegiatans extends Model
{
    use HasFactory;
    protected $table = 'sub_kegiatans';

    protected $fillable = ['id_kegiatan', 'sub_kegiatan'];
}
