<?php
	class BuyController extends BaseController {

		function __construct() {
			parent::__construct();
            AccountService::requiresLogin();
			$this->model = new buyModel();
		}

		//gather product information to confirm sale
		function product($id) {
			//if(!isset($id)) {  header('Location: /'); }

			$getProduct = $this->model->getProductById($id);
			if($getProduct[0]['status'] != 1) {header('Location: /'); }	
		
			$buyerDetails = $this->model->getBuyerDetails($_SESSION['USER_NAME']);
			$sellerDetails = $this->model->getSellerDetails($getProduct[0]['created_by']);

			$product = array(
				'id' => $getProduct[0]['id'],
				'name' => $getProduct[0]['name'],
				'price' => $getProduct[0]['price'],
				'postage' => $getProduct[0]['delivery_cost'],
				'description' => $getProduct[0]['description'],
				'condition' => $getProduct[0]['condition_name'],
				'image' => '<img src="/' . STATIC_2 . 'medium/' . $getProduct[0]['primary_image'] . $getProduct[0]['extension'] . '" alt="' . $getProduct[0]['title'].'">'
			);

			$this->view->product = $product;
			$this->view->buyerName = $buyerDetails[0]['username'];
			$this->view->sellerName = $sellerDetails[0]['username'];
		    $this->view->render('buy/product', 'Buy' . $getProduct[0]['name'], '',true, true);
		}

		//process payment with paypal
		function payment($id){
			if(!isset($id)) {  header('Location: /'); }

			if($_GET['confirmation'] == 'yes'){
				$product = $this->model->getProductById($id);

				$this->view->payment = $this->model->processPayment($product[0]['name'], $product[0]['price'], $product[0]['delivery_cost'], $product[0]['description'], 'Test Payment', $id);
				$this->view->render('buy/payment', 'Procesing payment for' . $product[0]['name'], '',true, true);
			}
		}


		/*
		Checks payment was succsesfull 
		stores transaction data in database t
		transfers payment to seller
		renders confirmation page
		*/
		function completion($id){
			if(!isset($id)) {  header('Location: /'); }

			$completion = $this->model->getPaymentConfimrmation($id);
			$transactions = $completion->getTransactions();
			$payer = $completion->payer->getPayerInfo();
			$address = $payer->getShippingAddress();

			$payerDetails = array( 
				'FirstName' => $payer->getFirstName(),
				'LastName' => $payer->getLastName(),
				'PayPalId' => $payer->getPayerId(),
				'Email' => $payer->getEmail(),
				'AddressLine1' => $address->getLine1(),
				'AddressLine2' => $address->getLine2(),
				'AddressCity' => $address->getCity(),
				'AddressCountryCode' => $address->getCountryCode(),
				'AddressPostalCode' => $address->getPostalCode()
			);
			
			$auth = array(
				'state' => $completion->getState(),
			);

			if($auth['state'] == 'approved'){
				$product = $this->model->getProductById($id);
				$seller = $this->model->getSellerDetails($product[0]['created_by']);

				$amount = ($product[0]['price'] + $product[0]['delivery_cost']);
				$fee = (($amount / 100) * 5) + 0.30;
				$total = $amount + $fee;

				$this->view->payerDetails = $payerDetails;

				$this->model->updateTables($id);
				$this->model->storeTransaction($id, $payerDetails['PayPalId']);		

				echo '<br> product created by : ' . $product[0]['created_by'] . '<br>';
				echo '<br> Sellers email = : ' . $seller[0]['PPEmail'] . '<br>';

				$this->view->PaySeller = $this->model->setPaySeller($total, $seller[0]['PPEmail']);
				$this->model->updateTransaction($id);
			} else {
				$this->view->errorMessage = 'Payment Was Not Approved';
			}

			$this->view->render('buy/completion', 'Completed payment for', '',true, true);						
		}
	}