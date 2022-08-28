@extends('peserta/layouts/body')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Absensi Peserta</h4>
                {{-- <p class="card-description">
                  Update Admin Password
                </p> --}}
                <form class="forms-sample"  method="post" action="{{ url('peserta/absen/{{ $Absensi->id }}/{{ $Absensi->id_peserta }}') }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="m-1">ID Peserta</label>
                        <input type="text" class="form-control" value="{{ $Absensi['id_peserta'] }}" readonly>
                      </div>
                  <div class="form-group">
                    <label class="m-1">No Pertemuan</label>
                    <input type="text" class="form-control" value="{{ $Absensi['no_pertemuan'] }}" readonly>
                  </div>
                  <div class="form-group">
                    <label class="m-1">Tanggal Pertemuan</label>
                    <input type="date" class="form-control" value="{{ $Absensi['tanggal_pertemuan'] }}" readonly>
                  {{-- <div class="form-group">
                    <label class="m-1">Lokasi</label>
                    {{-- @if ($lokasi)
                    <input type="text" class="form-control" value="{{ $lokasi->zipCode }}" readonly>
                    @endif --}}
                  </div> 
                  <div class="form-group">
                    <label class="m-1">Keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control">
                      <option value="Hadir">Hadir</option>
                      <option value="Tidak Hadir">Sakit</option>
                      <option value="Tidak Hadir">Izin</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary me-2 mt-3">Submit</button>
                  <a class="btn btn-light mt-3" href="/pembimbing/detailabsensi/">Cancel</a>
                </form>
              </div>
            </div>
          </div>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
