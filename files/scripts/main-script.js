function saveResume() {
	const formHandle = document.querySelector('#resume');

	let isFullnameValid = checkResumeInput(formHandle, '#resume-full-name'),
		isAgeValid = checkResumeInput(formHandle, '#resume-age'),
		isExperienceValid = checkResumeInput(formHandle, '#resume-experience'),
		isEducationValid = checkResumeInput(formHandle, '#resume-education'),
		isRequirementsValid = checkResumeInput(formHandle, '#resume-requirements');

	let isFormValid = isFullnameValid &&
		isAgeValid && 
		isExperienceValid && 
		isEducationValid && 
		isRequirementsValid;

	if(isFormValid) {
		let resumeData = {
			full_name: formHandle.querySelector('#resume-full-name').value.trim(),
			age: formHandle.querySelector('#resume-age').value.trim(),
			experience: formHandle.querySelector('#resume-experience').value.trim(),
			education: formHandle.querySelector('#resume-education').value.trim(),
			requirements: formHandle.querySelector('#resume-requirements').value.trim()
		};

		$.ajax({
			url: '/account/sendResume',
			type: 'POST',
			dataType: 'json',
			data: {
				full_name: resumeData.full_name,
				age: resumeData.age,
				experience: resumeData.experience,
				education: resumeData.education,
				requirements: resumeData.requirements
			}, 
			success: function(data) {
				if(data['status'] == true) {
					$('#resumeModal').modal('hide');

					toastr.success(data['message']);
				}
			}
		});
	}
}

function saveContacts() {
	const formHandle = document.querySelector('#contacts');

	let isPhoneValid = checkContactsPhone(formHandle),
		isEmailValid = checkContactsEmail(formHandle);

	let isFormValid = isPhoneValid &&
		isEmailValid;

	if(isFormValid) {
		let contactsData = {
			phone: formHandle.querySelector('#contacts-phone').value.trim(),
			email: formHandle.querySelector('#contacts-email').value.trim(),
		};

		$.ajax({
			url: '/account/sendContacts',
			type: 'POST',
			dataType: 'json',
			data: {
				phone: contactsData.phone,
				email: contactsData.email
			}, 
			success: function(data) {
				if(data['status'] == true) {
					$('#contactsModal').modal('hide');

					document.querySelector('.em').innerHTML = contactsData.email;
					document.querySelector('.pn').innerHTML = contactsData.phone;
					toastr.success(data['message']);
				}
			}
		});
	}
}

function sendRequest(button) {
	const vacancy_id = button.getAttribute('value');

	$.ajax({
		url: '/requests/sendRequest',
		type: 'POST',
		dataType: 'json',
		data: {
			vacancy_id: vacancy_id,
		}, 
		success: function(data) {
			if(data['status'] == true) {
				toastr.success(data['message']);
			} else {
				toastr.error(data['message']);
			}
		}
	});
}

function checkContactsPhone(form) {
	let valid = false;

	const input = form.querySelector('#contacts-phone');
	const value = input.value.trim();

	const rv_phone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;

	if(value == '') {
		setErrorFor(input.parentElement, 'Заполните данное поле!');
	} else if (!rv_phone.test(value)) {
		setErrorFor(input.parentElement, 'Некорректный номер телефона!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}
	return valid;
}

function checkContactsEmail(form) {
	let valid = false;

	const input = form.querySelector('#contacts-email');
	const value = input.value.trim();

	const rv_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if(value == '') {
		setErrorFor(input.parentElement, 'Заполните данное поле!');
	} else if (!rv_email.test(value)) {
		setErrorFor(input.parentElement, 'Некорректный E-mail!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}
	return valid;
}

function checkResumeInput(form, id) {
	let valid = false;

	const input = form.querySelector(id);
	const value = input.value.trim();

	const rv_header = /^[a-яёА-ЯЁA-Za-z0-9 -"«»]+$/;

	if(value == '') {
		setErrorFor(input.parentElement, 'Заполните данное поле!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}
	return valid;
}

function checkVacancyHeader(form) {
	let valid = false;

	const input = form.querySelector('#vacancy-header');
	const value = input.value.trim();

	const rv_header = /^[a-яёА-ЯЁA-Za-z0-9 -"«»]+$/;

	if(value == '') {
		setErrorFor(input.parentElement, 'Заполните данное поле!');
	} else if (!rv_header.test(value)) {
		setErrorFor(input.parentElement, 'Некорректный заголовок!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}
	return valid;
}

function checkVacancySalary(form) {
	let valid = false;

	const input = form.querySelector('#vacancy-salary');
	const value = input.value.trim();

	const rv_salary = /^[0-9]+$/;

	if(value == '') {
		setErrorFor(input.parentNode.parentNode, 'Заполните данное поле!');
	} else if (!rv_salary.test(value)) {
		setErrorFor(input.parentNode.parentNode, 'Некорректное значение зарплаты!');
	} else {
		valid = true;
		setSuccessFor(input.parentNode.parentNode);
	}
	return valid;
}

function checkVacancyCategory(form) {
	let valid = false;

	const input = form.querySelector('#vacancy-category');
	const value = input.value.trim();

	console.log(value);
	if(value == 0) {
		setErrorFor(input.parentNode, 'Выберите категорию!');
	} else {
		valid = true;
		setSuccessFor(input.parentNode);
	}
	return valid;
}

function createVacancyAction(formHandle) {
	let isHeaderValid = checkVacancyHeader(formHandle),
		isSalaryValid = checkVacancySalary(formHandle),
		isCategoryValid = checkVacancyCategory(formHandle);

	let isFormValid = isHeaderValid &&
		isSalaryValid && 
		isCategoryValid;

	if(isFormValid) {
		let vacancyData = {
			header: formHandle.querySelector('#vacancy-header').value.trim(),
			salary: formHandle.querySelector('#vacancy-salary').value.trim(),
			category: formHandle.querySelector('#vacancy-category').value.trim(),
			desc: formHandle.querySelector('#requirements').value.trim()
		};

		$.ajax({
			url: '/vacancies/postVacancy',
			type: 'POST',
			dataType: 'json',
			data: {
				header: vacancyData.header,
				salary: vacancyData.salary,
				category: vacancyData.category,
				desc: vacancyData.desc
			},
			success: function(data) {
				if(data['status'] == true) {
					toastr.success(data['message']);
				}
			}
		});
	}
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

document.addEventListener('DOMContentLoaded', function() {
	const sm_navbar_item = document.querySelectorAll('.sm-navbar-item');
	sm_navbar_item.forEach(function (item) {
		item.addEventListener('click', function () {
			sm_navbar_item.forEach((item) => 
				item.classList.remove('active'));
			this.classList.add('active');
		});

		const item_link = item.querySelector('a');
		if(window.location.href == item_link.href) {
			item.classList.add('active');
		}
	});

	const burger_btn = document.querySelector('.burger-button');
	burger_btn.addEventListener('click', function () {
		const sm_aside = document.querySelector('.sm-aside');

		if(this.classList.contains('open')) {
			sm_aside.classList.remove('show');
			this.classList.remove('open');
		} else {
			sm_aside.classList.add('show');
			this.classList.add('open');
		}
	});

	const sidebar_categories = document.querySelectorAll('.sidebar-category');
	sidebar_categories.forEach(function (item) {
		item.addEventListener('click', function (e) {
			e.preventDefault();

			const sidebar_links = this.parentNode.parentNode.querySelector('.nav');

			if(sidebar_links.classList.contains('show')) {
				sidebar_links.classList.remove('show');
			} else {
				sidebar_links.classList.add('show');
			}
		});
	});

	const sidebar_links = document.querySelectorAll('.sidebar-link');
	sidebar_links.forEach(function (item) {
		if(window.location.href == item.href) {
			item.classList.add('active');
		}
	});

	const navbar_links = document.querySelectorAll('.navbar-link');
	navbar_links.forEach(function (item) {
		if(window.location.href == item.href) {
			item.classList.add('active');
		}
	});

	const request_btns = document.querySelectorAll('#send-request');
	request_btns.forEach(function (btn) {
		btn.addEventListener('click', function () {
			sendRequest(this);
		});
	});

	const contacts_modal_link = document.querySelector('.contacts-mdl');
	if (typeof(contacts_modal_link) != 'undefined' && contacts_modal_link != null) {
	  contacts_modal_link.addEventListener('click', function() {
	  	const formHandle = document.querySelector('#contacts');

	  	const phoneInput = formHandle.querySelector('#contacts-phone');
	  	const emailInput = formHandle.querySelector('#contacts-email');

	  	phoneInput.value = document.querySelector('.pn').innerHTML;
	  	emailInput.value = document.querySelector('.em').innerHTML;
	  });
	}

	const resume_modal_link = document.querySelector('.resume-mdl');
	if (typeof(resume_modal_link) != 'undefined' && resume_modal_link != null) {
	  resume_modal_link.addEventListener('click', function() {
	  	const formHandle = document.querySelector('#resume');

		const fullnameInput = formHandle.querySelector('#resume-full-name'),
		ageInput = formHandle.querySelector('#resume-age'),
		expInput = formHandle.querySelector('#resume-experience'),
		eduInput = formHandle.querySelector('#resume-education'),
		reqInput = formHandle.querySelector('#resume-requirements');

	  	fullnameInput.value = document.querySelector('.fn').innerHTML;
	  	ageInput.value = document.querySelector('.age').innerHTML;
	  	expInput.value = document.querySelector('.exp').innerHTML;
	  	eduInput.value = document.querySelector('.edu').innerHTML;
	  	reqInput.value = document.querySelector('.req').innerHTML;
	  });
	}

	const resume_modal = document.querySelector('#resumeModal');
	if (typeof(resume_modal) != 'undefined' && resume_modal != null) {
	  const save_btn = document.getElementById('save-resume');
	  save_btn.addEventListener('click', function() {
	  	saveResume();
	  });
	}

	const contacts_modal = document.querySelector('#contactsModal');
	if (typeof(contacts_modal) != 'undefined' && contacts_modal != null) {
	  const save_btn = document.getElementById('save-contacts');
	  save_btn.addEventListener('click', function() {
	  	saveContacts();
	  });
	}

	const create_vacancy_form = document.querySelector('#create-vacancy');
	if(typeof(create_vacancy_form) != 'undefined' && create_vacancy_form != null) {
		let salary = 0;

		const salary_input = create_vacancy_form.querySelector('#vacancy-salary');
		salary_input.addEventListener('change', function() {
			let isSalaryValid = checkVacancySalary(create_vacancy_form);

			if(isSalaryValid) {
				salary = parseInt(salary_input.value);
			}
		});
		// Кнопки установки размера з/п
		const plus_btn = create_vacancy_form.querySelector('.btn-plus');
		const minus_btn = create_vacancy_form.querySelector('.btn-minus');

		plus_btn.addEventListener('click', function(e) {
			e.preventDefault();
			let isSalaryValid = checkVacancySalary(create_vacancy_form);

			if(isSalaryValid) {
				salary = salary+1000;
				salary_input.value = salary;
			}
		});
		minus_btn.addEventListener('click', function(e) {
			e.preventDefault();
			let isSalaryValid = checkVacancySalary(create_vacancy_form);

			if(isSalaryValid) {
				if(salary-1000 < 0) {
					return false;
				}
				salary = salary-1000;
				salary_input.value = salary;
			}
		});


		const create_vacancy_btn = document.getElementById('btn-create');
		create_vacancy_btn.addEventListener('click', function() {
			createVacancyAction(create_vacancy_form);
		});
	}
});