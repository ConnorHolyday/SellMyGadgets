<?php

	ob_start(); 

	require_once('config/config.php');
	require_once('library/application.php');
	require_once('application/controller/BaseController.php');
	require_once('application/model/BaseModel.php');
	require_once('application/view/BaseView.php');

	$application = new Application();

	ob_end_flush();