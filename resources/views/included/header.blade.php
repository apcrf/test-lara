
<!-- Главное меню -->

<script>
	//**************************************************************************************************
	// Показ / Скрытие меню на мобильных устройствах
	//**************************************************************************************************

	function navbarBtnClick(elm) {
		elm.blur();
		document.getElementById("collapse").classList.toggle("show");
	}

	//**************************************************************************************************
	// Показ / Скрытие меню вложенных
	//**************************************************************************************************

	function navbarLinkClick(elm) {
		var elmDropdown = elm.parentNode.querySelector(".dropdown-menu");
		// Остальные скрыть
		var elms = document.getElementsByClassName("dropdown-menu");
		Array.from(elms).forEach((elm) => {
			if (elm != elmDropdown) {
				elm.classList.remove("show");
			}
		});
		// Кликнутое показать / скрыть
		if (elmDropdown) {
			elmDropdown.classList.toggle("show");
		}
	}

	//**************************************************************************************************
	// Скрытие меню вложенных при клике мимо меню
	//**************************************************************************************************

	document.addEventListener("click", function(event) {
		// Поиск открытого меню вложенного
		var elmShowing = null;
		var elms = document.getElementsByClassName("dropdown-menu");
		Array.from(elms).forEach((elm) => {
			if (elm.classList.contains("show")) {
				elmShowing = elm;
			}
		});
		// Скрытие меню вложенного, если клик не по его пункту из меню верхнего уровня
		if (elmShowing) {
			if ( !elmShowing.parentNode.contains(event.target) && !elmShowing.contains(event.target) ) {
				elmShowing.classList.remove("show");
			}
		}
	});

	//**************************************************************************************************
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<!-- siteName -->
		<a class="navbar-brand" href="{{ route('disks') }}" title="Главная страница">
			<span class="text-primary">Test Disks</span>
		</a>
		<!-- toggler -->
		<button type="button" class="navbar-toggler" onclick="navbarBtnClick(this)" title="Меню сайта">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- collapse -->
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!-- menuMain -->
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('disks') }}">Каталог Дисков</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" onclick="navbarLinkClick(this)">
						Справочник Артистов
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('artist-list') }}">Список Артистов - paginate</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="{{ route('artist-list-simple') }}">Список Артистов - simplePaginate</a></li>
						<li><a class="dropdown-item" href="{{ route('artist-add') }}">Добавить Артиста</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('publisher-list') }}">Справочник Издателей</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" onclick="navbarLinkClick(this)">
						Прочее
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('about') }}">О проекте</a></li>
						<li><a class="dropdown-item" href="/emptypage">Пустая страница</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="{{ route('welcome') }}">Welcome</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
