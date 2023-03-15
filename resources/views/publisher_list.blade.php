
@extends('_template')

@section('title')Список Издателей@endsection

@section('content')
	<h1>
		Список Издателей
	</h1>

	<table class="table table-bordered align-middle mt-3">
		<thead>
			<tr>
				<th class="text-center">ID</th>
				<th>Наименование</th>
				<th class="py-1">
					<a class="btn btn-success" href="{{ route('publisher-add') }}">Добавить Издателя</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rows as $row)
				<tr>
					<th class="text-center">
						{{ $row->publisher_id }}
					</th>
					<td>
						{{ $row->publisher_name }}
					</td>
					<td class="py-1">
						<a class="btn btn-secondary" href="{{ route('publisher-view', $row->publisher_id) }}">Просмотр</a>
						<a class="btn btn-primary" href="{{ route('publisher-edit', $row->publisher_id) }}">Правка</a>
						<a class="btn btn-danger" href="{{ route('publisher-del', $row->publisher_id) }}">Удаление</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection
