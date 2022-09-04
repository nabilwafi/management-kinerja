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
                <form class="forms-sample"  method="post" action="{{ url('peserta/absen/'.$Absensi['id']) }}">
                    @csrf
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
                  </div>
                  <div class="form-group">
                      <label class="m-1">Latitude</label>
                      <button type="button" class="btn btn-warning" onclick="getLocation()"> Cek Lokasi </button>
                      <input type="text" class="form-control" name="latitude" value="" required>
                       {{-- <p id="lokasi" class="form-control" name="lokasi"></p> --}}
                  </div>
                  <div class="form-group">
                    <label class="m-1">Longitude</label>
                    <input type="text" class="form-control" name="longitude" value="" required>
                    {{-- <p id="lokasi" class="form-control" name="lokasi"></p>
                    <button type="button" class="btn btn-warning" onclick="getLocation()"> Cek Lokasi </button> --}}
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
                </form>
              </div>
            </div>
          </div>
    </div>
    <script type="text/javascript">
      // var x = document.getElementById("lokasi");
      
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, showError);
        } 
      }
      
      function showPosition(position) {
      document.querySelector('.forms-sample input[name = "latitude"]').value = position.coords.latitude;
      document.querySelector('.forms-sample input[name = "longitude"]').value = position.coords.longitude;
      }

      function showError(error){
        switch(error.code){
          case error.PERMISSION_DENIED:
            alert('You must Allow The Request For GeoLocation To Fill Out the Form');
            location.reload();
            break;
        }
      }
      </script>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
