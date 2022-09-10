@extends('peserta/layouts/body')

@section('content')
<div class="container peserta-page-mobile">
    <div class="card">
        @if ($kinerja)
        <div class="card-body">
            <h5 class="card-title">{{ $kinerja->kegiatan }}</h5>
            <p class="card-text">{{ $kinerja->keterangan }}</p>
            @if($kinerja->status_kegiatan == 'melakukan aktivitas')
                <div class="w-100">
                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
                </div>
            @else
            <form action="/peserta/{{ $kinerja->id }}/{{ $kinerja->id_peserta }}" method="POST"
                class="d-flex form-kegiatan">
                @csrf
                @method('PATCH')

                <select name="sub_kegiatan_diambil" class="form-select form-select-sm" id="sub_kegiatan">
                    <option selected hidden>Open this select menu</option>
                    @foreach($sub_kegiatans as $sb)
                        <option value="{{ $sb->id }}">{{ $sb->sub_kegiatan }}</option>
                    @endforeach
                </select>

                <button type="submit" id="btn-submit" class="d-none btn btn-primary">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
            @endif
        </div>
        @else
        <p>Tidak ada kegiatan</p>
        @endif
    </div>
</div>
<div class="container peserta-page">
    <div class="row">
        <div class="col-md-9">
            @if($kinerja)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $kinerja->kegiatan }}</h5>
                    <p class="card-text">{{ $kinerja->keterangan }}</p>
                    @if($kinerja && $kinerja->status_kegiatan == 'melakukan aktivitas')
                        <div class="text-end button-web">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-box-arrow-left"></i>
                            </button>
                        </div>
                    @else
                        <form action="/peserta/{{ $kinerja->id }}/{{ $kinerja->id_peserta }}" method="post"
                            class="d-flex justify-content-end">
                            @csrf
                            @method('PATCH')

                            <select name="sub_kegiatan_diambil" class="form-select me-3" id="sub-kegiatan-web">
                                <option selected hidden>Open this select menu</option>
                                @foreach($sub_kegiatans as $sb)
                                    <option value="{{ $sb->id }}">{{ $sb->sub_kegiatan }}</option>
                                @endforeach
                            </select>

                            <button type="submit" id="btn-submit-web" class="d-none btn btn-primary">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            @else
            <p>tidak ada kegiatan</p>
            @endif
        </div>

        @include('peserta.layouts.card-profile')
    </div>
</div>
@endsection

@section('head')
<title>Peserta Dashboard</title>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <script>
    $('#sub_kegiatan').on('change', function () {
        $('#btn-submit').removeClass('d-none');
    });

    $('#sub-kegiatan-web').on('change', function () {
        $('#btn-submit-web').removeClass('d-none');
    });

    </script>
@endsection
