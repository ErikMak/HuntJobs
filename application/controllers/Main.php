<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// $this->load->model('vacancies_model');
	}

	public function index() {
		$data['title'] = 'HuntJobs - поиск работы';

		$this->load->view('templates/header', $data);
		$this->load->view('main/index');
		$this->load->view('templates/footer');
	}
}