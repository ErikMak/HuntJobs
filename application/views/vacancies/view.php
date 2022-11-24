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
					<p class="m-0">Опубликовано:&#32;<a class="text-decoration-underline"><? echo $author; ?></a><small style="color: #6a6b6f">&#32;(<? echo $timestamp; ?>)</small></p>
					<p class="m-0">Санкт-Петербург</p>
				</div>
				<div class="vacancy-info col d-flex flex-column align-items-end">
					<button value="<? echo $id; ?>" type="button" class="btn btn-danger py-0 px-3 text-nowrap" id="send-request">Откликнуться</button>
				</div>
		</div>
	</div>
<?php if(($user_id == $author_id) && ($role == 2)) : ?>
	<div class="requests-card">
		<div class="requests-title">
			<ul class="list-group list-group-horizontal">
				<li class="list-group-item text-white">Ответы <span class="badge rounded-pill text-bg-light ms-1"><? echo $resumes_count; ?></span></li>
			</ul>
			<hr class="m-0 opacity-100">
		</div>
<?php foreach ($resumes as $key => $value): ?>
		<div class="requests-item">
			<hr>
			<div class="d-flex">
				<img src="/files/img/img_avatar.png" class="img-thumbnail me-3">
				<div class="d-flex flex-column">
					<div class="d-flex align-items-center">
						<a class="text-decoration-underline me-1"><? echo $value['username']; ?></a>
						<span>&ndash;</span>
						<a class="text-decoration-underline ms-1" href="" style="color: #c2393d"><small>ответить</small></a>
					</div>
					<div class="d-flex flex-column">
						<b class="mb-2"><? echo $value['full_name']; ?></b>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Возраст:&#32;<? echo $value['age']; ?>
						</p>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Опыт работы:&#32;<? echo $value['exp']; ?>
						</p>
						<p class="mb-1">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Образование:&#32;<? echo $value['education']; ?>
						</p>
						<p class="mb-2">
							<i style="font-size: 10px" class="fas fa-square ms-3 me-2"></i>Требования:&#32;<? echo $value['requirements']; ?>
						</p>
						<b class="mb-2 fw-semibold">Контактная информация</b>
						<small class="mb-1">
							<i class="far fa-phone-alt me-2"></i>Телефон&#32;&ndash;&#32;<? echo $value['phone']; ?>
						</small>
						<small class="mb-1">
							<i class="far fa-envelope me-2"></i>E-mail&#32;&ndash;&#32;<? echo $value['email']; ?>
						</small>
					</div>
					<small class="timestamp me-2">Отправлено&#32;&#8226;&#32;<? echo $value['timestamp']; ?></small>
				</div>
			</div>
		</div>
<?php endforeach ?>
	</div>
<?php endif; ?>
</main>