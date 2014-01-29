<?php	
	class SearchController extends BaseController {
		
		function __construct() {	
			parent::__construct();
		}
				
		/* Querys all products to display within the products page
		this function is accsed via the site_directory/product/all */
		function keyword($keyword){
				$this->view->productID;

				$this->view->render('search/keyword');
	
		}

		function location($gps){
				$this->location->productID;

		}

	}