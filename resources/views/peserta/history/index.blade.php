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
            @foreach($detail_kinerjas as $dk)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $dk->nama_peserta }}</td>
                    <td>{{ $dk->kegiatan }}</td>
                    <td>{{ $dk->sub_kegiatan }}</td>
                    <td>{!! Str::limit(strip_tags($dk->keterangan), $limit = 50, $end = '...') !!}</td>
                    <td>
                        @if ($dk->hours != 00)
                            {{ $dk->hours }} Jam
                        @endif
                        @if($dk->minutes != 00)
                            {{ $dk->minutes }} Menit
                        @endif
                        @if($dk->seconds != 00)
                            {{ $dk->seconds }} Detik
                        @endif
                    </td>
                    <td>
                        @if($dk->status_kegiatan)
                        <span class="badge bg-success">{{ $dk->status_kegiatan }}</span>
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
