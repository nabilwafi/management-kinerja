@extends('peserta/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">History Kegiatan</h1>
<div class="bg-white py-3 px-3 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peserta</th>
                <th scope="col">Judul Kegiatan</th>
                <th scope="col">Sub Kegiatan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Total Pengerjaan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kinerjas as $knj)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $knj->nama_peserta }}</td>
                    <td>{{ $knj->kegiatan }}</td>
                    <td>{{ $knj->sub_kegiatan }}</td>
                    <td>{!! Str::limit(strip_tags($knj->keterangan), $limit = 50, $end = '...') !!}</td>
                    <td>
                        @if ($knj->hours != 00)
                            {{ $knj->hours }} Jam
                        @endif
                        @if($knj->minutes != 00)
                            {{ $knj->minutes }} Menit
                        @endif
                        @if($knj->seconds != 00)
                            {{ $knj->seconds }} Detik
                        @endif
                    </td>
                    <td>
                        @if($knj->status_kegiatan)
                        <span class="badge bg-success">{{ $knj->status_kegiatan }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
