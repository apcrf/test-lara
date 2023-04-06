
@extends('_template')

@section('title', 'Справочник Артистов')

@section('content')

	<div class="container">
		<h1 class="h5 mt-3">
			Справочник Артистов
		</h1>

		<table class="table table-bordered table-hover mt-3">
			<thead>
				<tr class="align-middle text-center">
					<th>ID</th>
					<th>Наименование</th>
					<th>Примечание</th>
				</tr>
			</thead>
			<tbody>
				@if(count($rows) > 0)
					@foreach ($rows as $row)
						<tr class="align-middle">
							<td>{{ $row->artist_id }}</td>
							<td>{{ $row->artist_name }}</td>
							<td>{{ $row->artist_note }}</td>
						</tr>
					@endforeach
				@else
					<tr class="align-middle text-center">
						<td colspan="3">No data found</td>
					</tr>
				@endif
			</tbody>
		</table>
		{!! $rows->links() !!}
	</div>

@endsection
