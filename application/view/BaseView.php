
<?php 

	class BaseView {
		
		function __construct() {

		}

		public function render ($name) {
			require 'application/view/master/header.php';
			require 'application/view/' . $name . '.php';
			require 'application/view/master/footer.php';
		}
	}