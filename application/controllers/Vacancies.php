<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vacancies_model');
	}

	public function index() {
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}

		$offset = (int)$this->uri->segment(2);
		// Данные сессии
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');

		if($this->input->get('category')) {
			$category = $this->input->get('category');

			switch ($category) {
				case 'web_programist':
					$data['title'] = 'Работа WEB-программистом';
					$data['link'] = 'WEB-программист';
					break;
				case 'sistemnyi_administrator':
					$data['title'] = 'Работа системным администратором';
					$data['link'] = 'Системный администратор';
					break;
				case 'sistemnyi_programist':
					$data['title'] = 'Работа системным программистом';
					$data['link'] = 'Системный программист';
					break;
			}
			$vacancies_count = $this->vacancies_model->getVacanciesCount($category);
			$data['vacancies'] = $this->vacancies_model->getVacancies(2, $offset, $category);

		} else {
			$vacancies_count = $this->vacancies_model->getVacanciesCount();
			$data['link'] = 'Все вакансии';
			$data['title'] = 'Доступные вакансии';
			$data['vacancies'] = $this->vacancies_model->getVacancies(2, $offset);
		}


		$data['vacancies_count'] = $vacancies_count;
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
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('vacancies/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL) {
		$data['vacancy'] = $this->vacancies_model->getVacancy($slug);

		if(empty($data['vacancy'])) {
			show_404();
		}
		$this->load->library('session');
		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}
		// Данные сессии
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');

		$data['title'] = $data['vacancy']['job'];
		$data['timestamp'] = $data['vacancy']['timestamp'];
		$data['salary'] = $data['vacancy']['salary'];
		$data['description'] = $data['vacancy']['description'];

		$category = $data['vacancy']['category'];
		switch ($category) {
			case 'web_programist':
				$data['link'] = 'WEB-программист';
				break;
			case 'sistemnyi_administrator':
				$data['link'] = 'Системный администратор';
				break;
			case 'sistemnyi_programist':
				$data['link'] = 'Системный программист';
				break;
		}
		$data['category'] = $category;

		$this->load->view('templates/header', $data);
		$this->load->view('vacancies/view', $data);
		$this->load->view('templates/footer');
	}
}