<?php	
	class SiteController extends BaseController {
		
		function __construct() {	
			parent::__construct();

			//retrive and create the sitemodel in $this->model
			require "application/model/SiteModel.php";
			$this->model = new SiteModel();
		}
				
		/* Querys all products to display within the products page
		this function is accsed via the site_directory/product/all */
		function about() {
			$this->view->render('site/about', 'About', true);
		}

		function terms () {
			$this->view->render('site/terms', 'Terms and Conditions', true);
		}

		function privacy () {
			$this->view->render('site/privacy', 'Privacy Statement', true);
		}

		function advertising() {
			$this->view->render('site/advertising', 'Advertising', true);
		}

		function cookies() {
			$this->view->render('site/cookies', 'Cookie Policy', true);
		}

		function help() {
			$this->view->render('site/help', 'Help', true);
		} 

		function map() {

			//set filter parameters put any sensitive files and directorys
			//that should stay hidden in this array
			$filter = array(
				".",
				"..",
				".DS_Store",
				"BaseView.php",
				"error",
				"master",
				"index"
				);
		
			//Get all files from application/view directory with filtered array
			list($links, $dirs) = $this->model->map('application/view', $filter);

			//create new sitemap array
			$sitemap = array();

			//start a loop for each directory
			foreach($dirs as $dir){

				//create a multidimensional array with directory name handles
				$siteMap[$dir] = array();

					//create a loop of to loop through all page/files
					foreach($links as $link){
						//if the directory name doesnt appera in the string skip loop
						if (strpos($link,$dir) === false) continue;

						//trim the $link result
						$trimmed = str_replace("application/view", "", $link);
						$trim = str_replace(".php", "", $trimmed);
						$name = str_replace('/' . $dir . '/',"", $trim);

						//push the file name with no extension to the multidimensional array 
						//where the directory match the files existance
						array_push($siteMap[$dir], $name);
					}
			}

			$this->view->siteMap = $siteMap;
			$this->view->render('site/map', 'Sitemap', true);
		}

		function contact() {
			$this->view->render('site/contact', 'Contact', true);
		}
	}