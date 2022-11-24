<?php

class Account_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getAccountData($user_id) {
		$query = $this->db->get_where('users', array('id' => $user_id), 1);

		return $query->row_array();
	}

	public function getAccountContacts($user_id) {
		$query = $this->db->select('email, phone')->from('users')
			->where('id', $user_id)
			->limit(1)
		->get();

		return $query->row_array();
	}
}