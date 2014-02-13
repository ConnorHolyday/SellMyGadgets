<?php

	class IndexController extends BaseController {

		function __construct() {
			parent::__construct();

			$this->view->render('index/index', 'Homepage', true);
		}

		function index() {

		}
	}