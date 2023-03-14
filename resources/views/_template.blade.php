<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="test">
	<meta name="keywords" content="test">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.png" type="image/png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" type="text/css">
	<title>@yield('title')</title>
</head>
<body>

	@include('included.header')
	
	<div class="container">

		@if(Request::is('about'))
			<div class="alert alert-primary mt-3 mb-0">
				Привет всем на нашем сайте!
			</div>
		@endif

		@include('included.messages')

		@if(Request::is('/') || Request::is('about'))
			<div class="row">
				<div class="col-12 col-lg-9 my-3">
					@yield('content')
				</div>
				<div class="col-12 col-lg-3 my-3">
					@include('included.aside')
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-12 my-3">
					@yield('content')
				</div>
			</div>
		@endif

	</div> <!-- container -->

</body>
</html>
