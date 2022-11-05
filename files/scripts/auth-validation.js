function checkEmail(form) {
	let valid = false;

	const input = form.querySelector('#email');
	const value = input.value.trim();
	const rv_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if(value != '' && rv_email.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректный E-mail!');
	}

	return valid;
}

function checkUsername(form) {
	let valid = false;

	const input = form.querySelector('#username');
	const value = input.value.trim();
	const rv_username = /^(?=.{1,24}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/;
	
	if(value != '' && rv_username.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректное имя пользователя!');
	}

	return valid;
}

function checkPassword(form) {
	let valid = false;

	const input = form.querySelector('#pass');
	const value = input.value.trim();
	const rv_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/;
	
	if(value != '' && rv_pass.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректный пароль!');
	}

	return valid;
}

function checkConfirmPass(form) {
	let valid = false;

	const input = form.querySelector('#confirm-pass');
	const value = input.value.trim();
	const password = form.querySelector('#pass').value.trim();
	
	if(value == '') {
		setErrorFor(input.parentElement, 'Подтвердите свой пароль!');
	} else if (password != value) {
		setErrorFor(input.parentElement, 'Пароль не соотвествует!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}

	return valid;
}

function setErrorFor(form_group, msg) {
	const small = form_group.querySelector('small');
	small.classList.remove('hide', 'show');
	small.classList.add('show');

	small.innerHTML = msg;
}

function setSuccessFor(form_group, msg) {
	const small = form_group.querySelector('small');

	small.classList.remove('hide', 'show');
	small.classList.add('hide');
}

function validateForm() {
	const formHandle = document.querySelector('#signup');

	let isUsernameValid = checkUsername(formHandle),
		isEmailValid = checkEmail(formHandle),
		isPasswordValid = checkPassword(formHandle),
		isConfirmPassValid = checkConfirmPass(formHandle);

	let isFormValid = isUsernameValid &&
		isEmailValid && 
		isPasswordValid &&
		isConfirmPassValid;

	if(isFormValid) {
		let userData = {
			username: formHandle.querySelector('#username').value,
			role: formHandle.querySelector('#role').value,
			email: formHandle.querySelector('#email').value,
			pass: formHandle.querySelector('#pass').value
		};

		$.ajax({
			url: 'auth/signup',
			type: 'POST',
			dataType: 'json',
			data: {
				username: userData.username,
				role: userData.role,
				email: userData.email,
				pass: userData.pass
			},
			success: function(data) {
				if(data['status'] === true) {
					const triggerEl = document.querySelector('#pills-tab a[data-bs-target="#pills-login"]');
					bootstrap.Tab.getInstance(triggerEl).show();
				} else {
					const error_card = document.querySelector('#error-card');

					error_card.classList.remove('none');
					error_card.innerHTML = data['message'];
				}
			}
		});
	}
}


document.addEventListener('DOMContentLoaded', function() {
	const signin_btn = document.querySelector('#signin-btn');
	signin_btn.addEventListener('click', e => {
		e.preventDefault();

		validate();
	});

	const signup_btn = document.querySelector('#signup-btn');
	signup_btn.addEventListener('click', e => {
		e.preventDefault();

		validateForm();
	})
});