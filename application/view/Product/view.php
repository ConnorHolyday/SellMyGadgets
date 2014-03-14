<?php
	$productID = $this->productId;
	$productName = $this->productName;
	$productPrice = $this->productPrice;
	$productImage = $this->productImage;
	$productImageName = $this->productImageName;
	//$productName 'Category = ' . $this->productCatagory;
	$productDeliveryDate = $this->productDeliveryDate;
	$productDeliveryCost = $this->productDeliveryCost;
	$productCondition = $this->productCondition;
	$productSeller = $this->productSeller;
	//$productSellerID = $this->productSeller;
	$productDescription = $this->productDescription;
?>

<div class="hero-banner">
	<div class="wrapper">
		<h1><?php echo $productName; ?></h1>
	</div>
</div>

<div class="wrapper">

	<nav itemscope itemtype ="https://schema.org/breadcrumb"class="breadcrumb breadcrumb__product">
		<a itemprop="url" href="/">Home</a>
		<a itemprop="url" href="/product/all">Product</a>
		<a itemprop="url"><?php echo $productName; ?></a>
	</nav>

	<div class="row">

		<aside class="col d-2 sidebar__product">

			<div class="boxed module__product">
				<? echo $productImage; ?>

				<!-- <div class="slider">

				</div> -->

				<ul itemscope itemtype="http://schema.org/Product"class="product-meta list-block__list">
					<li itemprop="name"><?php echo $productName ?></li>
					<li itemprop="price">£<?php echo $productPrice ?></li>
					<li itemprop="itemCondition">Condition - <?php echo $productCondition ?></li>
					<li>Sold by: <a href="#"><?php echo $productSeller ?></a></li>
					<li class="tags">Tags: iPhone, Apple, Mobile, Phone</li>
				</ul>

				<a href="/buy/product/<?php echo $productID; ?>" class="btn btn--dark">Buy Product</a>

			</div>

		</aside>

		<section itemscope itemtype="http://schema.org/Product"class="col d-6">

			<h1 itemprop="name"><?php echo $productName; ?></h1>
			<span>Sold by: <a href="#"><?php echo $productSeller; ?></a></span>

			<p itemprop"description"><?php echo $productDescription; ?></p>

			<div class="comments">
				<h2>Comments</h2>
			</div>

		</section>

	</div>

	<section class="related-products">

		<h1>Related Products</h1>

	</section>

</div>
