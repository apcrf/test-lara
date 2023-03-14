
@extends('_template')

@section('title')Просмотр Издателя@endsection

@section('content')
	<h1>
		Просмотр Издателя
	</h1>

	<table class="table table-bordered mt-3">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Наименование</th>
				<th scope="col">Примечание</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>
					{{ $row->publisher_id }}
				</th>
				<td>
					{{ $row->publisher_name }}
				</td>
				<td>
					{{ $row->publisher_note }}
				</td>
			</tr>
		</tbody>
	</table>

	<a href="{{ route('publisher-listing') }}">Перейти к списку</a>

@endsection
