@extends('admin/default')

@section('content')
<h1 class="app-page-title">Kegiatan</h1>
<div class="col-6 col-lg-3 mb-3">
    <a class="btn app-btn-primary" href="/admin/kegiatan/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
      </svg> Tambah Kegiatan</a>
</div>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
            <div class="table-responsive mb-4">
                <table class="table app-table-hover mb-0 text-center">
                        <thead>
                            <tr>
                                <th class="cell">Judul Kegiatan</th>
                                <th class="cell">Keteragan Kegiatan</th>
                                <th class="cell"></th>
                                <th class="cell"></th>
                                <th class="cell"></th>
                                <th class="cell"></th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $kegi)
                            <tr>
                                <td class="cell">{{ $kegi->kegiatan }}</td>
                                <td class="cell">{{ $kegi->keterangan }}</td>
                                <td class="cell">
                                </td>
                                <td class="cell">
                                    <a class="btn btn-primary" href="/admin/kegiatan/addSub">Tambah Sub Kegiatan</a>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-primary" href="/admin/kegiatan/detailKegiatan/{{ $kegi->id }}">Detail</a>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-warning" href="/admin/kegiatan/update/{{ $kegi->id }}">Update</a>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-danger" href="/admin/kegiatan/delete/{{ $kegi->id }}">Delete</a>
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
        
@endsection