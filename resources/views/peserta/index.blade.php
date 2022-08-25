@extends('peserta/layouts/body')

@section('content')
<div class="container-xl relative">
    <div class="row w-100 align-items-center">
        <div class="col-md-9 border-3 overflow-scroll list-activities mb-5">
            <h1 class="fs-2 mb-3">Kegiatan</h1>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $kinerja->kegiatan }}</h5>
                    <p class="card-text">{{ $kinerja->keterangan }}</p>
                    @if($kinerja->status_kegiatan == 'melakukan aktivitas')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class='bx bx-log-in-circle bx-sm'></i>
                        </button>
                    @else
                        <form class="d-flex justify-content-between align-items-center"
                            action="/peserta/{{ $kinerja->id }}/{{ $kinerja->id_peserta }}" method="post">
                            @csrf
                            @method('PATCH')
                            <select class="form-select me-3" name="sub_kegiatan_diambil" id="sub_kegiatan"
                                aria-label="Default select example">
                                <option selected hidden>Open this select menu</option>
                                @foreach($sub_kegiatans as $sb)
                                    <option value="{{ $sb->id }}">{{ $sb->sub_kegiatan }}</option>
                                @endforeach
                            </select>
                            <button id="btn-submit" class="d-none btn btn-primary text-white">
                                <i class='bx bx-log-in-circle bx-sm'></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('/assets/images/'.$peserta->gambar_peserta) }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $peserta->nama_peserta }}</h5>
                    <hr />

                    <ul class="list-group list-group-flush">
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Instansi Pendidikan:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ $peserta->instansi_pendidikan }}</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Jurusan:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ $peserta->jurusan }}</span>
                            </div>
                        </li>
                        <li class="row mb-4">
                            <div class="col-md-6">
                                <span class="fw-bold">Nama Pembimbing:</span>
                            </div>
                            <div class="col-md-6">
                                <span>{{ $peserta->nama_pembimbing }}</span>
                            </div>
                        </li>
                    </ul>

                    <div>
                        <a href="/peserta/update/{{ $peserta->id }}" class="w-100 btn btn-primary me-2">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selesai Kinerja Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <form action="/peserta/update/{{ $kinerja->id }}/{{ $kinerja->id_peserta }}" method="post">
            @csrf
            @method('PATCH')

            <div class="modal-body">
                <textarea name="keterangan" class="form-control" id="editor" cols="10" placeholder="keterangan"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection()

@section('head')
<title>Peserta Dashboard</title>
@endsection

@section('script')
<script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

<script>
    $('#sub_kegiatan').on('change', function () {
        $('#btn-submit').removeClass('d-none');
    });

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            height: '250px'
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
