@extends('pembimbing/layouts/body')

@section('content')
<form action="/pembimbing/tambahpertemuan/baru" method="post">
  @csrf
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Tambah Pertemuan</h4>
                {{-- <p class="card-description">
                  Update Admin Password
                </p> --}}
                  <input type="hidden" name="id_peserta" id="id_peserta" value="{{$data}}">
                  <input type="hidden" name="jam" id="jam" value="">
                  <input type="hidden" name="lokasi" id="lokasi" value="">
                  <input type="hidden" name="status" id="status" value="">
                  <input type="hidden" name="keterangan" id="keterangan" value="">
                  <div class="form-group">
                    <label class="m-1">No Pertemuan</label>
                    <input type="text" class="form-control" id="no_pertemuan" name="no_pertemuan" value="">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Tanggal Pertemuan</label>
                    <input type="date" class="form-control" id="tanggal_pertemuan" name="tanggal_pertemuan">
                  </div>
                  <button type="submit" class="btn btn-primary me-2 mt-3">Submit</button>
                </form>
                  <a class="btn btn-light mt-3" href="/pembimbing/peserta">Cancel</a>
                </div>
              </div>
            </div>
          </div>
          
    @endsection
</body>
</html> 

