<header class="py-3 py-sm-2 py-md-2 py-lg-2 py-xl-2">
	<div class="container-xl themed-container header-container">
		<div class="row justify-content-between align-items-center">
			<div class="col header-item logo-item pe-0"> <!-- Logo -->
				<a><img src="/files/img/logo.png" class="logo"></a>
			</div>
			<nav class="col py-1">
				<div class="row align-items-center">
					<div class="col header-item">
						<a class="navbar-link" href="/account">
							<div class="d-flex align-items-center">
							<span style="font-size:20px">
							<i class="far fa-user"></i>
							</span>
							<i class="inscription fw-semibold fst-normal">Профиль</i>
							</div>
						</a>
					</div>
					<div class="col header-item">
						<a class="navbar-link" href="#">
							<span style="font-size:20px;" class="position-relative">
							<i class="far fa-bell"></i>
							<span class="position-absolute translate-middle p-1 rounded-circle">
						  	</span>
							</span>
						</a>
					</div>
					<div class="col"> <!-- Search field -->
						<form class="d-flex" role="search">
					      <input class="form-control search-field" type="search" placeholder="Поиск" aria-label="Search">
					     <button class="btn btn-success btn-sm search-button px-4" type="submit">
					     	<span>
							<i class="far fa-search"></i>
							</span>
					     </button>
					    </form>
					</div>
					
					<div class="col header-item slide-menu">
						<div class="burger-button d-flex flex-column justify-content-center">
						  <span class="d-block rounded-3"></span>
						  <span class="d-block rounded-3"></span>
						  <span class="d-block rounded-3"></span>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<!-- Navbar for mobile devices -->
		<div class="sm-aside">
			<!-- Sidebar Navigation -->
			<div class="sidebar-nav">
			  	<div class="sidebar-links mb-1" style="padding-right: 3em;">
			  	  <div class="sidebar-dropdown py-1 d-flex align-items-center">
				  	  <span class="text-center" style="width: 16px;">
				  	  <i class="fas fa-caret-down"></i>
				  	  </span>
				  	  <a href="#" class="m-0 ms-2 sidebar-category">Информационные технологии</a>
			  	  </div>
			  	  <ul class="nav show flex-column">
				  	<li class="sidebar-item">
				  		<span>
				    	<i class="fas fa-hashtag"></i>
				    	</span>
				    	<a class="sidebar-link ms-1" href="/vacancies?category=web_programist">WEB-программист</a>
				  	</li>
				  	<li class="sidebar-item ">
				  		<span>
				    	<i class="fas fa-hashtag"></i>
				    	</span>
				    	<a class="sidebar-link ms-1" href="/vacancies?category=sistemnyi_administrator">Систем. администратор</a>
				  	</li>
				  	<li class="sidebar-item ">
				  		<span>
				    	<i class="fas fa-hashtag"></i>
				    	</span>
				    	<a class="sidebar-link ms-1" href="/vacancies?category=sistemnyi_programist">Систем. программист</a>
				  	</li>
				 </ul>
			  </div>
			</div>
		</div>
	</div>
</header>