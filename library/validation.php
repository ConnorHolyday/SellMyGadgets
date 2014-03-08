<?php

	class validation {

		public static $regexes = Array(
			'date' => "^[0-3][0-9][-/][0-1][0-9][-/][0-9]{4}\$",
			'phone' => "^[0-9]{10,11}\$",
			'postcode' => "^[1-9][0-9]{3}[a-zA-Z]{2}\$",
			'email' => " ^[0-9a-zA-Z]{}[-@][0-9a-zA-Z][.]",
	    );

		//strip a string of its tags and special characters
		function strip($string) {
			$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
			$result = (filter_var($string, FILTER_SANITIZE_STRING)); 
			return $result; 
		}

		 

		//ensure string is a date
		function aDate($string){ // checks that adate is valid

	if (strlen($string) > 10) {  //checks that the date is not longer than 10 characters
    return FALSE;
  }
  else {
	 $pieces = explode('/', $string); // seperates the string into day/month/year
	 if (count($pieces) != 3) { 	  // checks that there is three sections to the string
	 	return FALSE;
	 }

	 else{
	 	$day = $pieces[0];
      	$month = $pieces[1];
      	$year = $pieces[2];
      	return checkdate($month, $day, $year);	//uses checkdate to validate and returns true/false
    		}	
		} 
	}

		//ensures string is a post code
		function postCode($string) {
	$formats = array(		// The diffrent valid postcode are in arrays for easyier to read code
		'format' => 		'/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/',				
		'format2' => 		'/^[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}$/', 
		'UniquePostCode' => '/^GIR0[A-Z]{2}$/'
		);

	$string = strtoupper(str_replace(' ','',$string)); // removes the space 
		if(preg_match($formats['format'],$string) || preg_match($formats['format2'],$string) || preg_match($formats['UniquePostCode'],$string)) //Preg_match checks the string against each format to ensure the input is a valid postcode
			return true;
		else
			return false;
		}

		//ensure string is a phone number
		function phone($string) {
			$numbers = preg_replace("/[^0-9]/","", $string); //removes all non number characters
			$length = strlen($numbers);  
			
			
			if($length == 10 ){  
			 	return true;
			}
				elseif($length == 11) {
			 		return true; 
			}
				else{
					return false;
				}
			}

		//ensure string is a mobile number
		function mobile($string) {
			return true;
			// 11numbers total
		}

		//ensure string is an e-mail
		function eMail($string) {
			
			return true;
			//Some amount of characters - @ symbol .character 2-3 characters
		}

		//encrypt a string
		function encrypt($string) {
			$result = md5($string);
			return $result;

		}
		function fileType($string){
				//not allowed .css .html .php etc also allowed list 

			return true;

		}
	}