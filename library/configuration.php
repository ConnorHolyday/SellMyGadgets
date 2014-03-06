<?php

/* =============================================
	Change the local user and pass to your own
===============================================*/

    // Directories
    define('APP_DIR', 'application/');
    define('LIB_DIR', 'library/');
    define('LOCAL_DEV', true);


    if (LOCAL_DEV == true){
  		// Database connection parameters port 3306
	    define('DB_HOST', 'localhost');
	    define('DB_NAME', 'sellmygadgets');
	    define('DB_USER', 'root');
	    define('DB_PASSWORD', 'wordpress');
    } else {
	    // Database connection parameters port 3306
	    define('DB_HOST', '217.199.187.62 ');
	    define('DB_NAME', 'cl51-admin-u5z');
	    define('DB_USER', 'cl51-admin-u5z');
	    define('DB_PASSWORD', 'T34p0t!2014');
    };

    //pagination
        define('PAGE_ITEMS', 9);