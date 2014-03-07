<?php

  class AccountService {

    public $currentAccount;

    function __construct() {
      $this->currentAccount = $this->checkAuth();
    }

    public static function isLoggedIn() {
      return isset($_SESSION['LOGIN']) ? true : false;
    }

    public static function checkAuth() {
      return isset($_SESSION['LOGIN']) ? $_SESSION['LOGIN'] : null;
    }

    public static function setSession($session, $userName) {
      $_SESSION['LOGIN'] = $session;
      $_SESSION['USER_NAME'] = $userName;
    }

    public static function requiresLogin() {
      if(!AccountService::isLoggedIn()) {
        header('Location: /account/login?from=' . $_SERVER['REQUEST_URI']);
      }
    }

  }