<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('url');
		$this->load->library('session');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}
		$data['title'] = 'Мой профиль';
		// Данные сессии
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');
		$data['email'] = $this->session->userdata('email');

		$this->load->view('templates/header', $data);
		$this->load->view('account/index', $data);
		$this->load->view('templates/footer');
	}

	public function logout() {
		$this->load->helper('url');
		$this->load->library('session');

		$this->session->sess_destroy();

		redirect('auth');
	}
}