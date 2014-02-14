<?php

	class BaseView {

		function __construct() {

		}

		public function render($name, $title, $inc_master, $inc_search) {

			$this->title = 'sellmygadgets. | ' . $title;

			if($inc_master)
				require APP_DIR . 'view/master/header.php';

			if($inc_search)
				$this->render_include('master/globalsearchbar');

			require APP_DIR . 'view/' . $name . '.php';

			if($inc_master)
				require APP_DIR . 'view/master/footer.php';
		}

		public function render_include($name) {
			require APP_DIR . 'view/' . $name . '.php';
		}
	}