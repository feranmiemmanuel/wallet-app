<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/style.css')}}">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="{{route('login')}}" method="POST" class="login-email">
			@csrf
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="{{route('register_view')}}">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>
