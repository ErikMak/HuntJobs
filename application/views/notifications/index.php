<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a>Уведомления</a>
	</div>
	<div class="main-header py-3 d-flex align-items-center">
		<h4 class="fw-semibold mb-0"><? echo $title ?></h4>
		<p class="nt-count mb-0 ms-2">(<? echo $notifications_count;?>)</p>
	</div>
	<div class="container float-start">
<?php foreach ($notifications as $key => $value): ?>
		<div id="notifications-block" class="row align-items-center mb-3">
			<div class="col notification-card p-3 shadow position-relative">
				<b class="fw-semibold">Вакансия <? echo $value['job'];?></b>
				<p class="mb-0 mt-1">Пользователь <? echo $value['username'];?> отправил резюме на ранее размещенную вакансию <a class="text-decoration-underline" href="/vacancies/view/<? echo $value['slug'];?>"><? echo $value['job'];?></a>. Просмотреть резюме можно в разделе &laquo;Ответы&raquo; на странице вакансии.</p>
				<small class="position-absolute"><? echo $value['timestamp'];?></small>
			</div>
			<div class="col-1 notification-delete-btn text-center">
				<a id="<? echo $value['id'];?>" class="del-notification-link" href="#"><i style="color: #f3353a;" class="fas fa-trash-alt"></i></a>
			</div>
		</div>
<?php endforeach ?>
	</div>
</main>