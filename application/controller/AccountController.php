<?php

	class AccountController extends BaseController {

		function __construct() {

			parent::__construct();
			
			require 'application/model/AccountModel.php';
			$this->model = new AccountModel();

			session_start();
		}

		function login() {
			$this->view->render('account/login', 'Please login to continue', false);
		}

		function logout() {
			session_destroy();
			header('Location: /');
		}

		function dashboard() {
			$this->view->render('account/dashboard', 'Welcome to your personal dashboard', false);
		}

		function processLogin() {

			if(isset($_POST['username']) && isset($_POST['password'])) {

				$username = $_POST['username'];
				$pass = md5($_POST['password']);

				$auth = $this->model->login($username, $pass);

				if($auth != null) {
					$_SESSION['LOGIN'] = 'true';

					header('Location: /account/dashboard/');

				} else {
					echo '<p style="color:red;">invalid credentials, please try again.</p>';
				}

			} else {
				header('Location: /account/');
			}
		}


	}