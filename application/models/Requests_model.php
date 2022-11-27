<?php

class Requests_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function isRequestExist($vacancy_id) {
		$query = $this->db->get_where('requests', array('vacancy_id' => $vacancy_id));

		if($query->num_rows() > 0) {
			return TRUE;
		} 
		return FALSE;
	}

	public function sendRequestOnVacancy($vacancy_id, $user_id) {
		$data = array(
			'vacancy_id' => $vacancy_id,
			'user_id' => $user_id,
			'timestamp' => date("H:i")
		);

		$this->db->insert('requests', $data);
	}

	public function getRequests($vacancy_id) {
		$query = $this->db->get_where('requests', array('vacancy_id' => $vacancy_id));
		return $query->result_array();
	}

	public function getRequestsCount($vacancy_id) {
		$query = $this->db->get_where('requests', array('vacancy_id' => $vacancy_id));
		return $query->num_rows();
	}
}