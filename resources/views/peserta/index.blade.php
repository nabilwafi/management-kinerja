@extends('peserta/layouts/body')

@section('content')
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
                </div>
            </div>
            @endfor
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('/template/assets/images/users/user-1.jpg') }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
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

                    <div>
                        <a href="" class="w-100 btn btn-primary me-2">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('head')
<title>Peserta Dashboard</title>
@endsection
