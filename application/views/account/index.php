<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a>Профиль</a>
	</div>
	<!-- Vacancy Header -->
	<div class="main-header py-3 d-flex flex-column">
		<h3 class="fw-semibold">Мой профиль</h3>
	</div>
	<!-- Vacancy Desc -->
	<div class="profile-card px-4 py-3 mb-3">
		<div class="row">
			<div class="d-flex">
				<div class="profile-avatar me-4">
					<img src="/files/img/img_avatar.png" salt="avatar">
				</div>
				<div>
					<h5 class="mb-0"><? echo $username; ?></h5>
					<small><?php
					if($role == 1) {
						echo 'Соискатель';
					} else if($role == 2) {
						echo 'Работодатель';
					}?></small>
				</div>
			</div>
		</div>
	</div>
	<div class="profile-card px-4 py-3 mb-3">
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">
				<span class="me-2"><i class="far fa-phone-alt"></i></span>
				<p class="mb-0 fw-semibold">Контактная информация</p>
			</div>
			<a class="text-decoration-underline" href="#">Изменить</a>
		</div>
		<small class="mb-1">Телефон</small>
		<p>+70000000000</p>
		<small class="mb-1">E-mail</small>
		<p><? echo $email; ?></p>
	</div>
	<div class="profile-card px-4 py-3 mb-3">
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">
				<span class="me-2"><i class="far fa-briefcase"></i></span>
				<p class="mb-0 fw-semibold">Резюме</p>
			</div>
			<a class="text-decoration-underline" href="#">Изменить</a>
		</div>
		<small class="mb-1">ФИО</small>
		<p>Name Surname</p>
		<small class="mb-1">Возраст</small>
		<p>19</p>
		<small class="mb-1">Опыт работы</small>
		<p>Старший помощник оператора торгового зала, 1 год</p>
		<small class="mb-1">Образование</small>
		<p>Высшее</p>
		<small class="mb-1">Требования</small>
		<pre>Сфера деятельности: Банковское дело
Должность: банкир
Минимальная зарплата: 20 000 рублей</pre>
	</div>
</main>