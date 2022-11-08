<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
	}

	public function logout() {
		$this->load->helper('url');
		$this->load->library('session');

		$this->session->sess_destroy();

		redirect('auth');
	}
}