function showToasts(title, msg) {
	let toasts = [].slice.call(document.querySelectorAll('.toast'));
	let toastsList = toasts.map(function(item) {
	    return new bootstrap.Toast(item, {content: 'Hello World!'});
	});

	toastsList.forEach(function (toast) {
		document.querySelector('.toast-body').innerHTML = msg;
		document.querySelector('.toast-title').innerHTML = title;
		toast.show();
	});
}

function saveResume() {
	const formHandle = document.querySelector('#resume');

	let resumeData = {
		full_name: formHandle.querySelector('#full-name').value,
		age: formHandle.querySelector('#age').value,
		experience: formHandle.querySelector('#experience').value,
		education: formHandle.querySelector('#education').value,
		requirements: formHandle.querySelector('#requirements').value
	};

	$.ajax({
		url: 'account/sendResume',
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

				showToasts('Мой профиль', data['message']);
			}
		}
	});
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
			showToasts('Hello', 'World');
		});
	});

	const resume_modal = document.querySelector('#resumeModal');
	if (typeof(resume_modal) != 'undefined' && resume_modal != null) {
	  const save_btn = document.getElementById('save-resume');
	  save_btn.addEventListener('click', function() {
	  	saveResume();
	  });
	}
});