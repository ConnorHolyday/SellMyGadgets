<?php

    class AccountService {

        public $currentAccount;

        function __construct() {
            $this->currentAccount = $this->checkAuth();
        }

        public static function isLoggedIn() {
            return AccountService::checkAuth() != null ? true: false;
        }

        public static function checkAuth() {
            return isset($_SESSION['LOGIN']) ? $_SESSION['LOGIN'] : null;
        }

        public static function setSession($session) {
            $_SESSION['LOGIN'] = $session;
        }

    }