<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Register Peserta</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('template/favicon.ico') }}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('template/assets/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('template/assets/css/portal.css') }}">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{ asset('template/assets/images/app-logo.svg') }}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Pendaftaran Peserta</h2>					
					@if($errors->any())
					@foreach($errors->all() as $err)
					<p class="alert alert-danger">{{ $err }}</p>
					@endforeach
					@endif
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action="{{ url('peserta/register') }}" method="post">  
							@csrf       
							<div class="email mb-3">
								<label class="sr-only" for="nama_peserta">Nama Lengkap</label>
								<input id="nama_peserta" name="nama_peserta" type="text" class="form-control signup-name" placeholder="Nama Lengkap">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="instansi">Instansi</label>
								<input id="instansi" name="instansi" type="text" class="form-control signup-name" placeholder="Instansi">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for ="jurusan">Jurusan</label>
								<input id="jurusan" name="jurusan" type="text" class="form-control signup-name" placeholder="Jurusan">
							</div>							
							<div class="email mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="email" name="email" type="email" class="form-control signup-email" placeholder="Email" >
							</div>
							<div class="password mb-3"for="password">
								<label class="sr-only">Password</label>
								<input id="password" name="password" type="password" class="form-control signup-password" placeholder="Password">
							</div>

							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Sudah punya akun? <a class="text-link" href="{{ url('') }}" >Log in</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

