<?php 

	class Application {

		function __construct() {
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			if(empty($url[0])) {
				//require 'application/controller/IndexController.php';
				$controller = new IndexController();
				return false;
			} else {
				$controllerName = $url[0] . 'Controller';
			}

			/*$file = 'application/controller/' . $controllerName . '.php';

			if(file_exists($file)) {
				require $file;
			} else {
				require 'application/controller/ErrorController.php';
				$controller = new ErrorController();
				return false;
			}*/

			$controller = new $controllerName;

			if(isset($url[2]))
				$controller->{$url[1]}($url[2]);
			else
				if(isset($url[1]))
					$controller->{$url[1]}();
		}
	}