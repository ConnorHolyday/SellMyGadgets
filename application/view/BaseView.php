<?php

	class BaseView {

		public $page;

		function __construct() {

		}

		public function render($name, $title, $inc_master, $inc_search) {

			$this->title = 'sellmygadgets. | ' . $title;
			$this->view = APP_DIR . 'view/' . $name . '.php';

			$this->inc_master = $inc_master;
			$this->inc_search = $inc_search;

			require APP_DIR . 'view/master/basemaster.php';
		}

		public function render_include($name) {
			require APP_DIR . 'view/' . $name . '.php';
		}
	}