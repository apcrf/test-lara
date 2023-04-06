<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="test">
	<meta name="keywords" content="test">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="/libs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/libs/fontawesome/css/all.css">
	<title>@yield('title')</title>
</head>
<body>

	@include('included.header')

	@include('included.messages')

	@if(Request::is('about'))
		<div class="container">
			<div class="alert alert-primary mt-3 mb-0">
				Привет всем на нашем сайте!
			</div>
		</div>
	@endif

	@if(Request::is('about') || Request::is('emptypage'))
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 my-3">
					@yield('content')
				</div>
				<div class="col-12 col-lg-3 my-3">
					@include('included.aside')
				</div>
			</div>
		</div>
	@else
		@yield('content')
	@endif

</body>
</html>
