<div class="sm-navbar mb-3 shadow position-fixed rounded-4 justify-content-center align-items-center">
	<ul class="d-flex p-0 mb-0">
		<li class="sm-navbar-item position-relative">
			<a class="position-relative d-flex justify-content-center align-items-center flex-column" href="/account">
				<span class="icon position-relative text-center">
					<i class="far fa-user"></i>
				</span>
				<span class="text position-absolute">
					Профиль
				</span>
			</a>
		</li>
		<li class="sm-navbar-item">
			<a class="position-relative d-flex justify-content-center align-items-center flex-column" href="/main">
				<span class="icon position-relative text-center">
					<i class="fas fa-home-alt"></i>
				</span>
				<span class="text position-absolute">
					Главная
				</span>
			</a>
		</li>
		<li class="sm-navbar-item">
			<a class="position-relative d-flex justify-content-center align-items-center flex-column" href="/notifications">
				<span class="icon position-relative text-center">
					<i  class="far fa-bell"></i>
					<span class="notification-circle <? echo ($is_notifications_exist) ? "show" : ""; ?> position-absolute translate-middle p-1 rounded-circle">
					</span>
				</span>
				<span class="text position-absolute">
					Уведомления
				</span>
			</a>
		</li>
		<li class="sm-navbar-item">
			<a class="position-relative d-flex justify-content-center align-items-center flex-column" href="/account/logout">
				<span class="icon position-relative text-center">
					<i style="padding-top: 2px" class="fas fa-sign-out"></i>
				</span>
				<span class="text position-absolute">
					Выйти
				</span>
			</a>
		</li>
		<div class="indicator position-absolute rounded-circle"></div>
	</ul>
</div>