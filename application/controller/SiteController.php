<?php
	class SiteController extends BaseController {

		function __construct() {
			parent::__construct();

			//retrive and create the sitemodel in $this->model
			require "application/model/SiteModel.php";
			$this->model = new SiteModel();
		}

		function index() {

		}

		function about() {
			$about = $this->model->about();
			$this->view->about = $about[0]['content'];

			$this->view->render('site/about', 'About', true, false);
		}

		function terms () {
			$terms = $this->model->terms();
			$this->view->terms = $terms[0]['content'];

			$this->view->render('site/terms', 'Terms and Conditions', true, false);
		}

		function privacy () {
			$privacy = $this->model->privacy();
			$this->view->privacy = $privacy[0]['content'];

			$this->view->render('site/privacy', 'Privacy Statement', true, false);
		}

		function advertising() {
			$advertising = $this->model->advertising();
			$this->view->advertising = $advertising[0]['content'];

			$this->view->render('site/advertising', 'Advertising', true, false);
		}

		function cookies() {
			$cookies = $this->model->cookies();
			$this->view->cookies = $cookies[0]['content'];

			$this->view->render('site/cookies', 'Cookie Policy', true, false);
		}

		function help() {
			$help = $this->model->help();
			$this->view->help = $help[0]['content'];

			$this->view->render('site/help', 'Help', true, false);
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
			$this->view->render('site/map', 'Sitemap', true, false);
		}

		function contact() {	
			$contact = $this->model->contact();
			$this->view->contact = $contact[0]['content'];

			$this->view->render('site/contact', 'Contact', true, false);
		}
	}