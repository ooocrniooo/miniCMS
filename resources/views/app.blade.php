<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>miniCMS</title>

	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/all.css" rel="stylesheet">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">miniCMS</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					@if (Auth::guest())
						<li><a href="/">Home</a></li>
						<li><a href="/pages/list">Show Pages</a></li>
						<li><a href="/">Show News</a></li>
						<li><a href="/">Show Events</a></li>
					@else
						<li><a href="/">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Add <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/pages/add">Add Page</a></li>
								<li><a href="/news/add">Add News</a></li>
								<li><a href="/events/add">Add Event</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">List <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/pages/list">List Pages</a></li>
								<li><a href="/news/list">List News</a></li>
								<li><a href="/events/list">List Events</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bookings <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/management/eventtransfer">List Events</a></li>
								<li><a href="/management/transtransfer">List Transfers</a></li>
								<li><a href="#">List Excursions</a></li>
							</ul>
						</li>


					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Options <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/options/event">Events</a></li>
								<li><a href="/options/transferoptions">Transfers</a></li>
								<li><a href="/options/pages">Pages</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
	<script src="/js/all.js"></script>

	<script src="/js/transition.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>
