<?php 

	class ErrorController extends BaseController {
		
		function __construct() {
			parent::__construct();
			
			$this->view->render('error/404', 'Sorry, that page cannot be found', false);
		}
	}