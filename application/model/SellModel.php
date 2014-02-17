<?php
	class SellModel extends BaseModel {

		function __construct() {
			parent::__construct();
		}

		public function insertNewProduct($name, $category, $brand, $price, $description, $condition) {

			$qry = $this->db->prepare_insert('products',
				'name, category, brand, price, status',
				"'$name', $category, $brand, $price, 1"
			);

			$id = $this->db->insert_return_id($qry);

			$user = AccountService::checkAuth();

			$qry = $this->db->prepare_insert('product_details',
				'product_id, primary_image, description, condition_id, creation_date, created_by, modified_date, modified_by',
				"$id, 0, '$description', $condition, CURDATE(), $user, CURDATE(), $user"
			);

			$this->db->execute_query($qry);

			$qry = $this->db->prepare_insert('user_products', 'user_id, product_id', "$user, $id");

			$this->db->execute_query($qry);
		}
	}