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
    				<button type="button" class="btn btn-danger py-0 px-3 text-nowrap">Откликнуться</button>
    			</div>
		      </div>
		  </div>
		</div>
		<?php endforeach ?>
	</div>
</main>