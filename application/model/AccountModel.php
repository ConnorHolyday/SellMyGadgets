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

    function resetPassword($username) {
      $qry = $this->db->prepare_select('id', 'users', "username = '{$username}'");
      $user = $this->db->execute_assoc_query($qry);

      if($user != null) {
        $newPass = $this->generatePassword();
        $passForDb = md5($newPass);

        $qry = $this->db->prepare_update('users', "password = '{$passForDb}'", "id = {$user[0]['id']}");
        $this->db->execute_query($qry);

        return $newPass;
      }
    }

    private function generatePassword() {
      $pass = '';

      for($i = 0, $len = rand(8, 12); $i < $len; $i++) {
        $pass .= chr(rand(32, 126));
      }

      return $pass;
    }

    function getUserDetailsById($id) {
      $qry = $this->db->prepare_select(
        '*',
        'users u, user_details ud',
        'u.id = ' . $id . ' AND u.active = 1 AND u.id = ud.user_id'
      );

      return $this->db->execute_assoc_query($qry);
    }

    function updateUserDetailsById($id, $firstname, $surname, $address1, $address2, $town_city, $county, $postcode, $phonenumber) {
      $qry = $this->db->prepare_update(
        'user_details',
        "first_name = '{$firstname}', surname = '{$surname}', address_1 = '{$address1}', address_2 = '{$address2}', town_city = '{$town_city}', county = '{$county}', postcode = '{$postcode}', contact_number = '{$phonenumber}'",
        'user_id = ' . $id
      );

      $this->db->execute_query($qry);
    }
  }
