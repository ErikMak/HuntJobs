<?php

class Auth_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	private function isAccountExist($email) {
		$query = $this->db->get_where('users', array('email' => $email));

		if($query->num_rows() > 0) {
			return TRUE;
		} 
		return FALSE;
	}

	public function createAccount($userData) {
		if(!$this->isAccountExist($userData['email'])) {
			$this->db->insert('users', $userData);

			return TRUE;
		}
		return FALSE;
	}

	public function getAccountData($pass, $email) {
		$query = $this->db->get_where('users', array('password' => $pass, 'email' => $email));

		if($query->num_rows() == 0) {
			return NULL;
		}
		return $query->row_array();
	}
}