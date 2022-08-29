@extends('peserta/layouts/body')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5>History Kegiatan</h5>
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
                    @foreach($detail_kinerjas as $key => $dk)
                        <tr>
                            <th scope="row">{{ $detail_kinerjas->firstItem() + $key }}</th>
                            <td>{{ $dk->nama_peserta }}</td>
                            <td>{{ $dk->kegiatan }}</td>
                            <td>{{ $dk->sub_kegiatan }}</td>
                            <td>{!! Str::limit(strip_tags($dk->keterangan), $limit = 50, $end = '...') !!}</td>
                            <td>
                                @if($dk->hours != 00)
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
            <div class="mt-3">
                {{ $detail_kinerjas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
