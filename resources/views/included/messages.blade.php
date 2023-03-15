
	@if($errors->any())
		<!-- Вывод сообщений об ошибках -->
		<div class="alert alert-danger mt-3">
			<ul class="mb-0">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(session('success'))
		<!-- Вывод сообщений 'success' -->
		<div class="alert alert-success mt-3">
			{{ session('success') }}
		</div>
	@endif
