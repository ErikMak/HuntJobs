<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	const HASH = "b7lm4kS99ae1O";

	public function __construct() {
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('session');
	}

	public function index() {
		$data['title'] = 'Войти в аккаунт';

		$this->load->view('auth/index', $data);
	}

	public function signup() {
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$role = $this->input->post('role');
		$email = $this->input->post('email');

		// Хэширование пароля
		$pass = md5($pass.Auth::HASH);
		// Преобразование email к нижнему регистру
		$email = strtolower($email);

		if($this->auth_model->createAccount($username, $pass, $email, $role)) {
			$session_data = array(
				'username' => $username,
				'email' => $email,
				'role' => $role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($session_data);

			$response = [
				"status" => TRUE
			];
			echo json_encode($response);
		} else {
			$response = [
				"status" => FALSE,
				"message" => 'Аккаунт с таким E-mail уже существует'
			];
			echo json_encode($response);
		}
	}

	public function signin() {

	}
}