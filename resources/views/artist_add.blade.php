
@extends('_template')

@section('title', 'Добавить Артиста')

@section('content')

	<div class="container">
		<h1 class="h5 mt-3">
			Добавить Артиста
		</h1>

		<form class="row" action="{{ route('artist-save') }}" method="post">
			@csrf
			<div class="col-10">
				<div class="row mt-3">
					<label class="col-form-label col-lg-4 text-lg-end">ID:</label>
					<div class="col-lg-8">
						<input type="number" class="form-control" name="artist_id" disabled>
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-form-label col-lg-4 text-lg-end">Наименование:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="artist_name" value="{{ old('artist_name') }}" placeholder="Введите наименование">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-form-label col-lg-4 text-lg-end">Описание:</label>
					<div class="col-lg-8">
						<textarea rows="3" class="form-control" name="artist_note" placeholder="Введите описание">{{ old('artist_note') }}</textarea>
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
	</div>

@endsection
