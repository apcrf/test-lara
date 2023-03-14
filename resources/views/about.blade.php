
@extends('_template')

@section('title')О проекте@endsection

@section('content')
	<h1>
		О проекте
	</h1>
	<p>Каталог Винила и CD</p>
	<p>apcrf.me@gmail.com</p>
@endsection

@section('aside')
	<p>Дополнительный текст сверху</p>
	@parent
	<p>Дополнительный текст снизу</p>
@endsection
