		</section>
	</div>
	<?php $this->load->view('templates/sm-navbar', $is_notifications_exist); ?>
	<footer>
		<div class="container header-container d-flex justify-content-between pt-4">
			<div class="developers pb-4">
				<h5 class="m-0">created by ErikMak</h5>
				<small style="color: #8b9296">https://github.com/ErikMak</small>
			</div>
			<div class="agreements d-flex flex-column pb-4">
				<p>Информация</p>
				<a href="#"><small>Правовые соглашения</small></a>
		        <a href="#"><small>Политика конфиденциальности</small></a>
			</div>
			<div class="social d-flex flex-column pb-4">
				<p>Контакты</p>
				<small>Corporate mail - 47Poligons@gmail.com</small>
				<small style="color: #8b9296">Заметили ошибку? Напишите нам</small>
			</div>
		</div>
	</footer>
	<script>
		function User(user_id, role, username) {
			this.user_id = user_id;
			this.role = role;
			this.username = username;
		}

		let user_id = <? echo $user_id; ?>;
		let role = <? echo $role; ?>;
		let username = '<? echo $username ?>';

		let currentUser = new User(user_id, role, username);
	</script>
	<script src="/files/toastr.min.js"></script> <!-- Toasts -->
	<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
	<script src="/files/scripts/socket.js"></script> <!-- Web-socket -->
	<script src="/files/scripts/main-script.js"></script>
</body>
</html>