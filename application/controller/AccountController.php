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

    function view($userName){
      $user = $this->model->getUserDetails($userName);

      $this->view->userPicture = '<img src="' . $user[0]['image'] . '" alt="Profile picture for ' . $user[0]['username'] . '">';
      $this->view->userName = $user[0]['username'];
      $this->view->userFirstName = $user[0]['first_name'];
      $this->view->userSurname = $user[0]['surname'];
      $this->view->userAdress1 = $user[0]['adress_1'];
      $this->view->userAdress2 = $user[0]['adress_2'];
      $this->view->userCity = $user[0]['town_city'];
      $this->view->userCounty = $user[0]['county'];
      $this->view->userPostcode = $user[0]['postcode'];
      $this->view->userPhone = $user[0]['contact_number'];
      $this->view->userEmail = $user[0]['contact_email'];

      $this->view->render('account/view', $username . ' profile page', '', false, false);
    }
  }
