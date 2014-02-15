<?php

	class SellService {

		function __construct() {

		}

		function populateSelectTagByName($name) {
			$db = new Database();

			$db->prepare_basic_select('*', 'product_' . $name);
		}

	}