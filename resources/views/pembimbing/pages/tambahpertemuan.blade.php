@extends('pembimbing/layouts/body')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Tambah Pertemuan</h4>
                {{-- <p class="card-description">
                  Update Admin Password
                </p> --}}
                <form class="forms-sample">
                  <div class="form-group">
                    <label class="m-1">No Pertemuan</label>
                    <input type="text" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label class="m-1">Tanggal Pertemuan</label>
                    <input type="date" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary me-2 mt-3">Submit</button>
                  <a class="btn btn-light mt-3" href="/pembimbing/detailabsensi/">Cancel</a>
                </form>
              </div>
            </div>
          </div>
    </div>

    @endsection
</body>
</html> 

