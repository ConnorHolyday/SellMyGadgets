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

    //paypal 
    define('PAYPAL_CURRENCY', 'GDP');
    define('PAYPAL_FEE', 0.30);
    define('PAYPAL_PERCENT', 3);
    
    //set sandbox information
    Define('SANDBOX_ACOUNT', 'pay-facilitator@sellmygadgets.co.uk');
    Define('SANDBOX_ENDPOINT','api.sandbox.paypal.com');
    Define('SANDBOX_CLIENTID','AZrkPxDtZbc4s8IMHocfXrI496hmPdec8tK_SLKRQGmfjuH_1kGG78I2K0vO');
    Define('SANDBOX_SECRET','EMNG5hDa4dDe2jD_UkFpmZdeulXkR04wxKohEs58UeWep2dkct5O46tTqkg5');

    //set paypall information
    Define('API_USERNAME',  'pay_api1.sellmygadgets.co.uk');
    Define('API_PASSWORD',  'Z7NGPB99XNVCPVQ8');
    Define('API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AJWo5DsJ5VSvwtJYMULsWaXzE7MS');
   