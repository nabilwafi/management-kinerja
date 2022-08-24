@extends('/admin/default')
@section('content')


@foreach ($kegiatan as $kegi)
    
<form action="/admin/kegiatan/update/baru" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="kegiatan" class="form-control" id="kegiatan" name="kegiatan" value="{{ $kegi->kegiatan }}">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kegi->keterangan }}">
                </div>
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>
@endforeach

@endsection