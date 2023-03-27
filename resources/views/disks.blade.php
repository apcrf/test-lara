
@extends('_template')

@section('title', 'Каталог Винила и CD')

@section('content')

	<script defer src="/js/app-box.js" type="text/javascript"></script>
	<script defer src="/js/disks.js" type="text/javascript"></script>

	<h1>
		Каталог Винила и CD
	</h1>

	<style>
		.col-id { width: 130px; }
		.col-artist { width: 360px; }
		.col-disk { width: 360px; }
		.col-note {  }
		.col-btns { width: 205px; }
	</style>
	<table class="table table-bordered mt-4">
		<thead>
			<tr class="align-middle text-center">
				<th class="col-id">ID</th>
				<th class="col-artist">Артист</th>
				<th class="col-disk">Наименование</th>
				<th class="col-note">Примечание</th>
				<th class="col-btns py-1">
					<button type="button" class="btn btn-success" onclick="btnAddOnClick()">Добавить запись</button>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr class="align-middle">
				<td class="col-id text-center">disk_id</td>
				<td class="col-artist">artist_name</td>
				<td class="col-disk">disk_name</td>
				<td class="col-note">disk_note</td>
				<td class="col-btns text-center py-1">
					<button type="button" class="btn btn-primary" onclick="btnEditOnClick()">Правка</button>
					<button type="button" class="btn btn-danger" onclick="btnDelOnClick()">Удаление</button>
				</td>
			</tr>
		</tbody>
	</table>

	<div class="input-group">
		<label class="input-group-text">Всего записей:</label>
		<input type="text" class="form-control">
		<select class="form-select">
			<option value="1" selected>One</option>
			<option value="2">Two</option>
			<option value="3">Three</option>
		</select>
	</div>

@endsection
