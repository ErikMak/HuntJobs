<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a>Конструктор публикаций</a>
	</div>
	<!-- Header Card -->
	<div class="main-header py-3 d-flex flex-column">
		<h3 class="fw-semibold">Создать вакансию</h3>
	</div>
	<div class="container">
		<form id="create-vacancy">
		<div class="row">
			<div class="col">
			  <div class="mb-1">
			    <label class="form-label">Заголовок</label>
			    <input id="vacancy-header" type="text" class="form-control">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-1">
			    <label class="form-label">Зарплата</label>
			    <div class="d-flex">
					<button type="button" class="btn btn-plus btn-light me-3"><i class="fas fa-plus"></i></button>
			    	<input id="vacancy-salary" type="text" class="form-control" value="0">
			    	<button type="button" class="btn btn-minus btn-light ms-3"><i class="fas fa-minus"></i></button>
			    </div>
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-1">
			  	<label class="form-label">Категория</label>
			    <select class="form-select" id="vacancy-category">
				  <option value="0" selected>Открыть список доступных категорий</option>
				  <option value="web_programist">Web-программист</option>
				  <option value="sistemnyi_administrator">Системный администратор</option>
				  <option value="sistemnyi_programist">Системный программист</option>
				</select>
				<small class="error-msg hide ms-2">error</small>
			  </div>
			</div>
			<div class="col">
				<div class="mb-1">
					<div class="form-label">Описание</div>
					<textarea id="requirements" rows="3" class="form-control py-1 px-2" ></textarea>
					<div class="form-text">Краткое описание предлагаемой работы.</div>
					<small class="error-msg hide ms-2">error</small>
			  	</div>
				<button type="button" id="btn-create" class="btn btn-primary py-0 px-4 text-nowrap">Создать</button>
			</div>
		</div>
		</form>	
	</div>			
</main>