<?php

namespace Database\Seeders;

use App\Models\Absensis;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = new DateTime();

        $absensi = new Absensis();
        $absensi->id_peserta = 1;
        $absensi->tanggal_pertemuan = $dateNow->format('Y-m-d');
        $absensi->no_pertemuan = '1205';
        $absensi->jam = $dateNow->format('H:i:s');
        $absensi->lokasi = 'Dinas Komunikasi Informasi dan Stastik';
        $absensi->keterangan = 'Menanyakan perkembangan diri selama PKL dan perkembangan project yang sedang dilakukan';
        $absensi->save();
    }
}
