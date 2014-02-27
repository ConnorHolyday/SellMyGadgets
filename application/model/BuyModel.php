<?php	
	class BuyModel extends BaseModel {
		
	function __construct() {	
		parent::__construct();

		//set paypall information
		Define('API_USERNAME',	'pay_api1.sellmygadgets.co.uk');
		Define('API_PASSWORD',	'Z7NGPB99XNVCPVQ8');
		Define('API_SIGNATURE',	'AFcWxV21C7fd0v3bYYYRCpSSRl31AJWo5DsJ5VSvwtJYMULsWaXzE7MS');	
	}	

	function getProductById($id){
			$product = 'SELECT products.id, products.name, products.price ,product_details.primary_image, product_media.title, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, product_details.created_by ,users.username, product_details.description
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

			return $this->db->execute_assoc_query($product);
	}

	function getSellerDetails($id){
		echo '<br> seller id = ' . $id;

		$sellerInfo = 'SELECT users.username, user_details.first_name, user_details.surname, user_details.adress_1, user_details.adress_2, user_details.town_city, user_details.county, user_details.postcode, user_details.contact_email
					FROM users
					INNER JOIN user_details
					ON users.id = user_details.user_id
					WHERE users.id =' . $id;

		return $this->db->execute_assoc_query($sellerInfo);
	}

	function getBuyerDetails($userName){
		echo '<br> buyer username = ' . $userName;

		$userInfo = 'SELECT users.username, user_details.first_name, user_details.surname, user_details.adress_1, user_details.adress_2, user_details.town_city, user_details.county, user_details.postcode, user_details.contact_email
					FROM users
					INNER JOIN user_details
					ON users.id = user_details.user_id
					WHERE users.username ="' . $userName . '"';
		
		return $this->db->execute_assoc_query($userInfo);			
	}

	function preparePayment(){
		//SET PAYMENT VARIBLES
	}

	function processPayment(){
		//send payment to sellmygadgets
	}

	function getPaymentConfimrmation(){
		//get paypall confirmation
	}

	function updateProducts($id){
			$update = 'UPDATE ';
	}
}