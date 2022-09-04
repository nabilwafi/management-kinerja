@extends('/admin/default')
@section('content')


@foreach ($subkegiatan as $sk)
    
<form action="/admin/kegiatan/detailKegiatan/saveUpdateSub" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <input type="hidden" name="id" value="{{ $sk->id }}">
                <div class="mb-3">
                    <label for="sub_kegiatan" class="form-label">Sub Kegiatan</label>
                    <input type="sub_kegiatan" class="form-control" id="sub_kegiatan" name="sub_kegiatan" value="{{ $sk->sub_kegiatan }}">
                </div>
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>
@endforeach

@endsection