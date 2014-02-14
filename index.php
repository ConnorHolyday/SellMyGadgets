<?php

    ob_start();
    session_start();

    require_once('library/configuration.php');
    require_once(LIB_DIR . 'application.php');
    require_once(APP_DIR . 'controller/BaseController.php');
    require_once(APP_DIR . 'model/BaseModel.php');
    require_once(APP_DIR . 'view/BaseView.php');

    spl_autoload_register('autload_app_class');

    $application = new Application();

    ob_end_flush();

    function autload_app_class($class_name) {

        if(strpos($class_name, 'Controller') !== false) {
            $dir = APP_DIR . 'controller/';
            $error_location = 'page-cannot-be-found';

        } else if(strpos($class_name, 'Model') !== false) {
            $dir = APP_DIR . 'model/';
            $error_location = 'internal-server-error';

        } else if(strpos($class_name, 'Service') !== false) {
            $dir = APP_DIR . 'services/';
            $error_location = 'internal-server-error';

        } else {
            $dir = LIB_DIR;
            $error_location = 'internal-server-error';
        }

        $file = $dir . $class_name. '.php';

        if (file_exists($file)) {
            require($file);
        } else {
            header('Location: /error/' . $error_location);
        }
    }
