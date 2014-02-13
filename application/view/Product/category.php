<h1> product category </h1>

<?php
	echo 'Product id = ' . $this->productId . '<br>';
	echo 'Name = ' . $this->productName . '<br>';
	echo 'Price = ' . $this->productPrice . '<br>';
	echo '<img src="' . $this->productImage . '.jpg" alt="' . $this->productImageName . '"><br>';
	echo 'Image name = ' . $this->productImageName . '<br>';
	echo 'Category = ' . $this->productCategory . '<br>';
	echo 'Description = ' . $this->productDescription . '<br>';	
?>
