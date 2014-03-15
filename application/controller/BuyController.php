<?php
	class BuyController extends BaseController {

		function __construct() {
			parent::__construct();
            AccountService::requiresLogin();
			$this->model = new buyModel();

			//get user information
		}

		function product($id) {
			if(!isset($id)) {  header('Location: /'); }


			$product = $this->model->getProductById($id);	
			$buyerDetails = $this->model->getBuyerDetails($_SESSION['USER_NAME']);
			$sellerDetails = $this->model->getSellerDetails($product[0]['created_by']);
			
			$this->view->buyerName = $buyerDetails[0]['username'];
			$this->view->sellerName = $sellerDetails[0]['username'];

			$this->view->productID = $product[0]['id'];
			$this->view->productName = $product[0]['name'];
		    $this->view->productPrice = $product[0]['price'];
		    $this->view->productPostge = $product[0]['delivery_cost'];
		    $this->view->productDescription = $product[0]['description'];
		    $this->view->productImage = $product[0]['primary_image'];

		    $this->view->render('buy/product', 'Buy' . $product[0]['name'], '',true, true);
		}

		function payment($id){
			if(!isset($id)) {  header('Location: /'); }

			if($_GET['confirmation'] == 'yes'){
				$product = $this->model->getProductById($id);

				$this->view->payment = $this->model->processPayment($product[0]['name'], $product[0]['price'], $product[0]['delivery_cost'], $product[0]['description'], 'Test Payment', $id);
				$this->view->render('buy/payment', 'Procesing payment for' . $product[0]['name'], '',true, true);
			}
		}

		function completion($id){
			if(!isset($id)) {  header('Location: /'); }

			$completion = $this->model->getPaymentConfimrmation($id);
			$this->view->completion = $completion;
			//if payment was succesfull
			//update products and store transaction data
			$this->model->updateTables($id);
			$this->model->storeTransaction($id);

			//$this->model->setPaySeller($amount, $payee);
			//if transaction was sucsessfull
			//$this->model->updateTransaction($id);


			$this->view->payer = $completion->payer;
			$this->view->transaction = $completion->transactions;



			$this->view->render('buy/completion', 'Completed payment for', '',true, true);						
		}
	}