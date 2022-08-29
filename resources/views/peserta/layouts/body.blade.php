<!DOCTYPE html>
<html lang="en">

<head>
    @include('peserta/layouts/head')
</head>

<body class="bg-light">
	{{-- Header --}}
    @include('peserta/layouts/topbar')
	{{-- End of Header --}}

    <div class="app-wrapper">
			{{-- Content --}}
			<div class="app-content pt-3 p-md-3 p-lg-4">
					@yield('content')
			</div>
			{{-- End of Content --}}
    </div>
    <!--//app-wrapper-->

		<div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<form action="/peserta/update/{{ $kinerja->id ? $kinerja->id : $kegiatan->id_kegiatan }}/{{ $kinerja->id_peserta }}" method="post">
				@csrf
				@method('PATCH')

				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Akhiri Kegiatan</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body modal-content">
										<textarea class="form-control" placeholder="keterangan" name="keterangan" id="editor" rows="15"></textarea>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-danger">Submit</button>
								</div>
						</div>
				</div>
			</form>
	</div>

    @include('peserta/layouts/script')
</body>

</html>
