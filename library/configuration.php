<?php

    // Directories

    define('APP_DIR', 'application/');
    define('LIB_DIR', 'library/');
    define('ASSET_DIR', '/assets/');
    define('TMP_DIR', 'media/temp/');
    define('IMG_SML_DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/assets/CDN/UserContent/Small/');
    define('IMG_MED_DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/assets/CDN/UserContent/Medium/');
    define('IMG_LRG_DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/assets/CDN/UserContent/Large/');

    // Database connection parameters

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sellmygadgets');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'sellmygadgets');

    //pagination
    define('PAGE_ITEMS', 9);