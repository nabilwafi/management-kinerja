@extends('admin/default')

@section('content')
<h1 class="app-page-title">dashboard admin</h1>
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Peserta</h4>
                <div class="stats-figure">{{ $peserta->count() }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="/admin/peserta"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Pembimbing</h4>
                <div class="stats-figure">{{ $pembimbing->count() }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="/admin/pembimbing"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Kegiatan</h4>
                <div class="stats-figure">{{ $kegiatan->count() }}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="/admin/kegiatan"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->
@endsection