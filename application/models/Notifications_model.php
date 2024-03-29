<?php

class Notifications_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function uploadNotifications($user_id) {
		$query = $this->db->select('requests.id, requests.vacancy_id, requests.user_id, requests.timestamp, vacancies.job, vacancies.slug')
			->from('requests')
			->join('vacancies', 'requests.vacancy_id = vacancies.id')
			->where('vacancies.user_id', $user_id)
			->where('notify', TRUE)
		->get();

		return $query->result_array();
	}

	public function getNotificationCount($user_id) {
		$query = $this->db->select('requests.vacancy_id')
			->from('requests')
			->join('vacancies', 'requests.vacancy_id = vacancies.id')
			->where('vacancies.user_id', $user_id)
			->where('notify', TRUE)
		->get();

		return $query->num_rows();
	}

	public function isNotificationsExist($user_id) {
		$query = $this->db->select('requests.vacancy_id')
			->from('requests')
			->join('vacancies', 'requests.vacancy_id = vacancies.id')
			->where('vacancies.user_id', $user_id)
			->where('notify', TRUE)
		->get();

		if($query->num_rows() > 0) {
			return TRUE;
		} 
		return FALSE;
	}

	public function deleteNotification($notification_id) {
		$this->db->set('notify', FALSE)
			->where('id', $notification_id)
			->update('requests');
	}
}