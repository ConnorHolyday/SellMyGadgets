<?php
	class BuyController extends BaseController {

		function __construct() {
			parent::__construct();
            AccountService::requiresLogin();
			$this->model = new buyModel();

			//get user information
			$this->model->getBuyerDetails();
		}


		function product($id) {
			$product = $this->model->getProductById($id);	    
			$seller = $this->model->getSellerDetails();

			echo '<pre>';
			print_r($product);
			echo '</pre>';
		    //$price;
		    //$postge;

		    //$TotalDue = $price + $postage;

		    $this->view->render('buy/product', 'Buy' . '', true, true);
		}

		function payment(){

			//enter payment details
			//process payment

		}

		function confirmation(){

			//check payment was complete

			//if payment complete update tables

		}
	}