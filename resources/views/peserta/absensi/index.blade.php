@extends('peserta/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">Data Absensi</h1>
<div class="bg-white py-3 px-3 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
               
                <th scope="col">Tanggal Pertemuan</th>
                <th scope="col">No Pertemuan</th>
                <th scope="col">Nama Pembimbing</th>
                <th scope="col">Jam</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAbsensiDetail as $absen)
                <tr>
                    
                    <td>{{ $absen['tanggal_pertemuan'] }}</td>
                    <td>{{ $absen['no_pertemuan']}}</td>
                    <td>Pembimbing</td>
                    <td>{{ $absen['jam'] }}</td>
                    <td>{{ $absen['lokasi'] }}</td>
                    <td>{{ $absen['status'] }}</td>
                    <td>{{ $absen['keterangan'] }}</td>
                    @if ($absen['tanggal_pertemuan'] == date("Y-m-d") && $absen['status'] == 'belum terverifikasi')
                    <td><a class="btn btn-info" href="{{ url('peserta/absensi/view-absen/'.$absen['id'])}}">Absen</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
