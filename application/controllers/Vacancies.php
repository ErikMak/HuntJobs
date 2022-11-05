<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vacancies_model');
	}

	public function index() {
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
			$data['vacancies'] = $this->vacancies_model->getVacancies($category);
			$data['vacancies_count'] = $this->vacancies_model->getVacanciesCount($category);
		} else {
			$data['link'] = 'Все вакансии';
			$data['title'] = 'Доступные вакансии';
			$data['vacancies'] = $this->vacancies_model->getVacancies();
			$data['vacancies_count'] = $this->vacancies_model->getVacanciesCount();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('vacancies/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL) {
		$data['vacancy'] = $this->vacancies_model->getVacancy($slug);

		if(empty($data['vacancy'])) {
			show_404();
		}
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