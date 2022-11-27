<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = 'HuntJobs - поиск работы';

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index');
		$this->load->view('templates/footer');
	}
}