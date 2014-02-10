<?php 	
	class ProductModel extends BaseModel {
		
		function __construct() {
			parent::__construct();	
		}
		
		function loadAllProducts() {
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
					ON product_details.created_by = users.id;';
														
			return $this->db->execute_query($query);
		}
		
		function getProductById($id) {
			$products = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
			
			$Images = 	'SELECT id, title
						FROM product_media
						WHERE product_id =' . $id; 
								
			$Comments= 	'SELECT * 
						FROM product_comments
						WHERE product_id = ' . $id;
								
			return array($this->db->execute_query($products), $this->db->execute_query($Images), $this->db->execute_query($Comments));				
		}

<<<<<<< HEAD
		function getProductByCatagoryId($catagory){
			$products = 		'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
								WHERE product_categories.id = ' . $catagory;
=======
		function getProductByCatagory($catagory){
			$products = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
						WHERE product_categories.id = ' . $catagory;
>>>>>>> 055b48e7636d0f20db0ffbe966e11fd90c55ec27
								
			return $this->db->execute_query($products);
		}
<<<<<<< HEAD

		function getProductByCatagory($catagory){
			$products = 		'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
								WHERE product_categories.category_name = "' . $catagory . '"';
						
			return $this->db->doQuery($products);				
		}
=======
>>>>>>> 055b48e7636d0f20db0ffbe966e11fd90c55ec27
	}
?>	
	