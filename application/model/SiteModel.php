<?php	
	class SiteModel extends BaseModel {
		//create global varibles for map function, these are needed to be global
		//so that the function can push the results to the array on each loop
		//without overwritting the array contents
		public	$links = array();
		public	$dirs = array();

		//Upon construction create new databass object
		function __construct() {	
			parent::__construct();
		}
				
		function about(){
			$about = 			'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = "about" ';

			return $this->db->doQuery($about);
		}

		function terms(){
			$terms = 			'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = "terms" ';

			return $this->db->doQuery($terms);
		}

		function privacy(){
			$privacy = 			'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = "privacy" ';

			return $this->db->doQuery($privacy);
		}

		function advertising(){
			$advertising = 		'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = "advertising" ';

			return $this->db->doQuery($advertising);
		}

		function cookies(){
			$cookies = 			'SELECT content 
								FROM site_content 
								WHERE active = 1 & page = "cookies" ';

			return $this->db->doQuery($cookies);
		}

		function help(){
			$help = '';

			//contact forms and details etc

			return $this->db->doQuery($help);
		} 

		//detect all files in given directory and store in array
		//filter via an array filled with strings	
		function map($dir, $filter){
			$links = array();
			$dirs = array();

			foreach (scandir($dir) as $file) {
				//do not search files/folders in the filter varible
				//skip to end of loop if file is in the filter
				if(in_array($file, $filter)) continue;

				//if scanned item is a file push file name and directory to global array
				if(is_file($dir . '/' . $file)){
					array_push($this->links, $dir . '/' . $file);
				}

				//if scanned item is a folder push dir name to global array
				if(is_dir($dir . '/' . $file)) {
					array_push($this->dirs, $file);
					$this->map($dir . '/' . $file, $filter);
				}			
			}
				
			//return an array of results and picked up via the list function in siteController.php	
			return array($this->links, $this->dirs);				
		}
	}