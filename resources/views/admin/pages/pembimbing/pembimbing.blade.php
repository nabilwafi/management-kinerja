@extends('/admin/default')

@section('content')
<h1 class="app-page-title">Pembimbing</h1>
<div class="col-6 col-lg-3 mb-3">
    <a class="btn app-btn-primary" href="/admin/pembimbing/tambah"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
      </svg> Tambah Pembimbing</a>
</div>

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
                                <th class="cell">Password</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Divisi</th>
                                <th class="cell">Jabatan</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pembimbing as $pmbng)
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/{{ $pmbng->gambar_pembimbing }}" width="50px"></td>
                                <td class="cell">{{ $pmbng->email }}</td>
                                <td class="cell">{{ $pmbng->nama_pembimbing }}</td>
                                <td class="cell">{{ $pmbng->divisi }}</td>
                                <td class="cell">{{ $pmbng->jabatan }}</td>
                                <td class="cell text-center">
                                <a class="btn btn-warning" href="/admin/pembimbing/update/{{ $pmbng->id }}">Update</a>
                                <a class="btn btn-danger" href="/admin/pembimbing/delete/{{ $pmbng->id }}">Delete</a>
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