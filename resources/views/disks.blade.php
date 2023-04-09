
@extends('_template')

@section('title', 'Каталог Винила и CD')

@section('content')

	<style>
		html, body { height: 100%; }

		/* container-flex */
		.container-flex { display: flex; flex-direction: column; height: calc(100% - 56px); margin-left: 15px; margin-right: 15px; }
		.block-header {  }
		.block-grow { flex: 1 1 auto; overflow-y: auto; min-height: 0px; }
		.block-footer {  }

		/* table-crud */
		.table-crud-thead { overflow-y: scroll; overflow-x: hidden; border-left: 1px solid lightgrey; height: 58px; }
		.table-crud-tbody {
			overflow-y: scroll; border-left: 1px solid lightgrey; border-bottom: 1px solid lightgrey;
			height: calc(100% - 58px); /* 1st Floor - зависимость от высоты заголовка грида */
		}
		.table-crud-thead .table-crud { height: 100%; }
		.table-crud { table-layout: fixed; margin: 0; }
		.table-crud th, .table-crud td { vertical-align: middle; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }

		/* paginator */
		.paginator-btn { width: 50px; }
		.paginator-select { width: fit-content; }

		/* col-width */
		.col-id { width: 130px; }
		.col-artist { width: 360px; }
		.col-disk { width: 460px; }
		.col-publisher { width: 360px; }
		.col-note { width: 560px; }
	</style>

	<div id="app" class="container-flex">
		<!-------------------------------------------------- Блок Header -------------------------------------------------->
		<div class="block-header">
			<div class="row pt-2">
				<div class="col-auto mt-1">
					<h1 class="h4 pt-1">
						<i class="fas fa-compact-disc fa-lg"></i> Каталог Винила и CD
					</h1>
				</div>
				<div class="col-auto mt-1 ms-auto ps-0">
					<div class="input-group">
						<input type="text" class="form-control" v-model="crud.search" autocomplete="off">
						<button type="button" class="btn btn-secondary" v-on:click="rowsLoad()">
							<i class="fas fa-search fa-lg"></i>
						</button>
					</div>
				</div>
				<div class="col-auto mt-1 ms-auto ps-0">
					<button type="button" class="btn btn-success me-2" title="Добавить запись" v-on:click="btnAddOnClick()">
						<i class="fas fa-plus-circle fa-lg"></i> Добавить
					</button>
					<button type="button" class="btn btn-primary me-2" title="Правка записи" v-on:click="btnEditOnClick()">
						<i class="fas fa-edit fa-lg"></i> Правка
					</button>
					<button type="button" class="btn btn-danger" title="Удаление записи" v-on:click="btnDelOnClick()">
						<i class="fas fa-trash-alt fa-lg"></i> Удаление
					</button>
				</div>
			</div>
		</div>

		<!-------------------------------------------------- Блок Grow ---------------------------------------------------->
		<div class="block-grow mt-2">
			<div class="table-crud-thead">
				<table class="table-crud table table-bordered">
					<thead>
						<tr class="text-center">
							<th class="col-id">ID</th>
							<th class="col-artist">Артист</th>
							<th class="col-disk">Наименование</th>
							<th class="col-publisher">Издатель</th>
							<th class="col-note">Примечание</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-crud-tbody" onscroll="crudSynchroScroll(event)">
				<table class="table-crud table table-bordered">
					<tbody>
						<tr
							v-for="row in crud.rows"
							v-bind:style="{'background-color': rowSelectedStyle('crud', row, 'disk_id') ? 'LightYellow' : ''}"
							v-on:click="rowSelectedClick('crud', row, 'disk_id')"
						>
							<td class="col-id text-center" v-text="row.disk_id"></td>
							<td class="col-artist" v-text="row.artist_name"></td>
							<td class="col-disk" v-text="row.disk_name"></td>
							<td class="col-publisher" v-text="row.publisher_name"></td>
							<td class="col-note" v-text="row.disk_note"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-------------------------------------------------- Блок Footer -------------------------------------------------->
		<div class="block-footer">
			<div class="row justify-content-end mb-2">
				<div class="col-auto mt-2">
					<label class="col-form-label">Всего:</label>
					<label class="col-form-label border rounded bg-light px-2 ms-2">@{{crud.paginator.total}}</label>
				</div>
				<div class="col-auto mt-2">
					<div class="input-group">
						<button type="button" class="btn btn-secondary border-0 border-end paginator-btn" v-on:click="paginate('first')">
							<i class="fa-solid fa-backward-fast fa-xl"></i>
						</button>
						<button type="button" class="btn btn-secondary border-0 border-start paginator-btn" v-on:click="paginate('prev')">
							<i class="fa-solid fa-caret-left fa-2xl"></i>
						</button>
						<select class="form-select text-center paginator-select" v-model="crud.paginator.page" v-on:change="paginate()">
							<option v-for="page in crud.paginator.pages" v-bind:value="page">@{{page}}</option>
						</select>
						<label class="input-group-text border-end-0 pe-2">из</label>
						<label class="input-group-text border-start-0 ps-0">@{{crud.paginator.last_page}}</label>
						<button type="button" class="btn btn-secondary border-0 border-end paginator-btn" v-on:click="paginate('next')">
							<i class="fa-solid fa-caret-right fa-2xl"></i>
						</button>
						<button type="button" class="btn btn-secondary border-0 border-start paginator-btn" v-on:click="paginate('last')">
							<i class="fa-solid fa-forward-fast fa-xl"></i>
						</button>
					</div>
				</div>
				<div class="col-auto mt-2">
					<label class="col-form-label">на странице:</label>
					<select class="form-select d-inline text-center ms-2" style="width: 82px;" v-model="crud.paginator.per_page" v-on:change="paginate('per_page')">
						<option v-for="per_page in crud.paginator.per_pages" v-bind:value="per_page">@{{per_page}}</option>
					</select>
				</div>
			</div>
		</div>
	</div> <!-- container-flex -->

	<script src="/js/vue.global.js" type="text/javascript"></script>
	<script src="/js/axios.js" type="text/javascript"></script>
	<script src="/js/app-box.js" type="text/javascript"></script>
	<script src="/js/disks.js" type="text/javascript"></script>

@endsection
