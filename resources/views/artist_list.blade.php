
@extends('_template')

@section('title')Список Артистов@endsection

@section('content')
	<h1>
		Список Артистов
	</h1>

	<table class="table table-bordered align-middle mt-3">
		<thead>
			<tr>
				<th class="text-center">ID</th>
				<th>Наименование</th>
				<th>Примечание</th>
				<th class="py-1">
					<a class="btn btn-success" href="{{ route('artist-add') }}">Добавить Артиста</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rows as $row)
				<tr>
					<th class="text-center">
						{{ $row->artist_id }}
					</th>
					<td>
						{{ $row->artist_name }}
					</td>
					<td>
						{{ $row->artist_note }}
					</td>
					<td class="py-1">
						<a class="btn btn-primary" href="{{ route('artist-edit', $row->artist_id) }}">Правка</a>
						<a class="btn btn-danger" href="{{ route('artist-del', $row->artist_id) }}">Удаление</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{-- Pagination --}}
	<div class="d-flex">
    	{!! $rows->links() !!}
	</div>

@endsection
