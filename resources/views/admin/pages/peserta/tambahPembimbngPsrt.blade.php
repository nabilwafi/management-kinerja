@extends('/admin/default')
@section('content')
<h1 class="app-page-title">Tambah Pembimbing Kegiatan</h1>

@foreach ($peserta as $psrt)
<form action="/admin/peserta/tambah/savePem/{{ $psrt->id }}" method="post">
    @csrf
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form class="settings-form">
                <div class="mb-3 after-add-more">
                    <input type="hidden" name="id" value="{{ $psrt->id }}">
                    @endforeach
                    <select class="form-select" name="id_pem" id="floatingSelect" aria-label="Floating label select example">
                        <option selected hidden>Pembimbing</option>
                        @foreach ($pembimbing as $pmb)
                        <option value="{{ $pmb->id }}">{{ $pmb->nama_pembimbing }}</option>
                        @endforeach
                      </select>
                </div>
                
                <button type="submit" class="btn app-btn-primary" >Update</button>
            </form>
        </div><!--//app-card-body-->
        
    </div><!--//app-card-->
</form>


@endsection