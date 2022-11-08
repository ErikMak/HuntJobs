<aside class="col">
	<!-- Sidebar Profile -->
	<div class="sidebar-profile d-flex pt-4">
		<div class="profile-avatar me-3">
			<img src="/files/img/img_avatar.png" salt="avatar">
		</div>
		<div class="profile-case d-flex align-items-center">
			<div class="profile-info d-flex flex-column me-3">
				<b><?php echo $username;?></b>
				<i class="fst-normal"><?php
					if($role == 1) {
						echo 'Соискатель';
					} else if($role == 2) {
						echo 'Работодатель';
					}?>
				</i>
			</div>
			<span>
				<a href="/account/logout"><i class="far fa-sign-out"></i></a>
			</span>
		</div>
	</div>
	<hr>
	<!-- Sidebar Navigation -->
	<div class="sidebar-nav">
	  <div class="sidebar-links mb-1">
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
		  	<li class="sidebar-item">
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
	  <hr>
	  <div class="sidebar-rights d-flex flex-column pb-4">
			<small>© 2022 HuntJobs.com</small>
			<small>All rights Reserved</small>
	  </div>
	</div>
</aside>