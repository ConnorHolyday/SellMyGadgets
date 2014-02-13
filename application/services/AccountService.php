<?php

    class AccountService {

        public $currentAccount;

        function __construct() {

            $this->currentAccount = $this->checkAuth();
        }

        function isLoggedIn() {
            return $this->currentAccount != null ? true : false;
        }

        function checkAuth() {
            return isset($_SESSION['LOGIN']) ? $_SESSION['LOGIN'] : null;
        }

    }