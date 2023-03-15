
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
			@if(count($artists) > 0)
				@foreach ($artists as $artist)
					<tr>
						<th scope="row">{{ $artist->artist_id }}</th>
						<td>{{ $artist->artist_name }}</td>
						<td>{{ $artist->artist_note }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<th colspan="3" class="text-center">No data found</th>
				</tr>
			@endif
		</tbody>
	</table>
	{!! $artists->links() !!}

@endsection
