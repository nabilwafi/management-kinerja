<?php

namespace Database\Seeders;

use App\Models\Kegiatans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatan = new Kegiatans();
        $kegiatan->kegiatan = 'Membangun Aplikasi Management Kinerja Peserta Magang Berbasis Web';
        $kegiatan->keterangan = 'Melakukan pembangunan aplikasi untuk memanagement kinerja peserta magang yang berada di dinas komunikasi, informasi, dan statistik kabupaten soreang agar pembimbing lebih mudah melakukan pengawasan para peserta magang';
        $kegiatan->save();
    }
}
