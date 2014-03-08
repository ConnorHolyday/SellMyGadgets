<?php
	class ProductModel extends BaseModel {

		function __construct() {
			parent::__construct();
		}

		function loadAllProducts($category ,$condition ,$sort ,$first) {
			$query = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_media.extension ,product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
					FROM products
					INNER JOIN product_details
					ON products.id = product_details.product_id
					INNER JOIN product_categories
					ON products.category = product_categories.id
					INNER JOIN product_media
					ON product_details.primary_image = product_media.id
					INNER JOIN product_condition
					ON product_details.condition_id = product_condition.id
					INNER JOIN product_delivery
					ON product_details.delivery_id = product_delivery.id
					INNER JOIN users
					ON product_details.created_by = users.id
					WHERE ' .  $category . ' AND ' . $condition . '
					ORDER BY ' . $sort . '
					LIMIT ' . $first . ',' . PAGE_ITEMS;

					echo $query;

			return $this->db->execute_assoc_query($query);
		}

		function getProductById($id) {
			$products = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_media.extension, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
						FROM products
						INNER JOIN product_details
						ON products.id = product_details.product_id
						INNER JOIN product_categories
						ON products.category = product_categories.id
						INNER JOIN product_media
						ON product_details.primary_image = product_media.id
						INNER JOIN product_condition
						ON product_details.condition_id = product_condition.id
						INNER JOIN product_delivery
						ON product_details.delivery_id = product_delivery.id
						INNER JOIN users
						ON product_details.created_by = users.id
						WHERE products.id = ' . $id;

			$Images = $this->db->prepare_select('id, title, extension', 'product_media', 'product_id =' . $id);

			$Comments = $this->db->prepare_select('*', 'product_comments', 'product_id = ' . $id);

			return array($this->db->execute_query($products), $this->db->execute_query($Images), $this->db->execute_query($Comments));
		}

		

		function countAllProducts(){
			$products = 'SELECT * FROM products';

			return $this->db->count_rows($products);
		}

		function getAllCategories(){
			$categories = 'SELECT * FROM product_categories';

			return $this->db->execute_query($categories);
		}

		function getAllConditions(){
			$conditions = 'SELECT * FROM product_condition';

			return $this->db->execute_query($conditions);
		}
	}
