@extends('/admin/default')
@section('content')

<h1 class="app-page-title">Update Peserta</h1>
@foreach ($peserta as $psrt)
<form action="/admin/peserta/update/baru" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <input type="hidden" name="id" value="{{ $psrt->id }}">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $psrt->email }}">
                </div>
                <div class="mb-3">
                    <label for="nama_peserta" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" required value="{{ $psrt->nama_peserta }}">
                </div>
                <div class="mb-3">
                    <label for="instansi_pendidikan" class="form-label">Instansi Pendidikan</label>
                    <input type="text" class="form-control" id="instansi_pendidikan" name="instansi_pendidikan" value="{{ $psrt->instansi_pendidikan }}">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $psrt->jurusan }}">
                </div>
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>
@endforeach

@endsection