@extends('pembimbing/layouts/body')

@section('content')
<h1 class="app-page-title">List Peserta</h1>
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
                                <th class="cell">Divisi</th>
                                <th class="cell">Absensi</th>
                                <th class="cell"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-1.jpg" alt="user1" width="50px"></td>
                                <td class="cell">John Sanders</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="/pembimbing/detailabsensi">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-2.jpg" alt="user1" width="50px"></td>
                                <td class="cell">Teresa Holland</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="#">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-3.jpg" alt="user1" width="50px"></td>
                                <td class="cell">Dylan Ambrose</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="#">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>                            
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-4.jpg" alt="user1" width="50px"></td>
                                <td class="cell">Jayden Massey</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="#">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>  
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-5.jpg" alt="user1" width="50px"></td>
                                <td class="cell">Reina Brooks</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="#">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cell"><img src="/template/assets/images/users/user-6.jpg" alt="user1" width="50px"></td>
                                <td class="cell">Raymond Atkins</td>
                                <td class="cell">UNIKOM</td>
                                <td class="cell">Sistem Informasi</td>
                                <td class="cell">Aplikasi Web</td>
                                <td class="cell">15</td>
                                <td class="cell text-center">
                                <a class="btn btn-info" href="#">Detail Absensi</a>
                                    <a class="btn btn-primary" href="#">Detail Kinerja</a>
                                </td>
                            </tr>
                            

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