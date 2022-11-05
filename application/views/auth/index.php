<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/files/style.css" rel="stylesheet">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link href="/files/icons.css" rel="stylesheet"> <!-- Icons -->
	<script defer src="/files/icons.js"></script> <!-- Icons -->
	<script type="text/javascript" src="/files/jquery-3.6.0.min.js"></script>
</head>
<body class="auth-body">
	<div id="login-section">
		<div class="logo-item p-3">
			<a><img src="/files/img/logo.png" class="logo"></a>
		</div>
		<div class="d-flex flex-column justify-content-center" style="min-height: 100vh">
			<div id="error-card" class="error-card none mx-auto mb-3 px-5 py-3 rounded">
				Error Message
			</div>
			<div class="login-card py-4 rounded mx-auto">
				<div class="login-header px-5">
					<ul class="nav nav-pills" id="pills-tab" role="tablist">
					  <li class="nav-item me-3" role="presentation">
					    <a href="#" class="active fw-semibold" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Войти</a>
					  </li>
					  <li class="nav-item" role="presentation">
					    <a href="#" class="fw-semibold" id="pills-reg-tab" data-bs-toggle="pill" data-bs-target="#pills-reg" type="button" role="tab" aria-controls="pills-reg" aria-selected="false">Регистрация</a>
					  </li>
					</ul>
				</div>
				<div class="tab-content px-5 pt-4" id="pills-tabContent">
				  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab" tabindex="0">
				  	<form id="signin">
					  <div class="mb-4 position-relative">
						<span class="position-absolute">
							<i class="fas fa-envelope"></i>
						</span>
					    <input type="email" class="form-control" placeholder="E-mail">
					  </div>
					  <div class="mb-4 position-relative">
						<span class="position-absolute">
							<i class="fas fa-lock-alt"></i>
						</span>
					    <input type="password" class="form-control" placeholder="Пароль">
					  </div>
					  <div class="d-grid mb-4">
					  	<button id="signin-btn" type="submit" class="btn btn-success fw-semibold">Войти</button>
					  </div>
					  <div class="text-center">
					  	<p class="m-0">Забыли пароль? <a class="text-decoration-underline" style="color:#5faaff" href="#">Восстановить</a></p>
					  </div>
					</form>
				  </div>
				  <div class="tab-pane fade" id="pills-reg" role="tabpanel" aria-labelledby="pills-rerg-tab" tabindex="0">
				  	<form id="signup">
				  	  <div class="mb-1 position-relative">
						<span class="position-absolute">
							<i class="fa fa-user"></i>
						</span>
					    <input id="username" type="text" class="form-control" placeholder="Имя пользователя">
					    <small class="error-msg hide ms-2">error</small>
					  </div>
					  <div class="mb-1 position-relative">
						<span class="position-absolute">
							<i class="far fa-tools"></i>
						</span>
					    <select id="role" class="form-select">
						  <option value="1">Соискатель</option>
						  <option value="2">Работодатель</option>
						</select>
						<small class="error-msg hide ms-2">error</small>
					  </div>
					  <div class="mb-1 position-relative">
						<span class="position-absolute">
							<i class="fas fa-envelope"></i>
						</span>
					    <input id="email" type="email" class="form-control" placeholder="E-mail">
					    <small class="error-msg hide ms-2">error</small>
					  </div>
					  <div class="mb-1 position-relative">
						<span class="position-absolute">
							<i class="fas fa-lock-alt"></i>
						</span>
					    <input id="pass" type="password" class="form-control" placeholder="Пароль">
					    <small class="error-msg hide ms-2">error</small>
					  </div>
					  <div class="mb-1 position-relative">
						<span class="position-absolute">
							<i class="fas fa-lock-alt"></i>
						</span>
					    <input id="confirm-pass" type="password" class="form-control" placeholder="Повтор пароля">
					    <small class="error-msg hide ms-2">error</small>
					  </div>
					  <div class="d-grid mb-4">
					  	<button id="signup-btn" type="submit" class="btn btn-success fw-semibold">Зарегистрироваться</button>
					  </div>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
<script src="/files/scripts/auth-validation.js"></script>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
</body>
</html>