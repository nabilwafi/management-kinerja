<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index()
    {
        return view ('pembimbing/index');
    }
}
