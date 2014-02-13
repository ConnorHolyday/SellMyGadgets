<?php	
	class SiteModel extends BaseModel {
		//create global varibles for map function, these are needed to be global
		//so that the function can push the results to the array on each loop
		//without overwritting the array contents
		public	$links = array();
		public	$dirs = array();

		function __construct() {	
			parent::__construct();
		}
				
		function about() {
			$about = $this->db->prepare_select('content', 'site_content', 'active = 1 AND page = \'about\'');

			return $this->db->execute_query($about);
		}

		function terms() {
			$terms = $this->db->prepare_select('content', 'site_content', 'active = 1 AND page = \'terms\'');

			return $this->db->execute_query($terms);
		}

		function privacy() {
			$privacy = 	$this->db->prepare_select('content', 'site_content', 'active = 1 AND page = \'privacy\'');

			return $this->db->execute_query($privacy);
		}

		function advertising() {
			$advertising = 	$this->db->prepare_select('content', 'site_content', 'active = 1 AND page = \'advertising\'');

			return $this->db->execute_query($advertising);
		}

		function cookies() {
			$cookies = 	$this->db->prepare_select('content', 'site_content', 'active = 1 AND page = \'cookies\'');

			return $this->db->execute_query($cookies);
		}

		function help() {
			$help = '';

			//contact forms and details etc

			return $this->db->execute_query($help);
		} 

		//detect all files in given directory and store in array
		//filter via an array filled with strings	
		function map($dir, $filter) {
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