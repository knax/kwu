<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ Setting::get('site-title') }}</title>
	{{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
	{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
	{{ HTML::script('bower_components/moment/min/moment.min.js') }}
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">{{ Setting::get('site-title') }}</a>
			</div>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="nav navbar-nav navbar-left">
					@if (Auth::check())
					{{ HTML::generateLi(URL::route('data.index', ['name' => 'swo']),'SWO') }}
					{{ HTML::generateLi(URL::route('data.index', ['name' => 'mrf']),'MRF') }}
					@if (Auth::user()->isAdmin())
					{{ HTML::generateLi(URL::route('admin.approval'),'Admin') }}
					@if (Auth::user()->admin->isSuperAdmin())
					{{ HTML::generateLi(URL::route('admin.super.user'),'Manage User') }}
					{{ HTML::generateLi(URL::route('admin.super.insertnumber'),'Change number') }}
					@endif
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
	{{ HTML::script('js/jquery.tabletojson.js') }}
	{{ HTML::script('js/knax.js') }}
	{{ HTML::script('js/register-handler.js') }}
</body>
</html>