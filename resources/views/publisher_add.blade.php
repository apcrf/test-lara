
@extends('_template')

@section('title', 'Добавить Издателя')

@section('content')

	<div class="container">
		<h1 class="h5 mt-3">
			Добавить Издателя
		</h1>

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
						<input type="text" class="form-control" name="publisher_name" value="{{ old('publisher_name') }}" placeholder="Введите наименование">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-form-label col-lg-4 text-lg-end">Описание:</label>
					<div class="col-lg-8">
						<textarea rows="6" class="form-control" name="publisher_note" placeholder="Введите описание"
						>{{ old('publisher_note') }}</textarea>
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
	</div>

@endsection
