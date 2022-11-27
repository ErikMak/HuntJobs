<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = 'Уведомления';

		$this->load->view('templates/header', $this->data);
		$this->load->view('notifications/index');
		$this->load->view('templates/footer');
	}
}