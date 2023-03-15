
@extends('_template')

@section('title')Просмотр Издателя@endsection

@section('content')
	<h1>
		Просмотр Издателя
	</h1>

	<table class="table table-bordered mt-3">
		<tbody>
			<tr>
				<td>ID</td>
				<td>{{ $row->publisher_id }}</td>
			</tr>
			<tr>
				<td>Наименование</td>
				<td>{{ $row->publisher_name }}</td>
			</tr>
			<tr>
				<td>Примечание</td>
				<td>{{ $row->publisher_note }}</td>
			</tr>
		</tbody>
	</table>

	<a href="{{ route('publisher-list') }}">Перейти к списку</a>

@endsection
