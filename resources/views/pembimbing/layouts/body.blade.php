<!DOCTYPE html>
<html lang="en">

<head>
    @include('pembimbing/layouts/head')
</head>

<body class="app">
	{{-- Header --}}
    <header class="app-header fixed-top">
        {{-- Tobar --}}
        @include('pembimbing/layouts/topbar')
        {{-- End Of Topbar --}}

        {{-- Sidebar --}}
        @include('pembimbing/layouts/sidebar')
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

    @include('pembimbing/layouts/script')
</body>

</html>
