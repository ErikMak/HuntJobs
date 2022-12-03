<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('notifications_model');
		$this->load->model('account_model');
	}

	public function index() {
		$this->data['title'] = 'Уведомления';

		// Массив всех уведомлений
		$this->data['notifications'] = array();
		$counter = 0;

		$notificationsData = $this->notifications_model->uploadNotifications(USER_ID);
		foreach ($notificationsData as $key => $value) {
			$userData = $this->account_model->getAccountData($value['user_id']);
			$vacancyItem = [
				'job' => $value['job'],
				'slug' => $value['slug'],
				'timestamp' => $value['timestamp'],
				'username' => $userData['username']
			];
			array_push($this->data['notifications'], $vacancyItem);
			$counter++;
		}
		$this->data['notifications_count'] = $counter;


		$this->load->view('templates/header', $this->data);
		$this->load->view('notifications/index', $this->data);
		$this->load->view('templates/footer');
	}
}