<?php 	
	
	class AccountModel extends BaseModel {
		
		function __construct() {
			require 'library/database.php';
			$this->db = new Database();
		}

		function processLogin($username, $password) {
			$qry = "SELECT user_id FROM users WHERE username = '{$username}' AND password = '{$password}'";

			return $this->db->doQuery($qry);
		}

		function processSignup() {

		}

	}