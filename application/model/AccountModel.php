<?php

	class AccountModel extends BaseModel {

		function __construct() {
			$this->db = new Database();
		}

		function processLogin($username, $password) {
			$qry = $this->db->prepare_select('id', 'users', "username = '{$username}' AND password = '{$password}'");
			$user = $this->db->execute_assoc_query($qry);

			return $user[0]['id'] != null ? $user[0]['id'] : null;
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

		function getUserDetails($username){
			$user = 'SELECT users.username, user_details.first_name, user_details.surname, user_details.adress_1, user_details.adress_2, user_details.town_city, user_details.county, user_details.postcode, user_details.contact_number,  user_details.contact_email
			FROM USERS
			INNER JOIN user_details
			ON users.id = user_details.user_id 
			WHERE users.username = "'. $username . '" & users.active = 1';

			return $this->db->execute_assoc_query($user);
		}

	}