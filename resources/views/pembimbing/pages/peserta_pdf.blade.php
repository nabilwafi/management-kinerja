<h1 class="fs-2 mb-3">Detail Kinerja</h1>
        <div class="w-100"></div>
    </div>
</div>
<div class="app-card app-card-orders-table shadow-sm mb-5">
    <div class="app-card-body">
        <div class="table-responsive">
            <table class="table app-table-hover mb-0 text-left">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $nama }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>: {{ $instansi }}</td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td>: {{ $kegiatan }}</td>
                </tr>
                <br>
                <thead>
                    <tr>
                        <td>Sub Kegiatan</td>
                        <td>Total Pengerjaan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($total as $totals)
                    <tr>
                    <td>{{ $totals->sub_kegiatan }}</td>
                    <td class="cell">
                        @if($totals->hours != 00)
                        {{ $totals->hours }} Jam
                        @endif
                        @if($totals->minutes != 00)
                        {{ $totals->minutes }} Menit
                        @endif
                        @if($totals->seconds != 00)
                        {{ $totals->seconds }} Detik
                        @endif
                        @endforeach
                    </td>
                    </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>
