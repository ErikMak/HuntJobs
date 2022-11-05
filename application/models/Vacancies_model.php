<?php

class Vacancies_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getVacancies($category = FALSE) {
		if($category === FALSE) {
			$query = $this->db->get('vacancies');
			return $query->result_array();
		}

		$query = $this->db->get_where('vacancies', array('category' => $category));
		return $query->result_array();
	}

	public function getVacancy($slug) {
		$query = $this->db->get_where('vacancies', array('slug' => $slug));
		return $query->row_array();
	}

	public function getVacanciesCount($category = FALSE) {
		if($category === FALSE) {
			$query = $this->db->get('vacancies');
			return $query->num_rows();
		}

		$query = $this->db->get_where('vacancies', array('category' => $category));
		return $query->num_rows();
	}
}