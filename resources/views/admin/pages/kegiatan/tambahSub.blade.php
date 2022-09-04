@extends('/admin/default')
@section('content')
<h1 class="app-page-title">Tambah Sub Kegiatan</h1>

<form action="/admin/kegiatan/tambah/saveSub" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <div class="mb-3 after-add-more">
                    @foreach ($kegiatan as $kegi)
                    <input type="hidden" name="id_kegiatan" value="{{ $kegi->id }}">
                    @endforeach
                    <label for="subkegiatan" class="form-label">Sub Kegiatan</label> 
                    <button  type="button" class="btn app-btn-primary add-more mb-3">add
                    </button>
                    <input type="subkegiatan" class="form-control" id="subkegiatan" name="subkegiatan[]">
                </div>
                
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>

<div class="copy invisible">
    <div class="mb-3">
        <label for="subkegiatan" class="form-label">Sub Kegiatan</label>
        <input type="subkegiatan" class="form-control" id="subkegiatan" name="subkegiatan[]">
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".add-more").click(function(){ 
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });
    });
</script>

@endsection