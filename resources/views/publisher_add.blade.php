
@extends('_template')

@section('title')Добавить Издателя@endsection

@section('content')
	<h1>
		Добавить Издателя
	</h1>

	<!--
		Контроллер формы:
		D:\Server\web\test-lara\app\Http\Controllers\PublisherController.php
		Валидация выполняется в:
		D:\Server\web\test-lara\app\Http\Requests\PublisherRequest.php
		Файл миграции
		D:\Server\web\test-lara\database\migrations\2023_03_11_214559_create_publishers_table.php
	-->
	<form class="row" action="{{ route('publisher-save') }}" method="post">
		@csrf
		<div class="col-10">
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">ID:</label>
				<div class="col-lg-8">
					<input type="number" class="form-control" name="publisher_id" disabled>
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Наименование:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="publisher_name" placeholder="Введите наименование">
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Описание:</label>
				<div class="col-lg-8">
					<textarea class="form-control" name="publisher_note" rows="3" placeholder="Введите описание"></textarea>
				</div>
			</div>
			<div class="row mt-3">
				<div class="offset-lg-4 col-lg-8">
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<button type="button" class="btn btn-light" onclick="location.href='{{ route('publisher-list') }}'">Отмена</button>
				</div>
			</div>
		</div>
	</form>

@endsection
