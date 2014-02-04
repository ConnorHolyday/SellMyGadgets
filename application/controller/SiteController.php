<?php	
	echo '->SiteController';

	class SiteController extends BaseController {
		
		function __construct() {	
			parent::__construct();

			//retrive and create the sitemodel in $this->model
			require "application/model/SiteModel.php";
			$this->model = new SiteModel();
		}
				
		/* Querys all products to display within the products page
		this function is accsed via the site_directory/product/all */
		function about(){
			echo '->about';

			$this->view->render('site/about');
		}

		function terms (){
			echo '->terms';

			$this->view->render('site/terms');
		}

		function privacy (){
			echo '->privacy';

			$this->view->render('site/privacy');
		}

		function advertising(){
			echo '->advertising';

			$this->view->render('site/advertising');
		}

		function cookies(){
			echo '->cookies';

			$this->view->render('site/cookies');
		}

		function help(){
			echo '->help';

			$this->view->render('site/help');
		} 

		function map(){
			echo '->map';


			$this->view->render('site/map');
		}

	}
