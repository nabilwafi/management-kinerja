@extends('peserta/layouts/body')

@section('content')
<div class="container">
    @if (!$kegiatan->id_detail_kinerja)
    <div class="kegiatanku-page-mobile">
        <div class="col-sm-9">
            <p>Tidak ada kegiatan yang diambil</p>
        </div>
    </div>

    <div class="kegiatanku-page">
        <div class="row">
            <div class="col-sm-9">
                <p>Tidak ada kegiatan yang diambil</p>
            </div>
            @include('peserta.layouts.card-profile')
        </div>
    </div>
    @else
        <div class="card kegiatanku-page-mobile">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $kegiatan->kegiatan }}
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $kegiatan->sub_kegiatan }}</h6>
                <p class="card-text">
                    {{ $kegiatan->keterangan }}
                </p>
            </div>
        </div>

        <div class="kegiatanku-page">
            <div class="row">
                <div class="card col-sm-9 card-kegiatan">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $kegiatan->kegiatan }}
                            <span class="badge bg-secondary badge-subtitle-web">{{ $kegiatan->sub_kegiatan }}</span>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $kegiatan->sub_kegiatan }}</h6>
                        <p class="card-text">
                            {{ $kegiatan->keterangan }}
                        </p>
                    </div>
                </div>

                @include('peserta.layouts.card-profile')
            </div>
        </div>
        @endif
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Kegiatanku</title>
@endsection
