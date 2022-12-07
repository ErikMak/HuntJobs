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
				'id' => $value['id'],
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
		$this->load->view('templates/footer', $this->data);
	}

	public function delete() {
		$notification_id = $this->input->post('id');

		$this->notifications_model->deleteNotification($notification_id);

		$notification_count = $this->notifications_model->getNotificationCount(USER_ID);

		$response = [
			"count" => $notification_count,
			"status" => TRUE
		];
		echo json_encode($response);
	}

	public function update() {
		if($this->notifications_model->isNotificationsExist(USER_ID)) {
			$response = [
				"notifications_is_exist" => TRUE
			];
			echo json_encode($response);
		} else {
			$response = [
				"notifications_is_exist" => FALSE
			];
			echo json_encode($response);
		}
	}
}