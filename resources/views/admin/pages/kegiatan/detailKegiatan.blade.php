@extends('/admin/default')

@section('content')
<h1 class="app-page-title">Detail Kegiatan</h1>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive mb-4">
                    @foreach ($kegiatan as $kegi)
                    <h1 class="app-page-title">{{ $kegi->kegiatan }}</h1>
                    @endforeach
                    <table class="table app-table-hover mb-0 text-center">
                        <thead>
                            <tr>
                                <th class="cell">Sub Kegiatan</th>
                                <th class="cell"></th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        @foreach ($subkegiatan as $sk)
                        <tbody>
                            <tr>
                                <input type="hidden" name="id" value="{{ $sk->id_kegiatan }}">
                                <td class="cell">{{ $sk->sub_kegiatan }}</td>
                                <td class="cell">
                                    <a class="btn btn-warning" href="/admin/kegiatan/detailKegiatan/update/{{ $sk->id }}">Update</a>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-danger" href="/admin/kegiatan/detailKegiatan/delete/{{ $sk->id }}">Delete</a>
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