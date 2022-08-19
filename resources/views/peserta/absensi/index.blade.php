@extends('peserta/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">Data Absensi</h1>
<div class="bg-white py-3 px-3 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Pertemuan</th>
                <th scope="col">No Pertemuan</th>
                <th scope="col">Nama Pembimbing</th>
                <th scope="col">Jam</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 5; $i++)
                <tr>
                    <th scope="row">1</th>
                    <td>12-08-2022</td>
                    <td>15204</td>
                    <td>Rizki Nur Zhifar</td>
                    <td>08:00:00</td>
                    <td>Dinas Komunikasi, Informasi dan Statistik</td>
                    <td>Terverifikasi</td>
                    <td>Memabahas mengenai project</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
