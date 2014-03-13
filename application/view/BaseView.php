<?php

	class BaseView {

		public $page;

		function __construct() {

		}

		public function render($name, $title, $description, $inc_master, $inc_search, $optionalScripts = NULL) {

			$this->title = 'sellmygadgets. | ' . $title;
			$this->view = APP_DIR . 'view/' . $name . '.php';

			$this->inc_master = $inc_master;
			$this->inc_search = $inc_search;

			$this->scripts = $optionalScripts;

			require APP_DIR . 'view/master/basemaster.php';
		}

		public function render_include($name) {
			require APP_DIR . 'view/' . $name . '.php';
		}
	}