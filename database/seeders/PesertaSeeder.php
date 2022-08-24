<?php

namespace Database\Seeders;

use App\Models\Pesertas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peserta = new Pesertas();
        $peserta->pembimbing_id = 1;
        $peserta->email = 'peserta@peserta';
        $peserta->password = Hash::make('12345678');
        $peserta->nama_peserta = 'Nabil Wafi';
        $peserta->instansi_pendidikan = 'Universitas Komputer Indonesia';
        $peserta->jurusan = 'Sistem Informasi';
        $peserta->save();
    }
}
