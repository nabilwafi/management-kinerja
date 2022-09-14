<head>
    <title>Detail Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<h1 class="fs-2 mb-3">Detail Absensi</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $peserta }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>: {{ $instansi }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>: {{ $jurusan }}</td>
                </tr>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th >Tanggal Pertemuan</th>
                        <th >No Pertemuan</th>
                        <th >Jam</th>
                        <th >Status</th>
                        <th >Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $absen)
                    <tr>
                        {{-- <td class="cell"><img src="/template/assets/images/users/{{ $psrt->gambar_peserta }}" alt="user1" width="50px"></td> --}}
                        <td>{{ $absen->tanggal_pertemuan }}</td>
                        <td>{{ $absen->no_pertemuan }}</td>
                        <td>{{ $absen->jam }}</td>
                        <td>{{ $absen->status }}</td>
                        <td>{{ $absen->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table>
                <tr>
                    <td>Total Pertemuan</td>
                    <td>: {{ $absensi }}</td>
                </tr>
                <tr>
                    <td>Total Kehadiran</td>
                    <td>: {{ $hadir }}</td>
                </tr>
                <tr>
                    <td>Persentase Kehadiran</td>
                    <td>: {{ $persentase }} %</td>
                </tr>
            </table>
</body>
