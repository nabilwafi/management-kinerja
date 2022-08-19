@extends('peserta/layouts/body')

@section('content')
<h1 class="fs-2 mb-3">History Kegiatan</h1>
<div class="bg-white py-3 px-3 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No Kegiatan</th>
                <th scope="col">Judul Kegiatan</th>
                <th scope="col">Sub Kegiatan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Total Pengerjaan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < 5; $i++)
          <tr>
              <th scope="row">1</th>
              <td>125192052</td>
              <td>Membuat Aplikasi Management Kinerja Anak Magang</td>
              <td>Design</td>
              <td>Merancang design yang user friendly</td>
              <td>8 Jam</td>
              <td>
                <span class="badge bg-success">Selesai</span>
              </td>
          </tr>
          @endfor
        </tbody>
    </table>
</div>
@endsection

@section('head')
<title>Peserta Dashboard | Absensi</title>
@endsection
