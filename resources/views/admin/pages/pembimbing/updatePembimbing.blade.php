@extends('/admin/default')
@section('content')

@foreach ($pembimbing as $pmbng)
    
<form action="/admin/pembimbing/update/baru" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <input type="hidden" name="id" value="{{ $pmbng->id }}">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $pmbng->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required value="{{ $pmbng->password }}">
                </div>
                <div class="mb-3">
                    <label for="gambar_pembimbing" class="form-label">Foto</label>
                    <input type="text" class="form-control" id="gambar_pembimbing" name="gambar_pembimbing" required value="{{ $pmbng->gambar_pembimbing }}">
                </div>
                <div class="mb-3">
                    <label for="nama_pembimbing" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" required value="{{ $pmbng->nama_pembimbing }}">
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{ $pmbng->divisi }}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $pmbng->jabatan }}">
                </div>
                <button type="submit" class="btn app-btn-primary" >Tambah</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>
@endforeach

@endsection