<?php 	
	class ProductModel extends BaseModel {
		
		function __construct() {
			$this->db = new DB();
		}
		
		function loadAllProducts() {

			echo '->products by alls';

			$query = 			'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
														
			return $this->db->doQuery($query);
		}
		
		function getProductById($id){

			echo '->product by id';

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
								WHERE products.id = ' . $id;
			
			$Images = 		'SELECT id, title
								FROM product_media
								WHERE product_id =' . $id; 
								
			$Comments= 		'SELECT * 
								FROM product_comments
								WHERE product_id = ' . $id;
								
			return array($this->db->doQuery($products),	$this->db->doQuery($Images),$this->db->doQuery($Comments));				
		}

		function getProductByCatagory($catagory){

			echo '->product by catagory';	

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

								
			return $this->db->doQuery($products);				
		}

	}
	
	