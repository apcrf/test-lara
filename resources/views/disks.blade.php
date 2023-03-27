
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

	<style>
		.paginator-btn { width: 50px; }
		.paginator-select { width: fit-content; }
	</style>
	<div class="row justify-content-end">
		<div class="col-auto">
			<label class="col-form-label">Всего:</label>
			<label class="col-form-label ms-1">50</label>
		</div>
		<div class="col-auto">
			<div class="input-group">
				<button type="button" class="btn btn-secondary border-0 border-end paginator-btn">
					<i class="fa-solid fa-backward-fast fa-xl"></i>
				</button>
				<button type="button" class="btn btn-secondary border-0 border-start paginator-btn">
					<i class="fa-solid fa-caret-left fa-2xl"></i>
				</button>
				<select class="form-select text-center paginator-select">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="123">123</option>
				</select>
				<label class="input-group-text border-end-0">из</label>
				<label class="input-group-text border-start-0 ps-0">3</label>
				<button type="button" class="btn btn-secondary border-0 border-end paginator-btn">
					<i class="fa-solid fa-caret-right fa-2xl"></i>
				</button>
				<button type="button" class="btn btn-secondary border-0 border-start paginator-btn">
					<i class="fa-solid fa-forward-fast fa-xl"></i>
				</button>
			</div>
		</div>
		<div class="col-auto mt-2 mt-md-0">
			<label class="col-form-label">на странице:</label>
			<select class="form-select d-inline text-center ms-2" style="width: 82px;">
				<option value="10" selected>10</option>
				<option value="20">20</option>
				<option value="50">50</option>
			</select>
		</div>
	</div>

@endsection
