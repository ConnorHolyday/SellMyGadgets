<?php
class Configuration
{
  // For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
  public static function getConfig()
  {
    $config = array(
        // values: 'sandbox' for testing
        //       'live' for production
        "mode" => "sandbox"
  
        // These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
        // "http.ConnectionTimeOut" => "5000",
        // "http.Retry" => "2",
       
    );
    return $config;
  }
  
  // Creates a configuration array containing credentials and other required configuration parameters.
  public static function getAcctAndConfig()
  {
    $config = array(
        // Signature Credential
        "acct1.UserName" => "pay-facilitator_api1.sellmygadgets.co.uk",
        "acct1.Password" => "1392906026",
        "acct1.Signature" => "An5ns1Kso7MWUdW4ErQKJJJ4qi4-AxxhsvQEsrqQyS.D--a.TmSKIFYH",
        // Subject is optional and is required only in case of third party authorization
        //"acct1.Subject" => "",        
    
        // Sample Certificate Credential
        // "acct1.UserName" => "certuser_biz_api1.paypal.com",
        // "acct1.Password" => "D6JNKKULHN3G5B8A",
        // Certificate path relative to config folder or absolute path in file system
        // "acct1.CertPath" => "cert_key.pem",
        // "acct1.AppId" => "APP-80W284485P519543T"
        );
    
    return array_merge($config, self::getConfig());;
  }

}

/*
 * @constant PP_CONFIG_PATH required if credentoal and configuration is to be used from a file
 * Let the SDK know where the sdk_config.ini file resides.
 */
//define('PP_CONFIG_PATH', dirname(__FILE__));

/*
 * use autoloader
 */
if(file_exists( dirname(__FILE__). '/vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    require 'PPAutoloader.php';
    PPAutoloader::register();
}