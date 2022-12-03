<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a>Профиль</a>
	</div>
	<!-- Header Card -->
	<div class="main-header py-3 d-flex flex-column">
		<h3 class="fw-semibold">Мой профиль</h3>
	</div>
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
	<div class="profile-card px-4 pt-3 pb-2 mb-3">
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">
				<span class="me-2"><i class="far fa-phone-alt"></i></span>
				<p class="mb-0 fw-semibold">Контактная информация</p>
			</div>
			<a class="text-decoration-underline" href="#" data-bs-toggle="modal" data-bs-target="#contactsModal">Изменить</a>
		</div>
		<small class="mb-1">Телефон</small>
		<p><? echo $phone; ?></p>
		<small class="mb-1">E-mail</small>
		<p class="mb-2"><? echo $email; ?></p>
	</div>
<?php if($role == 1) : ?>
	<div class="profile-card px-4 pt-3 pb-2 mb-3">
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">
				<span class="me-2"><i class="far fa-briefcase"></i></span>
				<p class="mb-0 fw-semibold">Резюме</p>
			</div>
<?php if(!is_null($resume)) : ?>
			<a class="text-decoration-underline" href="#" data-bs-toggle="modal" data-bs-target="#resumeModal">Изменить</a>
		</div>
			<small class="mb-1">ФИО</small>
			<p><? echo $resume['full_name']; ?></p>
			<small class="mb-1">Возраст</small>
			<p><? echo $resume['age']; ?></p>
			<small class="mb-1">Опыт работы</small>
			<p><? echo $resume['exp']; ?></p>
			<small class="mb-1">Образование</small>
			<p><? echo $resume['education']; ?></p>
			<small class="mb-1">Требования</small>
			<pre class="mb-2"><? echo $resume['requirements']; ?></pre>
<?php else : ?>
			<a class="text-decoration-underline" href="#" data-bs-toggle="modal" data-bs-target="#resumeModal">Создать</a>
		</div>
<?php endif; ?>
	</div>
	<div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header px-4">
	        <h3 class="modal-title fs-5" id="resumeModalLabel">Резюме</h3>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body px-4">
	        <form id="resume">
			  <div class="mb-3">
			    <div class="form-text">ФИО</div>
			    <input id="resume-full-name" type="text" class="form-control py-1 px-2">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Возраст</div>
			    <input id="resume-age" type="text" class="form-control py-1 px-2">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Опыт работы</div>
			    <input id="resume-experience" type="text" class="form-control py-1 px-2">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Образование</div>
			    <input id="resume-education" type="text" class="form-control py-1 px-2">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div>
				<div class="form-text">Требования</div>
				<textarea id="resume-requirements" rows="3" class="form-control py-1 px-2" ></textarea>
				<small class="error-msg hide ms-2">error</small>
			  </div>
			</form>
	      </div>
	      <div class="modal-footer px-4">
	        <button type="button" id="save-resume" class="btn btn-primary py-0 px-3 text-nowrap">Сохранить</button>
	      </div>
	    </div>
	  </div>
	</div>
<?php else : ?>
	<div class="profile-fill-card px-4 pt-3 pb-2 mb-3">
		<div class="d-flex justify-content-between mb-2">
			<div class="d-flex">
				<span class="me-2"><i class="far fa-briefcase"></i></span>
				<p class="mb-0 fw-semibold">Мои вакансии</p>
			</div>
			<a id="" style="color: #FBF6F6;" class="text-decoration-underline" href="#"><i class="fas fa-chevron-down"></i></a>
		</div>
	</div>
	<div class="vacancies-control-table">
<?php foreach ($vacancies as $key => $value): ?>
		<div class="vacancy-control-card ps-4 pe-0 py-2 mb-3">
			<div class="d-flex flex-column">
				<small class="text-lowercase">номер</small>
				<b>#<? echo $value['id']; ?></b>
			</div>
			<div class="d-flex flex-column text-center">
				<small class="text-lowercase">заголовок</small>
				<span>
					<a href="/vacancies/view/<? echo $value['slug']; ?>" class="text-nowrap text-decoration-underline"><? echo $value['job']; ?></a>
				</span>
			</div>
			<div class="d-flex flex-column text-center">
				<small class="text-lowercase">откликов</small>
				<b class="text-nowrap"><? echo $value['count']; ?></b>
			</div>
			<div class="d-flex flex-column text-center">
				<small class="text-lowercase">создано</small>
				<p class="text-nowrap mb-0"><? echo $value['timestamp']; ?></p>
			</div>
			<div class="d-flex flex-column text-center">
				<small class="text-lowercase">действие</small>
				<span>
					<a href="" class="text-nowrap delete-link text-decoration-underline">Удалить</a>
				</span>
			</div>
		</div>
<?php endforeach ?>
	</div>
<?php endif; ?>
	<div class="modal fade" id="contactsModal" tabindex="-1" aria-labelledby="contactsModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header px-4">
	        <h3 class="modal-title fs-5" id="contactsModalLabel">Контактная информация</h3>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body px-4">
	        <form id="contacts">
			  <div class="mb-1">
			    <div class="form-text">Телефон</div>
			    <input id="contacts-phone" type="text" class="form-control py-1 px-2">
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			  <div class="mb-1">
			    <div class="form-text">E-mail</div>
			    <input id="contacts-email" type="email" class="form-control py-1 px-2">
			    <div class="form-text">Новый E-mail адрес будет использоваться при авторизации</div>
			    <small class="error-msg hide ms-2">error</small>
			  </div>
			</form>
	      </div>
	      <div class="modal-footer px-4">
	        <button type="button" id="save-contacts" class="btn btn-primary py-0 px-3 text-nowrap">Сохранить</button>
	      </div>
	    </div>
	  </div>
	</div>
</main>