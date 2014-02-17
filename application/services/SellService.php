<?php

	class SellService {

		function __construct() {

		}

		function populateSelectTagByName($name, $field) {
			$db = new Database();

			$qry = $db->prepare_basic_select('*', 'product_' . $name);
			$arr = $db->execute_assoc_query($qry);

			if($arr != null) {

				$options = '';

				foreach($arr as $option) {
					$options .= '<option value="' . $option['id'] . '">' . $option[$field . '_name'] . '</option>';
				}

				return $options;
			}
		}

	}