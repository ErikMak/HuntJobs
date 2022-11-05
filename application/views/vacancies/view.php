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
					<button type="button" class="btn btn-danger py-0 px-3 text-nowrap">Откликнуться</button>
				</div>
		</div>
	</div>
</main>