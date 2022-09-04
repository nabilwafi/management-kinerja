@extends('peserta/layouts/body')

@section('content')
<<<<<<< HEAD
<div class="container peserta-page-mobile">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kinerja->kegiatan }}</h5>
            <p class="card-text">{{ $kinerja->keterangan }}</p>
            @if($kinerja->status_kegiatan == 'melakukan aktivitas')
                <div class="w-100">
                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
=======
<div class="container-xl relative">
    <div class="row w-100 align-items-center">
        <div class="col-md-9 border-3 overflow-scroll list-activities mb-5">
            
            <h1 class="fs-2 mb-3">List Kegiatan</h1>
            @for ($i = 0; $i < 10; $i++)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Membuat Aplikasi Management Kinerja Anak Magang</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore non rerum
                        doloremque possimus eaque maiores, ducimus architecto iusto, quas exercitationem blanditiis ex.
                        Reprehenderit nihil officiis rem architecto et, esse optio.
                    </p>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="/peserta/detail-kegiatan/{{ $i+1 }}" class="btn btn-primary text-white">
                            <i class='bx bx-log-in-circle bx-sm'></i>
                        </a>
                    </div>
>>>>>>> origin/form
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
    </div>
</div>

<div class="container peserta-page">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $kinerja->kegiatan }}</h5>
                    <p class="card-text">{{ $kinerja->keterangan }}</p>
                    <h5 class="card-title">{{ Auth::guard('peserta')->user()->nama_peserta }}</h5>
                    <hr />

                    <ul class="list-group list-group-flush">
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Divisi:</span>
                            </div>
                            <div class="col-md-6">
                                <span>Pemrograman Web</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Instansi Pendidikan:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ Auth::guard('peserta')->user()->instansi_pendidikan }}</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Jurusan:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ Auth::guard('peserta')->user()->jurusan }}</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Nama Pembimbing:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ Auth::guard('peserta')->user()->id_pembimbing }}</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Lama PKL:</span>
                            </div>
                            <div class="col-md-6">
                                <span>1 Bulan</span>
                            </div>
                        </li>
                    </ul>

                    @if($kinerja->status_kegiatan == 'melakukan aktivitas')
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
        </div>

        @include('peserta.layouts.card-profile')
    </div>
</div>
@endsection()

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
