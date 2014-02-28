<?php
	$productID = $this->productId;
	$productName = $this->productName;
	$productPrice = $this->productPrice;
	$productImage = $this->productImage . '.jpg';
	$productImageName = $this->productImageName;
	//$productName 'Category = ' . $this->productCatagory;
	$productDeliveryDate = $this->productDeliveryDate;
	$productDeliveryCost = $this->productDeliveryCost;
	$productCondition = $this->productCondition;
	$productSeller = $this->productSeller;
	//$productSellerID = $this->productSeller;
	$productDescription = $this->productDescription;
?>

<div class="wrapper">

	<nav class="breadcrumb breadcrumb__product">
		<a href="/">Home</a>
		<a href="#">Product Search</a>
		<a href="#"><?php echo $productName; ?></a>
	</nav>

	<div class="row">

		<aside class="col d-2 sidebar__product">

			<div class="boxed">
				<img src="<?php echo $productImage ?>" alt="<?php $productImageName ?>">

				<div class="slider">

				</div>

				<ul class="product-meta list-block__list">
					<li><?php echo $productName ?></li>
					<li>£<?php echo $productPrice ?></li>
					<li>Condition - <?php echo $productCondition ?></li>
					<li>Sold by: <a href="#"><?php echo $productSeller ?></a></li>
				</ul>

				<span class="tags">Tags: iPhone, Apple, Mobile, Phone</span>

				<a href="#" class="btn btn--dark inline-block">Buy Product</a>
			</div>

		</aside>

		<section class="col d-6">

			<h1><?php echo $productName; ?></h1>
			<span>Sold by: <a href="#"><?php echo $productSeller; ?></a></span>

			<p><?php echo $productDescription; ?></p>

			<div class="comments">
				<h2>Comments</h2>
			</div>

		</section>

	</div>

	<section class="related-products">

		<h1>Related Products</h1>

	</section>

</div>