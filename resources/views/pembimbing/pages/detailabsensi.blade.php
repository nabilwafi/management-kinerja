@extends('pembimbing/layouts/body')

@section('content')
<h1 class="app-page-title">Detail Absensi {{$peserta}}</h1>
<p>Total Pertemuan:{{$absensi}}</p>
<p>Total Kehadiran:{{$hadir}}</p>
<p>Persentase Kehadiran:{{round($persentase,2)}}%</p>
<a class="btn btn-primary mb-3" href="/pembimbing/tambahpertemuan/{{$ids}}">Tambah Pertemuan</a>
<a class="btn btn-warning mb-3" href="/pembimbing/peserta/cetak_absensi/{{ $ids }}">Cetak Detail Absensi</a>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Tanggal Pertemuan</th>
                                <th class="cell">No Pertemuan</th>
                                <th class="cell">Jam</th>
                                <th class="cell">Lokasi</th>
                                <th class="cell">Status</th>
                                <th class="cell">Keterangan</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAbsensi as $absen)
                            <tr>
                                {{-- <td class="cell"><img src="/template/assets/images/users/{{ $psrt->gambar_peserta }}" alt="user1" width="50px"></td> --}}
                                <td class="cell">{{ $absen['tanggal_pertemuan'] }}</td>
                                <td class="cell">{{ $absen['no_pertemuan'] }}</td>
                                <td class="cell">{{ $absen['jam'] }}</td>
                                <td class="cell">
                                    @if($absen['latitude']!=NULL && $absen['longitude']!=NULL)
                                    <iframe src="https://www.google.com/maps?q={{$absen['latitude']}},{{$absen['longitude']}}&z=15&output=embed" width="" height=""></iframe>
                                </td>
                                @endif
                                <td class="cell">{{ $absen->status }}</td>
                                <td class="cell">{{ $absen->keterangan }}</td>
                                {{-- <td class="cell">{{ $psrt->instansi_pendidikan }}</td> --}}
                                {{-- <td class="cell">{{ $psrt->jurusan }}</td> --}}
                                <td class="cell text-center">
                                <a class="btn btn-danger" href="/pembimbing/detailabsensi/delete/{{$absen->id}}">Delete</a>
                                    <a class="btn btn-warning" href="/pembimbing/editabsensi/{{$absen->id}}">Update</a>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td class="cell">15 Agustus 2022</td>
                                <td class="cell">1</td>
                                <td class="cell">09:30</td>
                                <td class="cell">Diskominfo Bandung</td>
                                <td class="cell"><span class="badge bg-success">HADIR</span></td>
                                <td class="cell">Pertemuan pertama dan pengenalan</td>
                                <td class="cell text-center">
                                <a class="btn btn-danger" href="#">Delete</a>
                                    <a class="btn btn-warning" href="/pembimbing/editabsensi">Update</a>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->

            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
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
        </nav>
        <!--//app-pagination-->

    </div>
    <!--//tab-pane-->
</div>
<!--//tab-content-->
@endsection