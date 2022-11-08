<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('url');
		$this->load->library('session');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}

		$data['title'] = 'HuntJobs - поиск работы';
		// Данные сессии
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');

		$this->load->view('templates/header', $data);
		$this->load->view('main/index');
		$this->load->view('templates/footer');
	}
}