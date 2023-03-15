
@extends('_template')

@section('title')Правка Артиста@endsection

@section('content')
	<h1>
		Правка Артиста
	</h1>

	<form class="row" action="{{ route('artist-update', $row->artist_id) }}" method="post">
		@csrf
		<div class="col-10">
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">ID:</label>
				<div class="col-lg-8">
					<input type="number" class="form-control" name="artist_id" value="{{ $row->artist_id }}" disabled>
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Наименование:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="artist_name" value="{{ $row->artist_name }}" placeholder="Введите наименование">
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Описание:</label>
				<div class="col-lg-8">
					<textarea rows="3" class="form-control" name="artist_note" placeholder="Введите описание">{{ $row->artist_note }}</textarea>
				</div>
			</div>
			<div class="row mt-3">
				<div class="offset-lg-4 col-lg-8">
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<button type="button" class="btn btn-light" onclick="location.href='{{ route('artist-list') }}'">Отмена</button>
				</div>
			</div>
		</div>
	</form>

@endsection
