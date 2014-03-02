<?php	
	class SearchModel extends BaseModel {

		public $long;
		public $lat;
		
		function __construct($user) {	
			parent::__construct();

			//getlocation of user

		}

		function searchByAlphabeticalAsc($keyword, $first){
					$query = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
					WHERE products.name LIKE'  . $keyword .
					'ORDER BY name ASC
					LIMIT' . $first . ',' . PAGE_ITEMS;

		}

		function searchByalphabeticalDec($keyword, $first){
			$query = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
					WHERE products.name LIKE'  . $keyword .
					'ORDER BY name ASC
					LIMIT ' . $first . ',' . PAGE_ITEMS;
		}

		function searchByPriceBigest($keyword, $first){
			$query = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
					WHERE products.name LIKE'  . $keyword .
					'ORDER BY price DESC
					LIMIT ' . $first . ',' . PAGE_ITEMS;
		}

		function searchByPriceSmallest($keyword, $first){
			$query = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
					WHERE products.name LIKE'  . $keyword .
					'ORDER BY price ASC
					LIMIT ' . $first . ',' . PAGE_ITEMS;
		}

		function searchByLocation(){

		}

		function countAllProducts($search){

		}

	}

