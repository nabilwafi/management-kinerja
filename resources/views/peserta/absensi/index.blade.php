@extends('peserta/layouts/body')

@section('content')
<div class="container">
    <h1 class="fs-2 mb-3">Data Absensi</h1>
    <div class="bg-white py-3 px-3 rounded shadow-sm">
        <p>Total Pertemuan:{{$absensi}}</p>
        <p>Total Kehadiran:{{$hadir}}</p>
        <p>Persentase Kehadiran:{{round($persentase,2)}}%</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tanggal Pertemuan</th>
                    <th scope="col">No Pertemuan</th>
                    <th scope="col">ID Pembimbing</th>
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
                        <td>{{ $namaPembimbing }}</td>
                        <td>{{ $absen['jam'] }}</td>
                        
                        <td style="width: 200px; height: 200px;">
                        @if($absen['latitude']!=NULL && $absen['longitude']!=NULL)
                            <iframe src="https://www.google.com/maps?q={{$absen['latitude']}},{{$absen['longitude']}}&z=15&output=embed" width="" height=""></iframe>
                        @endif
                        </td>
                        <td>{{ $absen['status'] }}</td>
                        <td>{{ $absen['keterangan'] }}</td>
                        <td>
                            @if ($absen['tanggal_pertemuan'] == date("Y-m-d") && $absen['status'] == 'belum terverifikasi')
                            <a class="btn btn-info" href="{{ url('peserta/absensi/view-absen/'.$absen['id'])}}">Absen</a>
                            @else
                            <span class="badge bg-success">Sudah Absen</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
