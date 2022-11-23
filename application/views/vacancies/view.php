<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a href="/vacancies?category=<? echo $category; ?>"><? echo $link; ?></a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a><? echo $title ?></a>
	</div>
	<!-- Vacancy Header -->
	<div class="main-header py-3 d-flex flex-column">
		<h3 class="fw-semibold">&#128293;&#32;<? echo $title; ?></h3>
		<h5 class="fw-normal">от <? echo number_format($salary, 0, '.', ' ');?> руб. на руки</h5>
	</div>
	<!-- Vacancy Desc -->
	<div class="vacancy-description-card px-4 py-3 mb-3" id="desc">
	    <p class="m-0"><? echo $description; ?></p>
		<hr>
		<div class="row">
				<div class="vacancy-info col d-flex flex-column fs-6">
					<p class="m-0">Опубликовано:&#32;<a class="text-decoration-underline">Felipe Conbar</a><small style="color: #6a6b6f">&#32;(<? echo $timestamp; ?>)</small></p>
					<p class="m-0">Санкт-Петербург</p>
				</div>
				<div class="vacancy-info col d-flex flex-column align-items-end">
					<button type="button" class="btn btn-danger py-0 px-3 text-nowrap" data-toggle="modal" data-target="#myModal">Откликнуться</button>
				</div>
		</div>
	</div>
	<div class="requests-card">
		<div class="requests-title">
			<ul class="list-group list-group-horizontal">
				<li class="list-group-item text-white">Ответы <span class="badge rounded-pill text-bg-light ms-1">9</span></li>
			</ul>
			<hr class="m-0 opacity-100">
		</div>
		<div class="requests-item">
			<hr>
			<div class="d-flex">
				<img src="/files/img/img_avatar.png" class="img-thumbnail me-3">
				<div class="d-flex flex-column">
					<div class="d-flex align-items-center">
						<a href="#" class="text-decoration-underline me-1">vitalij86-86</a>
						<span>&ndash;</span>
						<a class="text-decoration-underline ms-1" href="" style="color: #c2393d"><small>ответить</small></a>
					</div>
					<div class="d-flex flex-column">
						<b class="mb-2">Петров Петр Петрович</b>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Возраст:&#32;20 лет
						</p>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Опыт работы:&#32;2 года
						</p>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Образование:&#32;Высшее
						</p>
						<p class="mb-2">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Требования:&#32;Уютный офис недалеко от дома
						</p>
						<b class="mb-2 fw-semibold">Контактная информация</b>
						<small class="mb-1">
							<i class="far fa-phone-alt me-2"></i>Телефон&#32;&ndash;&#32;
						</small>
						<small class="mb-1">
							<i class="far fa-envelope me-2"></i>E-mail&#32;&ndash;&#32;
						</small>
					</div>
					<small class="timestamp me-2">Отправлено&#32;&#8226;&#32;15:33</small>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Modal Header</h4>
	        </div>
	        <div class="modal-body">
	          <p>Some text in the modal.</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	</div>
</main>