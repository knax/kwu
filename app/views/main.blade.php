<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SWO/MRF</title>
	{{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
	{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
	{{ HTML::script('bower_components/moment/min/moment.min.js') }}
	{{ HTML::script('js/jquery.tabletojson.js') }}
	{{ HTML::script('js/script.js') }}
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SWO/MRF</a>
			</div>

			<div class="collapse navbar-collapse" id="navigation">
				<ul class="nav navbar-nav navbar-left">
					@if (Auth::check())
					{{ HTML::generateLi('swo','SWO') }}
					{{ HTML::generateLi('mrf','MRF') }}
					@if (Auth::user()->isAdmin())
					{{ HTML::generateLi('admin/swo','Admin SWO') }}
					{{ HTML::generateLi('admin/mrf','Admin MRF') }}
					@endif
					@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
					<p class="navbar-text">{{{ Auth::user()->full_name }}}</p>
					{{ HTML::generateLi('logout','Logout') }}
					@else
					{{ HTML::generateLi('login','Login') }}
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>