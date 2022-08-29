@extends('pembimbing/layouts/body')

@section('content')
@foreach ($absensi as $psrt)
<form action="/pembimbing/editabsensi/update" method="post">
  @csrf
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Update</h4>
                {{-- <p class="card-description">
                  Update Admin Password
                </p> --}}
                <input type="hidden" id="id" name="id" value="{{$psrt->id}}">
                <input type="hidden" id="id_peserta" name="id_peserta" value="{{$psrt->id_peserta}}">
                  <div class="form-group">
                    <label class="m-1">No Pertemuan</label>
                    <input type="text" class="form-control" id="no_pertemuan" name="no_pertemuan" value="{{$psrt->no_pertemuan}}">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Tanggal Pertemuan</label>
                    <input type="date" id="tanggal_pertemuan" name="tanggal_pertemuan" class="form-control" value="{{$psrt->tanggal_pertemuan}}">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Jam</label>
                    <input type="text" readonly class="form-control" id="jam" name="jam" value="{{$psrt->jam}}">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Lokasi</label>
                    <input type="text" readonly class="form-control" id="lokasi" name="lokasi" value="{{$psrt->lokasi}}">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Status</label>
                    <select name="status" id="status" class="form-control">
                      <option value="terverifikasi">Terverifikasi</option>
                      <option value="belum terverifikasi">Belum Terverifikasi</option>
                      <option value="menunggu terverifikasi">Menunggu Terverifikasi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="m-1">Keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control">
                      <option value="Hadir">Hadir</option>
                      <option value="Sakit">Sakit</option>
                      <option value="Izin">Izin</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary me-2 mt-3">Submit</button>
                  <a class="btn btn-light mt-3" href="/pembimbing/detailabsensi/">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </form>
          @endforeach
    @endsection
</body>
</html> 
