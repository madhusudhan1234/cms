<!DOCTYPE html>
<html>
<head>
	<title>Cms System</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="{{ theme('css/backend.css') }}">
</head>
<body>
<nav class="navbar-static-top navbar-inverse">
	<div class="container">
		<div class="navbar-header"><a href="" class="navbar-brand">The CMS</a></div>
		<ul class="nav navbar-nav">
			<li><a href="">Item1</a></li>
			<li><a href="#">Item2</a></li>
			<li><a href="#">Item3</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><span class="navbar-text">Hello Bro</span></li>
			<li><a href="{{ route('auth.logout') }}">Logout</a></li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>@yield('title')</h3>
			@yield('content')
		</div>
	</div>
</div>
</body>
</html>