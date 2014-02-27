<?php

	class AccountController extends BaseController {

		function __construct() {
			parent::__construct();
			$this->model = new AccountModel();
		}

		function index() {
			$this->dashboard();
		}

		function login() {

			$this->view->render('account/login', 'Please login to continue', false, false);

			// Catch the values on postback
			if(isset($_POST['username']) && isset($_POST['password'])) {
				$username = $_POST['username'];
				$pass = md5($_POST['password']);

				$auth = $this->model->processLogin($username, $pass);

				if($auth != null) {
					AccountService::setSession($auth, $username);
					$to = isset($_POST['to']) ? $_POST['to'] : '/account/dashboard';
					header('Location: ' . $to);
				} else {
					echo '<p style="color:red;">invalid credentials, please try again.</p>';
				}
			}
		}

		function forgotten_password() {
			$this->view->render('account/passwordreset', 'Reset your password', false, false);
		}

		function logout() {
			session_destroy();
			header('Location: /');
		}

		function dashboard() {
			$this->view->render('account/dashboard', 'Welcome to your personal dashboard', false, false);
		}

		function signup() {
			$this->view->render('account/signup', 'Sign up for an account today', false, false);

			// Catch the values on postback
			/*if(isset($_POST['firstname']) &&
				isset($_POST['surname']) &&
				isset($_POST['address1']) &&
				isset($_POST['address2']) &&
				isset($_POST['town_city']) &&
				isset($_POST['county']) &&
				isset($_POST['postcode']) &&
				isset($_POST['phonenumber']) &&
				isset($_POST['email']) &&
				isset($_POST['password'])) {*/
			if(sizeof($_POST) > 0) {

				$auth = $this->model->processSignup(
					$_POST['firstname'],
					$_POST['surname'],
					$_POST['address1'],
					$_POST['address2'],
					$_POST['town_city'],
					$_POST['county'],
					$_POST['postcode'],
					$_POST['phonenumber'],
					$_POST['email'],
					md5($_POST['password'])
				);

				AccountService::setSession($auth);
				header('Location: /account/dashboard');
			}
		}
	}
