<?php

	require_once('config/config.php');

	require_once('library/application.php');
	require_once('library/sql.php');
	
	require_once('application/controller/BaseController.php');
	require_once('application/model/BaseModel.php');
	require_once('application/view/BaseView.php');

	$application = new Application();
	
	//create a database connection via the sql.php class file by using a database object.
	//connection details defined within the config file.
	$SQL = new DB();
