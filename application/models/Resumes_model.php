<?php

class Resumes_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function isResumeExist($user_id) {
		$query = $this->db->get_where('resumes', array('user_id' => $user_id));

		if($query->num_rows() > 0) {
			return TRUE;
		} 
		return FALSE;
	}

	public function getUserResume($user_id) {
		$query = $this->db->get_where('resumes', array('user_id' => $user_id));
		return $query->row_array();
	}

	public function createResume($user_id, $resumeData) {
		$this->db->insert('resumes', $resumeData);
	}

	public function changeResume($user_id, $resumeData) {
		$this->db->replace('resumes', $resumeData);
	}
}