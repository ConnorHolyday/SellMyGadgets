<div class="wrapper">
	<?php 
	if(isset($this->productID)){
		echo '<h1> Buy ' . $this->productName . ' </h1>';
		echo '<p> Hi ' . $this->buyerName . ' You are buyig ' . $this->productName . ' from ' . $this->sellerName . '</p>';
		
		echo 'seller name = ' . $this->sellerName . '<br>';
		echo 'Product name =' . $this->productName . '<br>';
		echo 'Product price = ' . $this->productPrice . '<br>';
		echo 'Postage Cost = ' . $this->productPostage . '<br>';
		echo 'Total Price = ' . ($this->productPostage+$this->productPrice) . '<br>'; 
		echo 'Product Description = ' . $this->productDescription . '<br>';
		echo $this->productImage;


		echo '<p> Please confirm this is the item you wish to purchase by pressing the preceed to payment button</p>';

		echo '<a href="/buy/payment/' . $this->productID . '?confirmation=yes"> Continue </a>';
	} else {
		echo '<h1>Sorry!!</h1>';
		echo '<p>The product you are looking to buy apears to be already sold!!</p>';
	}

	?>
</div>
