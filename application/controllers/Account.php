<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('account_model');
		$this->load->model('resumes_model');
	}

	public function index() {
		$this->data['title'] = 'Мой профиль';

		// Загрузка контактной информации
		$contacts = $this->account_model->getAccountContacts(USER_ID);
		$this->data['email'] = $contacts['email'];
		$this->data['phone'] = $contacts['phone'];


		// Загрузка карточки резюме для соискателей || списка размещенных вакансий для работодателей
		if($this->data['role'] == 1) {
			$resume = $this->resumes_model->getUserResume(USER_ID);
			$this->data['resume'] = $resume;
		} else if ($this->data['role'] == 2) {
			$this->load->model('vacancies_model');
			$this->load->model('requests_model');

			$this->data['vacancies'] = array();
			$created_vacancies = $this->vacancies_model->getUserVacancies(USER_ID);
			// ?? Тяжелая конструкция
			foreach ($created_vacancies as $key => $value) {
				$vacancyItem = [
					'id' => $value['id'],
					'slug' => $value['slug'],
					'timestamp' => $value['timestamp'],
					'job' => $value['job'],
					'count' => $this->requests_model->getRequestsCount($value['id'])
				];
				array_push($this->data['vacancies'], $vacancyItem);
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('account/index', $this->data);
		$this->load->view('templates/footer');
	}

	public function sendResume() {
		$resumeData = array(
			'user_id' => USER_ID,
			'full_name' => $this->input->post('full_name'),
			'age' => $this->input->post('age'),
			'exp' => $this->input->post('experience'),
			'education' => $this->input->post('education'),
			'requirements' => $this->input->post('requirements')
		);

		if(!$this->resumes_model->isResumeExist(USER_ID)) {
			$this->resumes_model->createResume(USER_ID, $resumeData);
			$response = [
				"status" => TRUE,
				"message" => 'Резюме успешно создано.'
			];
		} else {
			$this->resumes_model->changeResume(USER_ID, $resumeData);
			$response = [
				"status" => TRUE,
				"message" => 'Резюме было изменено.'
			];
		}
		echo json_encode($response);
	}

	public function logout() {
		$this->session->sess_destroy();

		redirect('auth');
	}
}