<?php

	class ErrorController extends BaseController {

		function __construct() {
			parent::__construct();
		}

		function page_cannot_be_found() {
			$this->view->render('error/404', 'Sorry, that page cannot be found', true, false);
		}

		function internal_server_error() {
			$this->view->render('error/500', 'Sorry, something went wrong', true, false);
		}

		function unauthorised() {
			$this->view->render('error/401', 'You are not authorised to view this', true, false);
		}

		function forbidden() {
			$this->view->render('error/403', 'Forbidden', true, false);
		}
	}