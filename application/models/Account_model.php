<?php

class Account_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getAccountData($user_id) {
		$query = $this->db->select('*')->from('users')
			->where('id', $user_id)
			->limit(1)
		->get();

		return $query->result_array();
	}
}