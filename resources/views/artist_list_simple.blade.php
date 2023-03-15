
@extends('_template')

@section('title')Список Артистов@endsection

@section('content')
	<h1>
		Список Артистов
	</h1>

	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Наименование</th>
				<th scope="col">Примечание</th>
			</tr>
		</thead>
		<tbody>
			@if(count($rows) > 0)
				@foreach ($rows as $row)
					<tr>
						<th scope="row">{{ $row->artist_id }}</th>
						<td>{{ $row->artist_name }}</td>
						<td>{{ $row->artist_note }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<th colspan="3" class="text-center">No data found</th>
				</tr>
			@endif
		</tbody>
	</table>
	{!! $rows->links() !!}

@endsection
