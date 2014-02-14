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


		}

		//ensure string is a date
		function aDate($string){


		}

		//ensure string is a post code
		function postCode($string) {


		}

		//ensure string is a phone number
		function phone($string) {


		}

		//ensure string is a mobile number
		function mobile($string) {


		}

		//ensure string is an e-mail
		function eMail($string) {


		}

		//encrypt a string
		function encrypt($string) {


		}
	}