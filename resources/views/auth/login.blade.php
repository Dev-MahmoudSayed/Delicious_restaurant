<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
    
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('registerPage/css/nunito-font.css') }}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('registerPage/css/style.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="{{ asset('front/img/slide/slide-1.jpg') }}" width="600" height="500" alt="form">
			</div>
			<form class="form-detail" action="{{ route('login') }}" method="post">
                @csrf
				<h2>login Form</h2>
				
				<div class="form-row mb-5">
                  
					<input id="email" type="email" placeholder="Email"
                    
					class="input-text @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required
					autocomplete="email" autofocus>
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				<div class="form-row mb-5">
                    
					<input id="password" type="password" placeholder="Password"
					class="form-control @error('password') is-invalid @enderror"
					name="password" required autocomplete="current-password">

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				</div>
				
					
				
				<div class="form-row-last">
					<button type="submit" class="register"  >
						{{ __(' Login') }}
					</button>
                   
				</div>
              <h4> <a href="{{ route('register') }}"  > <span class="badge rounded-pill bg-info  text-dark"> Create New Account-></span></h1> 
                
            </a>
              
			</form>
		</div>
	</div>
</body><!--  -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>