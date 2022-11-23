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
	<div class="profile-card px-4 pt-3 pb-2 mb-3">
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
		<p class="mb-2"><? echo $email; ?></p>
	</div>
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
			    <input id="full-name" type="text" class="form-control py-1 px-2">
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Возраст</div>
			    <input id="age" type="text" class="form-control py-1 px-2">
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Опыт работы</div>
			    <input id="experience" type="text" class="form-control py-1 px-2">
			  </div>
			  <div class="mb-3">
			    <div class="form-text">Образование</div>
			    <input id="education" type="text" class="form-control py-1 px-2">
			  </div>
			  <div>
				<div class="form-text">Требования</div>
				<textarea id="requirements" rows="3" class="form-control py-1 px-2" ></textarea>
			  </div>
			</form>
	      </div>
	      <div class="modal-footer px-4">
	        <button type="button" id="save-resume" class="btn btn-primary py-0 px-3 text-nowrap">Сохранить</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Toast -->
	<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
	  <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-header">
	      <span class="me-2" style="color: #0d6efd; font-size: 1.2em;"><i class="fas fa-info-square"></i></span>
	      <strong class="toast-title me-auto">Title</strong>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	      msg
	    </div>
	  </div>
	</div>
</main>