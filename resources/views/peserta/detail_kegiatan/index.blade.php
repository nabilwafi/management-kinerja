@extends('peserta/layouts/body')

@section('content')
<div class="card">
  <div class="card-body">
      <h5 class="card-title">Membuat Aplikasi Management Kinerja Anak Magang</h5>
      <p class="card-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore non rerum doloremque possimus eaque maiores, ducimus architecto iusto, quas exercitationem blanditiis ex. Reprehenderit nihil officiis rem architecto et, esse optio.
      </p>
      <form class="text-end d-flex align-items-center justify-content-end" action="" method="post">
        <div class="form-floating me-3">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected hidden>Open this select menu</option>
            <option value="Design">Design</option>
            <option value="Coding">Coding</option>
            <option value="Testing">Testing</option>
          </select>
          <label for="floatingSelect">Works with selects</label>
        </div>

        <button class="d-none btn btn-lg btn-primary text-white py-3 px-5" id="btn-submit" type="submit">Start</button>
      </form>
  </div>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Detail Kegiatan</title>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).on('change', function() {
    $('#btn-submit').removeClass('d-none');
  });
</script>
@endsection