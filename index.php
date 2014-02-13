<?php

	ob_start();
	session_start();

	require_once('library/configuration.php');
	require_once(LIB_DIR . 'application.php');
	require_once(APP_DIR . 'controller/BaseController.php');
	require_once(APP_DIR . 'model/BaseModel.php');
	require_once(APP_DIR . 'view/BaseView.php');

	spl_autoload_register('autoload_controller_class');
	spl_autoload_register('autoload_model_class');
	spl_autoload_register('autoload_lib_class');
	spl_autoload_register('autoload_service_class');

	$application = new Application();

	ob_end_flush();

	function autoload_controller_class($class_name) {
		autloadAppClass(APP_DIR . 'controller/', $class_name, 'page-cannot-be-found');
	}

	function autoload_model_class($class_name) {
		autloadAppClass(APP_DIR . 'model/', $class_name, 'internal-server-error');
	}

	function autoload_lib_class($class_name) {
		autloadAppClass(LIB_DIR, $class_name, 'internal-server-error');
	}

	function autoload_service_class($class_name) {
		autloadAppClass(APP_DIR . 'services/', $class_name, 'internal-server-error');
	}

	function autloadAppClass($dir, $class_name, $error_location) {
        $file = $dir . $class_name. '.php';
        if (file_exists($file)) {
            require($file);
        } else {
            header('Location: /error/' . $error_location);
        }
    }

