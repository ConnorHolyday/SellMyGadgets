<?php

	class AccountController extends BaseController {

		function __construct() {

			parent::__construct();
			
			require 'application/model/AccountModel.php';
			$this->model = new AccountModel();
		}

		function login() {

			$this->view->render('account/login', 'Please login to continue', false);

			// Catch the values on postback
			if(isset($_POST['username']) && isset($_POST['password'])) {
				$username = $_POST['username'];
				$pass = md5($_POST['password']);

				$auth = $this->model->processLogin($username, $pass);

				if($auth != null) {
					$_SESSION['LOGIN'] = $auth;
					header('Location: /account/dashboard');
				} else {
					echo '<p style="color:red;">invalid credentials, please try again.</p>';
				}
			}
		}

		function logout() {
			session_destroy();
			header('Location: /');
		}

		function dashboard() {
			$this->view->render('account/dashboard', 'Welcome to your personal dashboard', false);
		}

		function signup() {
			$this->view->render('account/signup', 'Sign up for an account today', false);

			// Catch the values on postback
			if(isset($_POST['firstname']) &&
				isset($_POST['surname']) &&
				isset($_POST['address1']) &&
				isset($_POST['address2']) &&
				isset($_POST['town_city']) &&
				isset($_POST['county']) &&
				isset($_POST['postcode']) &&
				isset($_POST['phonenumber']) &&
				isset($_POST['email']) &&
				isset($_POST['password'])) {

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

				$_SESSION['LOGIN'] = $auth;
				header('Location: /account/dashboard');
			}
		}

		// Helper function to check what is stored in login session. Will be deleted before release.
		function checkauth() {
			if(isset($_SESSION['LOGIN']))
				echo $_SESSION['LOGIN'];
			else 
				echo 'Not set';
		}
	}
