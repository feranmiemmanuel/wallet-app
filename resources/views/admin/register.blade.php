<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/style.css')}}">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="{{route('register')}}" method="POST" class="login-email">
			@csrf
			@if(session()->has('message'))
				<script>alert('{{ session()->get('message') }}')</script>
            @endif
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="name">
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="password_confirmation">
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="{{route('login')}}">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
