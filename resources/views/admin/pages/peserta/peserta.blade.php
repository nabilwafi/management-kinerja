@extends('admin/default')

@section('content')
<h1 class="app-page-title">ini adalah Halaman peserta uhuuyy</h1>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Foto</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Instansi</th>
                                <th class="cell">Jurusan</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($peserta as $psrt)
                        <tr>
                            <td class="cell"><img src="/template/assets/images/users/{{ $psrt->gambar_peserta }}" alt="user1" width="50px"></td>
                            <td class="cell">{{ $psrt->nama_peserta }}</td>
                            <td class="cell">{{ $psrt->instansi_pendidikan }}</td>
                            <td class="cell">{{ $psrt->jurusan }}</td>
                            <td class="cell text-center">
                            <a class="btn btn-danger" href="#">Delete</a>
                                <a class="btn btn-warning" href="#">Update</a>
                            </td>
                        </tr>
                        @endforeach
                            

                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
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
        
    </div><!--//tab-pane-->
</div><!--//tab-content-->
@endsection