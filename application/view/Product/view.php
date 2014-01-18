<h1>Products Page </h1>

<?php
	echo 'Product id = ' . $this->view->productId . '<br>';
	echo 'Name = ' . $this->view->productName . '<br>';
	echo 'Price = ' . $this->view->productPrice . '<br>';
	echo '<img src="' . $this->view->productImage . '.jpg" alt="' . $this->view->productImageName . '"><br>';
	echo 'Image name = ' . $this->view->productImageName . '<br>';
	echo 'Category = ' . $this->view->productCatagory . '<br>';
	echo 'Delivery date = ' . $this->view->productDeliveryDate . '<br>';
	echo 'Delivery cost = ' . $this->view->productDeliveryCost . '<br>';
	echo 'Condition = ' . $this->view->productCondition . '<br>';
	echo 'Seller = ' . $this->view->productSeller . '<br>';	
	echo 'Description = ' . $this->view->productDescription . '<br>';	
?>