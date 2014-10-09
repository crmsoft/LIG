<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lig</title>
	<link rel="shortcut icon" type="image/jpeg" href="http://localhost/fener/public/media/img/favicon.jpeg"/>
	<!-- Latest compiled and minified CSS -->
	{{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css'); }}
	<!-- Optional theme -->
	{{ HTML::style('bower_components/bootstrap/dist/css/bootstrap-theme.min.css'); }}
	{{ HTML::style('/media/css/main.css'); }}
</head>
<body>

	@include('layout/navigation')

	<div class="container my-container">
			@yield('content')
	</div>

	@include('layout/footer')


	<!-- Latest compiled and minified JavaScripts -->
	{{ HTML::script('bower_components/jquery/dist/jquery.min.js'); }}
	{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js'); }}
	@if(Route::currentRouteName() == 'start-new-game')
		{{ HTML::script('media/js/newGame.js'); }}
	@endif
	@if(Route::currentRouteName() == 'play-given')
		{{ HTML::script('media/js/hakem.js'); }}
	@endif
</body>
</html>
