<h1>Products Page </h1>

<?php
	echo 'Product id = ' . $this->productId . '<br>';
	echo 'Name = ' . $this->productName . '<br>';
	echo 'Price = ' . $this->productPrice . '<br>';
	echo '<img src="' . $this->productImage . '.jpg" alt="' . $this->productImageName . '"><br>';
	echo 'Image name = ' . $this->productImageName . '<br>';
	//echo 'Category = ' . $this->productCatagory . '<br>';
	echo 'Delivery date = ' . $this->productDeliveryDate . '<br>';
	echo 'Delivery cost = ' . $this->productDeliveryCost . '<br>';
	echo 'Condition = ' . $this->productCondition . '<br>';
	echo 'Seller = ' . $this->productSeller . '<br>';	
	echo 'Description = ' . $this->productDescription . '<br>';	
?>