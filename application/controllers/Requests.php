<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('requests_model');
		$this->load->model('resumes_model');
	}

	public function sendRequest() {
		$vacancy_id = $this->input->post('vacancy_id');

		// Проверка соответствия роли
		if($this->session->userdata('role') == 1) {
			// Резюме не существует
			if(!$this->resumes_model->isResumeExist(USER_ID)) {
				$response = [
					"status" => FALSE,
					"message" => 'Резюме не создано.'
				];
				echo json_encode($response);
				return;
			}
			// Резюме уже закреплено
			if($this->requests_model->isRequestExist($vacancy_id)) {
				$response = [
					"status" => FALSE,
					"message" => 'Резюме уже прикреплено.'
				];
				echo json_encode($response);
				return;
			}
			// Закрепление пользователя за вакансией
			$this->requests_model->sendRequestOnVacancy($vacancy_id, USER_ID);

			$response = [
				"status" => TRUE,
				"message" => 'Резюме успешно отправлено.'
			];
			echo json_encode($response);
		} else {
			$response = [
				"status" => FALSE,
				"message" => 'Доступ ограничен.'
			];
			echo json_encode($response);
		}
	}
}