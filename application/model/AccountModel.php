<?php 	
	
	class AccountModel extends BaseModel {
		
		function __construct() {
			require 'library/database.php';
			$this->db = new Database();
		}

		function login($username, $password) {
			$qry = "SELECT user_id FROM users WHERE username = '{$username}' AND password = '{$password}'";

			return $this->db->execute_query($qry);
		}

	}