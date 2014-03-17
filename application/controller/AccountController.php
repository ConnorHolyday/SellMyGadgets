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
      if(!AccountService::isLoggedIn()) {
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
            $this->view->error = '<p style="color:red;">invalid credentials, please try again.</p>';
          }
        }
        $this->view->render('account/login', 'Please login to continue', '', false, false);

      } else {
        header('Location: /account/dashboard');
      }
    }

    function forgotten_password() {

      if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $newPass = $this->model->resetPassword($username);

        if($newPass != null) {

          MailService::sendMail($username, 'Your Password has been reset', 'Your new password is: ' . $newPass);

        } else {
          $this->view->error = '<p style="color:red;">Invalid email address</p>';
        }
      }

      $this->view->render('account/passwordreset', 'Reset your password', '', false, false);
    }

    function logout() {
      session_destroy();
      header('Location: /');
    }

    function dashboard() {
      AccountService::requiresLogin();
      $this->view->render('account/dashboard', 'Welcome to your personal dashboard', '', false, false, [['file', 'smg'], ['file', 'dashboard']]);
    }

    function signup() {
      // Catch the values on postback
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
      $this->view->render('account/signup', 'Sign up for an account today', '', false, false);
    }

    function view($id = NULL) {

      if($id == null) {
        $id = AccountService::checkAuth();
      }

      $user = $this->model->getUserDetailsById($id);

      $this->view->firstName = $user[0]['first_name'];
      $this->view->surname = $user[0]['surname'];
      $this->view->address1 = $user[0]['address_1'];
      $this->view->address2 = $user[0]['address_2'];
      $this->view->city = $user[0]['town_city'];
      $this->view->county = $user[0]['county'];
      $this->view->postcode = $user[0]['postcode'];
      $this->view->phone = $user[0]['contact_number'];

      $this->view->render('account/view', 'User Profile - ' . $this->view->firstName . ' ' . $this->view->surname, '', true, false);
    }

    function edit() {
      $id = AccountService::checkAuth();

      if(sizeof($_POST) > 0) {
        $this->model->updateUserDetailsById(
          $id,
          $_POST['firstname'],
          $_POST['surname'],
          $_POST['address1'],
          $_POST['address2'],
          $_POST['town_city'],
          $_POST['county'],
          $_POST['postcode'],
          $_POST['phonenumber']
        );
        $this->view->message = '<p style="color: green;">Account details successfully updated</p>';
      }

      $user = $this->model->getUserDetailsById($id);

      $this->view->firstName = $user[0]['first_name'];
      $this->view->surname = $user[0]['surname'];
      $this->view->address1 = $user[0]['address_1'];
      $this->view->address2 = $user[0]['address_2'];
      $this->view->city = $user[0]['town_city'];
      $this->view->county = $user[0]['county'];
      $this->view->postcode = $user[0]['postcode'];
      $this->view->phone = $user[0]['contact_number'];

      $this->view->render('account/edit', 'Edit your account details', '', false, false);
    }

  }
