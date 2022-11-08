<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	const HASH = "b7lm4kS99ae1O";

	public function __construct() {
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index() {
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->has_userdata('logged_in')) {
			redirect('main');
		}

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
		$this->load->library('session');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		// Хэширование пароля
		$pass = md5($pass.Auth::HASH);
		// Преобразование email к нижнему регистру
		$email = strtolower($email);

		// Подгрузка данных пользователя
		$userData = $this->auth_model->getAccountData($pass, $email);
		if(!is_null($userData)) {
			// Создание сессии пользователя
			$session_data = array(
				'username' => $userData['username'],
				'email' => $userData['email'],
				'role' => $userData['role'],
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
				"message" => 'Неверный логин или пароль'
			];
			echo json_encode($response); 
		}
	}
}