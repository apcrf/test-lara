
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
		<a class="navbar-brand" href="{{ route('homepage') }}" title="Главная страница">
			<span>Test Lara</span>
		</a>
		<!-- toggler -->
		<button type="button" class="navbar-toggler" onclick="navbarBtnClick(this)" title="Меню сайта">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- collapse -->
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!-- menuMain -->
				<!--
				<li class="nav-item">
					<a class="nav-link active" href="{{ route('homepage') }}">Главная</a>
				</li>
				-->
				<li class="nav-item">
					<a class="nav-link" href="{{ route('about') }}">О проекте</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" onclick="navbarLinkClick(this)">
						Издатель
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('publisher-listing') }}">Список Издателей</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="{{ route('publisher-add') }}">Добавить Издателя</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" onclick="navbarLinkClick(this)">
						Меню
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Меню 1</a></li>
						<li><a class="dropdown-item" href="#">Меню 2</a></li>
						<li><a class="dropdown-item" href="#">Меню 3</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="/welcome">Welcome</a></li>
					</ul>
				</li>
			</ul>
			<!-- menuSearch -->
			<form class="d-flex">
				<input type="search" class="form-control me-2" placeholder="Поиск">
				<button type="submit" class="btn btn-outline-success">Поиск</button>
			</form>
		</div>
	</div>
</nav>
