<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pembimbings extends Authenticatable
{
    use HasFactory;

    public function pesertas(){
        $this->hasMany(Pesertas::class);
    }
}
