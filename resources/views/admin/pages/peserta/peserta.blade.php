@extends('admin/default')

@section('content')
<h1 class="app-page-title">Peserta</h1>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Foto</th>
                                <th class="cell">E-mail</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Instansi</th>
                                <th class="cell">Jurusan</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($peserta as $psrt)
                        <tr>
                            <td class="cell"><img src="/template/assets/images/users/{{ $psrt->gambar_peserta }}" width="50px"></td>
                            <td class="cell">{{ $psrt->email }}</td>
                            <td class="cell">{{ $psrt->nama_peserta }}</td>
                            <td class="cell">{{ $psrt->instansi_pendidikan }}</td>
                            <td class="cell">{{ $psrt->jurusan }}</td>
                            <td class="cell text-center">
                            <a class="btn btn-warning" href="/admin/peserta/update/{{ $psrt->id }}">Update</a>
                            <a class="btn btn-danger" href="/admin/peserta/delete/{{ $psrt->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                            

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
    </div><!--//tab-pane-->
</div><!--//tab-content-->
@endsection