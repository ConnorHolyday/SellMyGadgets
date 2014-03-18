<div class="wrapper">
	<br>
<? if(isset($this->product['id'])){ ?>
	<div class="boxed module__product">
	  <h1>Basket</h1>
	  <ul class="product-meta list-block__list">
        <li><?php echo $this->product['name']; ?></li>
        <li>£<?php echo $this->product['price']; ?></li>
        <li>Condition - <?php echo $this->product['condition']; ?></li>
        <li><?php echo $this->product['description']; ?></li>
        <li class="tags">Tags: iPhone, Apple, Mobile, Phone</li>
      </ul>
    </div>
    <div class="boxed module__product">
      <h1>Shipping</h1>
      	<p>Please select your shipping prefrence</p>
		<form action="">
		<input type="radio" name="sex" value="male"> Paypal Address <br>
		<p> This will tell the seller to ship your prodoct to the paypal account holders address </p>
		<input type="radio" name="sex" value="female"> Account Address <br>
		<ul class="product-meta list-block__list">
			<li>Line 1</li>
			<li>Line 2</li>
			<li>City</li>
			<li>County</li>
			<li>Post Code</li>
		</ul>
		</form>
    </div> 
    <div class="boxed module__product">
      <h1>Purchase Details</h1>
      	<ul class="product-meta list-block__list">
      		<li><? echo 'Product price = ' . $this->product['price'] . '<br>'; ?></li>
      		<li><? echo 'Postage Cost = ' . $this->product['postage'] . '<br>'; ?></li>
	      	<li>Estimated Delivery Date : 12/13/11</li>
	      	<li>Shipping carrier : Royal mail 1st class</li>    	
			<li><? echo 'Total Price = ' . ($this->product['postage']+$this->product['price']) . '<br>'; ?></li>
		</ul>
		
    </div>
     <a href="/buy/payment/<?php echo $this->product['id']; ?>?confirmation=yes" class="btn btn--dark">Confirm</a>
	<?
	} else {
		echo '<h1>Sorry!!</h1>';
		echo '<p>The product you are looking to buy apears to be already sold!!</p>';
	}

	?>
</div>