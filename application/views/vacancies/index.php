<main class="col pt-3 pb-4">
	<!-- Nav Path -->
	<div class="nav-path d-flex">
		<a href="/main">Главная</a>
		<i class="mx-1 fst-normal">&#8226;</i>
		<a><? echo $link ?></a>
	</div>
	<div class="main-header py-3 d-flex align-items-center">
		<h4 class="fw-semibold mb-0"><? echo $title ?></h4>
		<p class="mb-0 ms-2">(<? echo $vacancies_count ?>)</p>
	</div>
	<div class="catalog-cards">
		<div class="for-employers-card px-3 py-3">
		    <div class="d-flex justify-content-between">
	    		<div class="d-flex flex-column">
	    			<b class="fw-semibold text-uppercase mb-2">работодателям</b>
	    			<div class="d-flex justify-content-between">
	    				<p class="mb-0">Разместите вакансию на сайте и находите сотрудников среди тех, кто хочет у вас работать. <a class="text-decoration-underline" href="#">Создать вакансию</a></p>
	    			</div>
	    		</div>
	    	</div>
		</div>
		<?php foreach ($vacancies as $key => $value): ?>
		<div class="card">
		  <div class="row g-0">
		      <div class="card-body h-100 d-grid align-content-between">
		      	<div class="d-flex flex-column">
			      	<a href="vacancies/view/<? echo $value['slug']; ?>" class="card-link text-wrap"><? echo $value['job']; ?></a>
			      	<small class="my-2">Санкт-Петербург&#32;&#8226;&#32;<? echo $value['timestamp']; ?></small>
			      	<div class="description">
				      	<p class="mb-0"><? echo $value['description']; ?></p>
					</div>
				</div>
				<div class="d-flex justify-content-start mt-3">
    				<button type="button" class="btn btn-danger py-0 px-3 text-nowrap" id="send-request">Откликнуться</button>
    			</div>
		      </div>
		  </div>
		</div>
		<?php endforeach ?>
		<? echo $pagination; ?>
	</div>
	<!-- Toast -->
	<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
	  <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-header">
	      <span class="me-2" style="color: #0d6efd; font-size: 1.2em;"><i class="fas fa-info-square"></i></span>
	      <strong class="me-auto">Title</strong>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	      Резюме успешно отправлено.
	    </div>
	  </div>
	</div>
</main>