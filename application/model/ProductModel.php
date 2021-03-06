<?php
	class ProductModel extends BaseModel {

		function __construct() {
			parent::__construct();
		}

		function loadAllProducts($category ,$condition ,$sort ,$first) {
			$query = 	'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_media.extension ,product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
						WHERE products.status = 1 AND ' .  $category . ' AND ' . $condition . '
						ORDER BY ' . $sort . '
						LIMIT ' . $first . ',' . PAGE_ITEMS;

			return $this->db->execute_query($query);
		}

		function getProductById($id) {
			$query = 	'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_media.extension, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
						WHERE products.status = 1 AND products.id = ' . $id;

			return $this->db->execute_assoc_query($query);
		}

		function searchProductsByName($search, $category ,$condition ,$sort ,$first){
			$query = 	'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_media.extension, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, users.username, product_details.description
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
						WHERE products.status = 1 AND ' .  $category . ' AND ' . $condition . ' AND products.name LIKE "%' . $search . '%"
						ORDER BY ' . $sort . '
						LIMIT ' . $first . ',' . PAGE_ITEMS;

			return $this->db->execute_assoc_query($query);
		}

		function countAllProducts(){
			$products = 'SELECT * FROM products';

			return $this->db->count_rows($products);
		}

		function countAllSearchedProducts($search, $category ,$condition){
			$query = 'SELECT * 
						FROM products
						INNER JOIN product_details
						ON products.id = product_details.product_id
						INNER JOIN product_categories
						ON products.category = product_categories.id
						INNER JOIN product_condition
						ON product_details.condition_id = product_condition.id
						WHERE products.status = 1 AND ' .  $category . ' AND ' . $condition . ' AND products.name LIKE "%' . $search . '%"';
	
			return $this->db->count_rows($query);
		}

		function countAllFilteredProducts($category ,$condition){
			$query = 	'SELECT * 
						FROM products
						INNER JOIN product_details
						ON products.id = product_details.product_id
						INNER JOIN product_categories
						ON products.category = product_categories.id
						INNER JOIN product_condition
						ON product_details.condition_id = product_condition.id
						WHERE products.status = 1 AND ' .  $category . ' AND ' . $condition;

			return $this->db->count_rows($query);
		}

		function getAllCategories(){
			$categories = 'SELECT * FROM product_categories';

			return $this->db->execute_query($categories);
		}

		function getAllConditions(){
			$conditions = 'SELECT * FROM product_condition';

			return $this->db->execute_query($conditions);
		}

		function getAllImages($id){
			$query = $this->db->prepare_select('id, title, extension', 'product_media', 'product_id =' . $id);

			return $this->db->execute_query($query);
		}

		function getQuestion($id){
			$query =  'SELECT product_comments.id, product_comments.product_id, product_comments.comment_id, product_comments.comment, users.username FROM product_comments INNER JOIN users ON product_comments.user_id = users.id WHERE product_id =' . $id . ' AND comment_id = 0';

			return $this->db->execute_assoc_query($query);
		}

		function getComments($id, $comment_id){
			$query =  'SELECT product_comments.id, product_comments.product_id, product_comments.comment_id, product_comments.comment, users.username FROM product_comments INNER JOIN users ON product_comments.user_id = users.id WHERE product_id =' . $id . ' AND comment_id = ' . $comment_id;

			
			return $this->db->execute_assoc_query($query);
		}

		function setComment($UserID, $productID, $commentID,  $comment){
			$query = 'INSERT INTO product_comments (product_id, comment_id, user_id, comment)
				VALUES (' . $productID . ',"' . $commentID . '","' . $UserID . '","'  . $comment . '");'; 

			$this->db->execute_query($query);
		}

		function getUserID($userName){
			$userInfo = 'SELECT users.id, users.username 
						FROM users
						WHERE users.username ="' . $userName . '"';

			return $this->db->execute_assoc_query($userInfo);			
		}
	}
