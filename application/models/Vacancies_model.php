<?php

class Vacancies_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getVacancies($row_count, $offset, $category = FALSE) {
		if($category === FALSE) {
			$query = $this->db->get('vacancies', $row_count, $offset);
			return $query->result_array();
		}

		$query = $this->db->get_where('vacancies', array('category' => $category), $row_count, $offset);
		return $query->result_array();
	}

	public function getVacancy($slug) {
		$query = $this->db->get_where('vacancies', array('slug' => $slug), 1);
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

	public function getUserVacancies($author_id) {
		$query = $this->db->get_where('vacancies', array('user_id' => $author_id));
		return $query->result_array();
	}

	public function getAuthorID($vacancy_id) {
		$query = $this->db->select('user_id')
			->from('vacancies')
			->where('id', $vacancy_id)
			->limit(1)
		->get();

		$result = $query->row_array();
		return $result['user_id'];
	}

	public function createVacancy($vacancyData) {
		$this->db->insert('vacancies', $vacancyData);
		$vacancy_id = $this->db->insert_id();

		$slug = 'vacancy-'.$vacancy_id;
		$this->db->set('slug', $slug)
			->where('id', $vacancy_id)
			->update('vacancies');
	}
}