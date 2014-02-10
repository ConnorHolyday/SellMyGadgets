
<?php 

	class BaseView {
		
		function __construct() {
			
		}

		public function render ($name, $title, $master) {
			
			$this->title = 'sellmygadgets. | ' . $title;

			if($master)
				require 'application/view/master/header.php';
			
			require 'application/view/' . $name . '.php';

			if($master)
				require 'application/view/master/footer.php';
		}
	}