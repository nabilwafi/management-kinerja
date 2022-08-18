<!DOCTYPE html>
<html lang="en">

<head>
    @include('peserta/layouts/head')
</head>

<body class="app">
	{{-- Header --}}
    <header class="app-header fixed-top">
        {{-- Tobar --}}
        @include('peserta/layouts/topbar')
        {{-- End Of Topbar --}}

        {{-- Sidebar --}}
        @include('peserta/layouts/sidebar')
        {{-- End Of Sidebar --}}
    </header>
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
