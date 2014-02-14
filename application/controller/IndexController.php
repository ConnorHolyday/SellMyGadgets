<?php

	class IndexController extends BaseController {

		function __construct() {
			parent::__construct();
		}

		function index() {
			$this->view->render('index/index', 'Homepage', true, true);
		}
	}