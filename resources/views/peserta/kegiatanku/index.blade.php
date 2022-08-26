@extends('peserta/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">Kegiatanku</h1>
@if (!$kegiatan->id_detail_kinerja)
    <p>Tidak ada kegiatan yang diambil</p>
@else
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ $kegiatan->kegiatan }}

                <span class="btn btn-secondary">
                    {{ $kegiatan->sub_kegiatan }}
                </span>
            </h5>
            <p class="card-text">
                {{ $kegiatan->keterangan }}
            </p>
        </div>
    </div>
@endif
@endsection

@section('head')
<title>Peserta Dashboard | Kegiatanku</title>
@endsection
