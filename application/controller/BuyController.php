<?php
	class BuyController extends BaseController {

		function __construct() {
			parent::__construct();
            AccountService::requiresLogin();
			$this->model = new buyModel();

			//get user information
		}

		function product($id) {
			$product = $this->model->getProductById($id);	
			$buyerDetails = $this->model->getBuyerDetails($_SESSION['USER_NAME']);
			$sellerDetails = $this->model->getSellerDetails($product[0]['created_by']);

			var_dump($buyerDetails);
			var_dump($sellerDetails);
			$productName = $product[0]['name'];
		    $productPrice = $product[0]['price'];
		    $productPostge = $product[0]['delivery_cost'];

		    $this->view->render('buy/product', 'Buy' . '', true, true);
		}

		function payment(){
			//enter payment details
			//process payment
			//$this->model->preparePayment();
		}

		function confirmation(){
			//check payment was complete
			//if payment complete then update tables
			//automate paying seller from smg paypal acount
		}
	}