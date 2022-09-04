<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Login Peserta</title>
    
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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{ asset('template/assets/images/app-logo.svg') }}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in Peserta</h2>
					@if(session()->has('message'))
              <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
              </div>
              @endif
					@if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ Session::get('error_message')}}
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> --}}
              </div>
              @endif
             	 	@if ($errors->any())
                	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 	 @foreach ($errors->all() as $error)
                 	 <li>{{ $error }}</li>
                	@endforeach
                	</div>
              		@endif
						@if(session('success'))
							<p class="alert alert-success">{{ session('success') }}</p>
						@endif
						@if($errors->any())
						@foreach($errors->all() as $err)
							<p class="alert alert-danger">{{ $err }}</p>
						@endforeach
						@endif
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="{{ url('peserta/login') }}">        
							@csrf 
							<div class="email mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="email" name="email" type="email" class="form-control" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="password">Password</label>
								<input id="password" name="password" type="password" class="form-control" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="{{ url('form/register') }}" >here</a>.</div>
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
				    
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

