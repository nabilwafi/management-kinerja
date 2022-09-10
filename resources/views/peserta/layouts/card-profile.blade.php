<div class="col-sm-3">
    <div class="card">
        <img src="/assets/images/default.png" class="card-img-top" alt="...">
        <div class="card-body">
            <ul class="list-group peserta-content list-group-flush">
                <li class="list-group-item">
                    <h1 class="card-name">{{ $peserta->nama_peserta }}</h1>
                </li>
                <li class="list-group-item">
                    <div class="list-title">
                        Instansi Pendidikan :
                    </div>
                    {{ $peserta->instansi_pendidikan }}
                </li>
                <li class="list-group-item">
                    <div class="list-title">
                        Jurusan :
                    </div>
                    {{ $peserta->jurusan }}
                </li>
                <li class="list-group-item">
                    <div class="list-title">
                        Nama Pembimbing :
                    </div>
                    @if ($peserta->nama_pembimbing)
                        {{ $peserta->nama_pembimbing }}
                    @else
                        Belum dipilihkan pebimbing
                    @endif
                </li>
            </ul>
        </div>

        <div class="card-footer">
            <a href="" class="btn btn-primary w-100 mb-3">Update</a>
            @if(($kinerja && $kinerja->status_kegiatan) == 'melakukan aktivitas')
                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Logout
                </button>
            @else
                <a href="{{ url('peserta/login') }}" class="btn btn-danger w-100">Logout</a>
            @endif
        </div>
    </div>
</div>
