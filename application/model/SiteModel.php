<?php	
	echo '->SiteModel';

	class SiteModel extends BaseModel {

		function __construct() {	
			$this->db = new DB();
		}
				
		function about (){
			$about = 			'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = `about` ';

			return $this->db->doQuery($about);
		}

		function terms (){
			$terms = '';

			return $this->db->doQuery($terms);
		}

		function privacy (){
			$privacy = '';

			return $this->db->doQuery($privacy);
		}

		function advertising(){
			$advertising = '';

			return $this->db->doQuery($advertising);
		}

		function cookies(){
			$cookies = '';

			return $this->db->doQuery($cookies);
		}

		function help(){
			$help = '';

			return $this->db->doQuery($help);
		} 

		function map(){
			$map = '';

			//detect all files in the view directory and store in array

			return $this->db->doQuery($map);
		}

		function contact(){
			$contact = '';

			return $this->db->doQuery($contact);
		}

	}