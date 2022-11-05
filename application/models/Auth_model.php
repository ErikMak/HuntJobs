<?php

class Auth_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	private function accountExist($email) {
		$query = $this->db->select('*')->from('users')
			->where('email', $email)
		->get();

		if($query->num_rows() > 0) {
			return TRUE;
		} 
		return FALSE;
	}

	public function createAccount($username, $pass, $email, $role) {

		if(!$this->accountExist($email)) {
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
}