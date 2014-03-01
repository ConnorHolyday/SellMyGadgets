<?php

	class validation {

		public static $regexes = Array(
			'date' => "^[0-3][0-9][-/][0-1][0-9][-/][0-9]{4}\$",
			'phone' => "^[0-9]{10,11}\$",
			'postcode' => "^[1-9][0-9]{3}[a-zA-Z]{2}\$",
			'email' => " ^[0-9a-zA-Z]{}[-@][0-9a-zA-Z][.]",
	    );

		//strip a string of its tags
		function strip($string) {
			$result = strip_tags ($string), preg_replace($find5, $replace5,$string); 
			$find5 = array ('/;/', '/+/', '/-/', '/=/', '/"/');
			$replace5 = array ('','','','','')
			return $result;
		}

		//ensure string is a date
		function aDate($string){
			// day= 0-3 0-9 --- mounth 0-1 - 0-9 year 1920 - 2000
			return true;


		}

		//ensure string is a post code
		function postCode($string) {
			//AA9A 9AA - A9A 9AA - A9 9AA- A99 9AA - AA9 9AA - AA99 9AA

			return true;

		}

		//ensure string is a phone number
		function phone($string) {
			return true;
			// 10-11 total numbers
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