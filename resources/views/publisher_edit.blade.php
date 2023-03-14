
@extends('_template')

@section('title')Правка Издателя@endsection

@section('content')
	<h1>
		Правка Издателя
	</h1>

	<form class="row" action="{{ route('publisher-update', $row->publisher_id) }}" method="post">
		@csrf
		<div class="col-10">
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">ID:</label>
				<div class="col-lg-8">
					<input type="number" class="form-control" name="publisher_id" value="{{ $row->publisher_id }}" disabled>
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Наименование:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="publisher_name" value="{{ $row->publisher_name }}" placeholder="Введите наименование">
				</div>
			</div>
			<div class="row mt-3">
				<label class="col-form-label col-lg-4 text-lg-end">Описание:</label>
				<div class="col-lg-8">
					<textarea class="form-control" name="publisher_note" rows="6" placeholder="Введите описание"
					>{{ $row->publisher_note }}</textarea>
				</div>
			</div>
			<div class="row mt-3">
				<div class="offset-lg-4 col-lg-8">
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<button type="button" class="btn btn-light" onclick="location.href='{{ route('publisher-listing') }}'">Отмена</button>
				</div>
			</div>
		</div>
	</form>

@endsection
