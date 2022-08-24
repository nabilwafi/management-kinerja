<?php

namespace Database\Seeders;

use App\Models\Pembimbings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembimbing = new Pembimbings();
        $pembimbing->email = 'pembimbing1@pembimbing.com';
        $pembimbing->password = Hash::make('12345678');
        $pembimbing->nama_pembimbing = 'Jono Setiawan';
        $pembimbing->divisi = 'Frontend Developer';
        $pembimbing->jabatan = 'Lead Frontend Developer';
        $pembimbing->save();
    }
}
