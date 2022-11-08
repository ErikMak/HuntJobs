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

	public function createAccount($username, $pass, $email, $role) {
		if(!$this->isAccountExist($email)) {
			$data = array(
				'username' => $username,
				'password' => $pass,
				'email' => $email,
				'role' => $role
			);

			$this->db->insert('users', $data);

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