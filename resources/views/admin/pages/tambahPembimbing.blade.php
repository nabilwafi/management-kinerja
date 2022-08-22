@extends('admin/default')
@section('content')

<div class="app-card app-card-settings shadow-sm p-4">
    <div class="app-card-body">
        <form class="settings-form">
            <div class="mb-3">
                <label for="setting-input-1" class="form-label">Foto</label>
                <input type="text" class="form-control" id="setting-input-1" value="fofo.jpg" required>
            </div>
            <div class="mb-3">
                <label for="setting-input-2" class="form-label">Nama</label>
                <input type="text" class="form-control" id="setting-input-2" value="Steve Doe" required>
            </div>
            <div class="mb-3">
                <label for="setting-input-3" class="form-label">Divisi</label>
                <input type="text" class="form-control" id="setting-input-3" value="pengembangan">
            </div>
            <div class="mb-3">
                <label for="setting-input-4" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="setting-input-4" value="Superdupervisor">
            </div>
            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
        </form>
    </div><!--//app-card-body-->
    
</div><!--//app-card-->

@endsection