@extends('/admin/default')
@section('content')
<h1 class="app-page-title">Tambah Kegiatan</h1>

<form action="/admin/kegiatan/tambah/baru" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="kegiatan" class="form-control" id="kegiatan" name="kegiatan">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>

@endsection