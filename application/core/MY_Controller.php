<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	protected $data = array();

	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}

		// Данные сессии
		define('USER_ID', $this->session->userdata('user_id'));
		$this->data['user_id'] = USER_ID;
		$this->data['username'] = $this->session->userdata('username');
		$this->data['role'] = $this->session->userdata('role');
	}
}