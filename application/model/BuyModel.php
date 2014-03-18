<?php
	use PayPal\Auth\OAuthTokenCredential;
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;
	use PayPal\Api\ExecutePayment;
	use PayPal\Api\PaymentExecution;

	use PayPal\Rest\ApiContext;
	
	class BuyModel extends BaseModel {

	function __construct() {	
		parent::__construct();	
	}	

	function getProductById($id){
			$product = 'SELECT products.id, products.name, products.price, products.status, product_details.primary_image, product_media.title, product_media.extension, product_categories.category_name, product_delivery.delivery_date, Product_delivery.delivery_cost, product_condition.condition_name, product_details.created_by ,users.username, product_details.description
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
		$sellerInfo = 'SELECT users.username, user_details.first_name, user_details.surname, user_details.adress_1, user_details.adress_2, user_details.town_city, user_details.county, user_details.postcode, user_details.contact_email, user_details.PPEmail
					FROM users
					INNER JOIN user_details
					ON users.id = user_details.user_id
					WHERE users.id =' . $id;

		return $this->db->execute_assoc_query($sellerInfo);
	}

	function getBuyerDetails($userName){
		$userInfo = 'SELECT users.id, users.username, user_details.first_name, user_details.surname, user_details.adress_1, user_details.adress_2, user_details.town_city, user_details.county, user_details.postcode, user_details.contact_email
					FROM users
					INNER JOIN user_details
					ON users.id = user_details.user_id
					WHERE users.username ="' . $userName . '"';
		
		return $this->db->execute_assoc_query($userInfo);			
	}

	function getAccessToken($clientID, $clientSecret){
		$apiContext = new ApiContext(new OAuthTokenCredential($clientID,$clientSecret));

		$apiContext->setConfig(
		array(
			'mode' => 'sandbox',
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => true,
			'log.FileName' => '../PayPal.log',
			'log.LogLevel' => 'FINE'
			)
		);

		return $apiContext;
	}

	function setTransaction($id){
		$product = $this->getProductById($id);
		$buyer = $this->getBuyerDetails($_SESSION['USER_NAME']);

		$percent = ($product[0]['price'] / 100) * 3;
		$fees = $percent + 0.30;

		$date = date('m/d/Y h:i:s a');
		$cost = $product[0]['price'] + $fees + $product[0]['delivery_cost'];

		$query = 'INSERT INTO `transactions` (`buyer_id`, `seller_id`, `product_id`, `Cost`, `status_id`)
					VALUES (' . $buyer[0]['id'] . ',' . $product[0]['created_by'] . ',' . $id . ',' . $cost . ', 2);';

		$this->db->execute_query($query);
	}

	function setProductPurchased($id){
		$this->db->execute_query('UPDATE `products`
									SET `status` = 3
									WHERE `id` =' . $id);
	}

	function setTransactionComplete($id){
		$this->db->execute_query('UPDATE `transactions` 
									SET `status_id` = 3
									WHERE producr_id =' . $id);
	}

	function setShippingAddress($id, $line1, $line2, $city, $county, $postCode){
		$query = 'INSERT INTO product_shipping (product_id, line1, line2, city, county, postcode)
					VALUES (' . $id . ',' . $line1 . ',' . $line2 . ','  . $city . ',' . $county . ',' . $postCode . ');'; 

	}

	function processPayment($itemName, $itemPrice, $itemPostage, $itemDescription, $paymentDescription, $id){

		$apiContext = $this->getAccessToken(SANDBOX_CLIENTID, SANDBOX_SECRET);

		$percent = ($itemPrice / 100) * 3;
		$fees = $percent + 0.30;
		$totalPrice = $itemPostage + $fees + $itemPrice;

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item = new Item();
		$item->setName($itemName)
			->setCurrency(PAYPAL_CURRENCY)
			->setQuantity(1)
			->setPrice($itemPrice);

		$itemList = new ItemList();
		$itemList->setItems(array($item));

		$details = new Details();
		$details->setShipping($itemPostage)
				->setTax('0')
				->setSubtotal($itemPrice);

		$amount = new Amount();
		$amount->setCurrency(PAYPAL_CURRENCY)
			->setTotal($itemPrice + $itemPostage)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription("Payment description");

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("http://sellmygadgets.local/buy/completion/" . $id . "?success=true")
					 ->setCancelUrl("http://sellmygadgets.local/but/completion/" . $id . "?success=false");

		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setRedirectUrls($redirectUrls)
			->setTransactions(array($transaction));

		try {
			$payment->create($apiContext);
		} catch (PayPal\Exception\PPConnectionException $ex) {
			echo "Exception: " . $ex->getMessage() . PHP_EOL;
			var_dump($ex->getData());	
			exit(1);
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirectUrl = $link->getHref();
				break;
			}
		}

		$_SESSION['paymentId'] = $payment->getId();
		if(isset($redirectUrl)) {
			header("Location: $redirectUrl");
			exit;
		}
	}

	function getPaymentConfimrmation(){

		$apiContext = $this->getAccessToken(SANDBOX_CLIENTID, SANDBOX_SECRET);

		if(isset($_GET['success']) && $_GET['success'] == 'true') {

			$paymentId = $_SESSION['paymentId'];
			$payment = Payment::get($paymentId, $apiContext);

			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);

			$result = $payment->execute($execution, $apiContext);

		} else {
			$result = "User cancelled payment.";
		}

		return $result;
	}

	function setPaySeller($amount, $payee){

		$logger = new PPLoggingManager('MassPay');

		$massPayReq = new MassPayReq();
		$massPayItemArray = array();

		$amount1 = new BasicAmountType(PAYPAL_CURRENCY ,$amount);
		$massPayRequestItem1 = new MassPayRequestItemType($amount1);

		$massPayRequestItem1->ReceiverEmail = $payee;

		$massPayItemArray[0] = $massPayRequestItem1;

		$massPayRequest = new MassPayRequestType($massPayItemArray);
		$massPayReq->MassPayRequest = $massPayRequest;

		$service = new PayPalAPIInterfaceServiceService();

		try {
			$response = $service->MassPay($massPayReq);
		} catch (Exception $ex) {
			$logger->error("Error Message : " + $ex->getMessage());
		}
		if ($response->Ack == "Success") {
			$logger->log("Mass Pay successful");
		}
		else {
			$logger->error("API Error Message : ". $response->Errors[0]->LongMessage);
		}
		return $response;
	}
}