<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vacancies_model');
		$this->load->model('account_model');
	}

	public function index() {
		$this->load->library('pagination');

		$offset = (int)$this->uri->segment(2);

		if($this->input->get('category')) {
			$category = $this->input->get('category');

			switch ($category) {
				case 'web_programist':
					$this->data['title'] = 'Работа WEB-программистом';
					$this->data['link'] = 'WEB-программист';
					break;
				case 'sistemnyi_administrator':
					$this->data['title'] = 'Работа системным администратором';
					$this->data['link'] = 'Системный администратор';
					break;
				case 'sistemnyi_programist':
					$this->data['title'] = 'Работа системным программистом';
					$this->data['link'] = 'Системный программист';
					break;
			}
			$vacancies_count = $this->vacancies_model->getVacanciesCount($category);
			$this->data['vacancies'] = $this->vacancies_model->getVacancies(10, $offset, $category);

		} else {
			$vacancies_count = $this->vacancies_model->getVacanciesCount();
			$this->data['link'] = 'Все вакансии';
			$this->data['title'] = 'Доступные вакансии';
			$this->data['vacancies'] = $this->vacancies_model->getVacancies(10, $offset);
		}


		$this->data['vacancies_count'] = $vacancies_count;
		// Настройки пагинации
		$p_config['base_url'] = base_url()."/vacancies";
		$p_config['reuse_query_string'] = TRUE;
		$p_config['total_rows'] = $vacancies_count;
		$p_config['per_page'] = 10;
		$p_config['uri_segment'] = 2;
		$p_config['full_tag_open'] = '<div class="pagination m-auto">';
		$p_config['full_tag_close'] = '</div>';
		$p_config['cur_tag_open'] = '<a href="#" class="active">';
		$p_config['cur_tag_close'] = '</a>';
		// Инициализация пагинации
		$this->pagination->initialize($p_config);
		$this->data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $this->data);
		$this->load->view('vacancies/index', $this->data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL) {
		$vacancyData = $this->vacancies_model->getVacancy($slug);

		// if(empty($vacancyData)) {
		// 	show_404();
		// }

		// Данные вакансии
		$this->data['id'] = $vacancyData['id'];
		$this->data['title'] = $vacancyData['job'];
		$this->data['timestamp'] = $vacancyData['timestamp'];
		$this->data['salary'] = $vacancyData['salary'];
		$this->data['description'] = $vacancyData['description'];
		// Информация о авторе вакансии
		$this->data['author_id'] = $vacancyData['user_id'];
		$authorData = $this->account_model->getAccountData($this->data['author_id']);
		$this->data['author'] = $authorData['username'];

		// Загрузка раздела откликов на вакансию для создателя вакансии
		if((USER_ID == $this->data['author_id']) && ($this->data['role'] == 2)) {
			$this->uploadVacancyRequests($this->data, $vacancyData['id']);
		}

		$category = $vacancyData['category'];
		switch ($category) {
			case 'web_programist':
				$this->data['link'] = 'WEB-программист';
				break;
			case 'sistemnyi_administrator':
				$this->data['link'] = 'Системный администратор';
				break;
			case 'sistemnyi_programist':
				$this->data['link'] = 'Системный программист';
				break;
		}
		$this->data['category'] = $category;

		$this->load->view('templates/header', $this->data);
		$this->load->view('vacancies/view', $this->data);
		$this->load->view('templates/footer');
	}

	public function create() {
		if($this->session->userdata('role') != 2) {
			show_404();
		}

		$this->data['title'] = 'Создать вакансию';

		$this->load->view('templates/header', $this->data);
		$this->load->view('vacancies/create', $this->data);
		$this->load->view('templates/footer');
	}

	public function postVacancy() {
		$vacancyData = array(
			'user_id' => USER_ID,
			'job' => $this->input->post('header'),
			'salary' => $this->input->post('salary'),
			'category' => $this->input->post('category'),
			'description' => $this->input->post('desc'),
			'timestamp' => date("d.m.Y"),
			'slug' => 'null'
		);
		$this->vacancies_model->createVacancy($vacancyData);

		$response = [
			"status" => TRUE,
			"message" => 'Вакансия успешно создана!'
		];
		echo json_encode($response);
	}

	private function uploadVacancyRequests(&$data, $vacancy_id) {
		$this->load->model('requests_model');
		$this->load->model('resumes_model');

		// Массив всех резюме
		$data['resumes'] = array();
		$counter = 0;

		$requestsData = $this->requests_model->getRequests($vacancy_id);
		foreach ($requestsData as $key => $value) {
			$resumeItem = $this->resumes_model->getUserResume($value['user_id']);
			// Добавление timestamp-а
			$resumeItem['timestamp'] = $value['timestamp'];

			// Добавление username-а и контактной информации
			$userData = $this->account_model->getAccountData($value['user_id']);
			$resumeItem['username'] = $userData['username'];
			$resumeItem['phone'] = $userData['phone'];
			$resumeItem['email'] = $userData['email'];

			array_push($data['resumes'], $resumeItem);
			$counter++;
		}
		$data['resumes_count'] = $counter;
	}
}