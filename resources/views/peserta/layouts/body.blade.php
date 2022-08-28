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

    @include('peserta/layouts/script')
</body>

</html>
