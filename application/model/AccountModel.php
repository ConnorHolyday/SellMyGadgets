<?php 	
	
	class AccountModel extends BaseModel {
		
		function __construct() {
			require 'library/database.php';
			$this->db = new Database();
		}

		function processLogin($username, $password) {
			$qry = $this->db->prepare_select('id', 'users', "username = '{$username}' AND password = '{$password}'");
			$user = $this->db->execute_assoc_query($qry);

			return $user['id'] != null ? $user['id'] : null;
		}

		function processSignup($firstname, $surname, $address1, $address2, $town_city, $county, $postcode, $phonenumber, $email, $pass) {

			$userInsert = $this->db->prepare_insert('users', 'username, password, user_type, active', "'{$email}', '{$pass}', 2, 1");
			$id = $this->db->insert_return_id($userInsert);

			$detailsInsert = $this->db->prepare_insert(
				'user_details', 
				'user_id, first_name, surname, address_1, address_2, town_city, county, postcode, contact_number, contact_email',
				"$id, '{$firstname}', '{$surname}', '{$address1}', '{$address2}', '{$town_city}', '{$county}', '{$postcode}', '{$phonenumber}', '{$email}'"
			);

			$this->db->execute_query($detailsInsert);
			
			return $id;
		}

	}