@extends('pembimbing/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">Detail Kinerja</h1>
<div class="container mb-2">
<div class="row justify-content-between">
    {{-- <div class="col-4">
        <form action="/pembimbing/detailkinerja/filtersubkegiatan" method="post">
        @csrf
        @foreach ($kinerja as $kinerjas)
        <input type="hidden" value="{{$kinerjas->id_peserta}}" name="id_peserta">
        @endforeach
        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto pb-2 pt-2" id="pilihsub" name="pilihsub">
            @foreach($sub_kegiatan as $sub_kegiatans)
            <option value='{{$sub_kegiatans->id}}'>{{$sub_kegiatans->sub_kegiatan}}</option>
            {{-- <option value="1" selected>Semua</option>
            <option value="2">Perancangan</option>
            <option value="3">Design</option>
            <option value="3">Ngoding</option> --}}
            {{-- @endforeach --}}
        {{-- </select> --}}
    {{-- </div> --}}
    {{-- <button type="submit" class="btn btn-primary me-2 mt-3 mb-3">Filter</button> --}}
    {{-- @foreach ($kinerja as $kinerjas)
    <a class="btn btn-primary me-2 mt-3 mb-2" href='/pembimbing/filtersubkegiatan/{{$kinerjas->id_kegiatan}}'>Filter Sub Kegiatan</a>
    @endforeach --}}
</form>
    <div class="w-100"></div> {{--create a new row--}}

    <div class="col-4 mt-3">
        <h6 class="">Total Durasi Pengerjaan {{$sub}} :
            @if($total->hours != 00)
            {{ $total->hours }} Jam
        @endif
        @if($total->minutes != 00)
            {{ $total->minutes }} Menit
        @endif
        @if($total->seconds != 00)
            {{ $total->seconds }} Detik
        @endif</h6>
    </div>
    <div class="col-4">
        <a class="btn btn-success offset-md-7" href="#">Export to Excel</a>
    </div>
</div>
</div>

<div class="app-card app-card-orders-table shadow-sm mb-5">
    <div class="app-card-body">
        <div class="table-responsive">
    <table class="table app-table-hover mb-0 text-left">
        <thead>
            <tr>
                {{-- <th class="cell">Tanggal</th> --}}
                {{-- <th class="cell">ID Kegiatan</th> --}}
                <th class="cell">Judul Kegiatan</th>
                <th class="cell">Sub Kegiatan</th>
                <th class="cell">Keterangan</th>
                <th class="cell">Total Pengerjaan</th>
                <th class="cell">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kinerja as $psrt)
            <tr>
                {{-- <td class="cell">{{$psrt->id_kegiatan}}</td> --}}
                <td class="cell">{{$psrt->kegiatan}}</td>
                <td class="cell">{{$psrt->sub_kegiatan}}</td>
                <td class="cell">{{$psrt->keterangan}}</td>
                <td class="cell">
                    @if($psrt->hours != 00)
                        {{ $psrt->hours }} Jam
                    @endif
                    @if($psrt->minutes != 00)
                        {{ $psrt->minutes }} Menit
                    @endif
                    @if($psrt->seconds != 00)
                        {{ $psrt->seconds }} Detik
                    @endif</td>
                <td class="cell">{{ $psrt->status_kegiatan }}</td>
                {{-- <td class="cell">12519205</td>
                <td class="cell">Membuat Aplikasi Management Kinerja Anak Magang</td>
                <td class="cell">Design</td>
                <td class="cell">Merancang design yang user friendly</td>
                <td class="cell">8 Jam</td> --}}
                {{-- <td>
                  <span class="badge bg-success">Selesai</span>
                </td> --}}
            </tr>
            @endforeach
          {{-- @for ($i = 0; $i < 5; $i++)
          <tr>
              <td class="cell">15 Agustus 2022</td>
              <td class="cell">12519205</td>
              <td class="cell">Membuat Aplikasi Management Kinerja Anak Magang</td>
              <td class="cell">Design</td>
              <td class="cell">Merancang design yang user friendly</td>
              <td class="cell">8 Jam</td>
              <td>
                <span class="badge bg-success">Selesai</span>
              </td>
          </tr>
          @endfor --}}
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>
<nav class="app-pagination">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav><!--//app-pagination-->
@endsection

@section('head')
<title>Pembimbing Dashboard | Detail Kinerja</title>
@endsection
