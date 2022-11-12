<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('account_model');
		$this->load->model('resumes_model');
	}

	public function index() {
		$this->load->helper('url');
		$this->load->library('session');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('auth');
		}
		$data['title'] = 'Мой профиль';
		// Данные сессии
		$user_id = $this->session->userdata('user_id');
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');
		$data['email'] = $this->session->userdata('email');

		// Загрузка резюме
		$resume = $this->resumes_model->getUserResume($user_id);
		$data['resume'] = $resume;

		$this->load->view('templates/header', $data);
		$this->load->view('account/index', $data);
		$this->load->view('templates/footer');
	}

	public function sendResume() {
		$this->load->library('session');
		$user_id = $this->session->userdata('user_id');

		$resumeData = array(
			'user_id' => $user_id,
			'full_name' => $this->input->post('full_name'),
			'age' => $this->input->post('age'),
			'exp' => $this->input->post('experience'),
			'education' => $this->input->post('education'),
			'requirements' => $this->input->post('requirements')
		);

		if(!$this->resumes_model->isResumeExist($user_id)) {
			$this->resumes_model->createResume($user_id, $resumeData);
			$response = [
				"status" => TRUE,
				"message" => 'Резюме успешно создано.'
			];
		} else {
			$this->resumes_model->changeResume($user_id, $resumeData);
			$response = [
				"status" => TRUE,
				"message" => 'Резюме было изменено.'
			];
		}
		echo json_encode($response);
	}

	public function logout() {
		$this->load->helper('url');
		$this->load->library('session');

		$this->session->sess_destroy();

		redirect('auth');
	}
}