<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vacancies_model');
	}

	private function getCategoryVacanciesCount($category) {
		$count = $this->vacancies_model->getVacanciesCount($category);

		if($count % 10 == 0 || $count % 10 == 5) {
			return $count.' вакансий';
		} else if($count % 10 > 1 && $count % 10 < 5) {
			return $count.' вакансии';
		} else if($count % 10 == 1) {
			return $count.' вакансия';
		}
	}

	public function index() {
		$this->data['title'] = 'HuntJobs - поиск работы';

		// Количество вакансий по категориям в витрине на главной странице
		$this->data['first_category'] = $this->getCategoryVacanciesCount('web_programist');
		$this->data['second_category'] = $this->getCategoryVacanciesCount('sistemnyi_administrator');
		$this->data['third_category'] = $this->getCategoryVacanciesCount('sistemnyi_programist');

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index');
		$this->load->view('templates/footer', $this->data);
	}
}