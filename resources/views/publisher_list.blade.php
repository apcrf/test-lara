
@extends('_template')

@section('title', 'Справочник Издателей')

@section('content')

	<script defer src="/js/app-box.js" type="text/javascript"></script>
	<script defer src="/js/publisher_list.js" type="text/javascript"></script>

	<div class="container">
		<h1 class="h5 mt-3">
			Справочник Издателей
		</h1>

		<table class="table table-bordered table-hover mt-3">
			<thead>
				<tr class="align-middle text-center">
					<th class="text-center">ID</th>
					<th>Наименование</th>
					<th>Примечание</th>
					<th class="py-1">
						<a class="btn btn-success" href="{{ route('publisher-add') }}">Добавить Издателя</a>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($rows as $row)
					<tr class="align-middle">
						<th class="text-center">
							{{ $row->publisher_id }}
						</th>
						<td>
							{{ $row->publisher_name }}
						</td>
						<td>
							{{ $row->publisher_note }}
						</td>
						<td class="py-1">
							<a class="btn btn-secondary" href="{{ route('publisher-view', $row->publisher_id) }}">Просмотр</a>
							<a class="btn btn-primary" href="{{ route('publisher-edit', $row->publisher_id) }}">Правка</a>
							<button type="button" class="btn btn-danger" onclick="btnDelOnClick({{ $row->publisher_id }})">Удаление</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection
