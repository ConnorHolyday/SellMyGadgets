<div class="hero-banner">
	<div class="wrapper">
		<h1>Purchase Review - Item Details</h1>
	</div>
</div>

<div class="wrapper">

	<? if(isset($this->product['id'])){ ?>

		<nav itemscope itemtype="https://schema.org/breadcrumb/<?php echo $this->product['id']; ?>" class="breadcrumb breadcrumb__buy">
			<a itemprop="url" href="/buy/product/<?php echo $this->product['id']; ?>" class="selected">Details</a>
			<a itemprop="url" href="/buy/shipping/<?php echo $this->product['id']; ?>">Shipping</a>
			<a itemprop="url" href="/buy/total/<?php echo $this->product['id']; ?>">Total</a>
		</nav>

		<div class="row / module__product">

			<div class="col m-all t-1 d-2">
				<?php echo $this->product['image']; ?>
			</div>

			<ul class="col m-all t-3 d-6 list-block__list">

				<li>Product - <?php echo $this->product['name']; ?></li>

				<li>Condition - <?php echo $this->product['condition']; ?></li>

				<li>Description - <?php echo $this->product['description']; ?></li>

			</ul>

		</div>

		<form action="/buy/shipping/<?php echo $this->product['id']; ?>" class="submit-form">

			<button class="pull-right / form__submit">Next Stage</button>

		</form>


		<div class="module__product">

			<h1>Purchase Review - Shipping</h1>

			<?php //if ($deliveryOption == shipping) : ?>

				<p>Please choose your desired shipping address.</p>

				<form action="/buy/total/<?php echo $this->product['id']; ?>" class="submit-form">

					<input type="radio" name="shipping" value="paypal">
					<label>Paypal Address</label>

					<input type="radio" name="shipping" value="user">
					<label>Account Address</label>

					<input type="radio" name="shipping" value="other">
					<label>Other Address</label>

					<?php //if ( other ) : ?>

						<ul class="list-block__list">

						<!-- Take form from signup -->

							<li>Line 1</li>

							<li>Line 2</li>

							<li>City</li>

							<li>County</li>

							<li>Post Code</li>

						</ul>

					<?php //endif; ?>

					<button class="pull-right / form__submit">Next Stage</button>

				</form>

			<?php //else : ?>

				<p>The item you have purchased is collection only.</p>

			<?php //endif; ?>

		</div>


		<div class="module__product">

	    <h1>Purchase Review - Total Cost</h1>

	  	<ul class="list-block__list">

	  		<li>Product - £<? echo $this->product['price']; ?></li>

	  		<li>Postage - £<? echo $this->product['postage']; ?></li>

				<li>Total - £<? echo ($this->product['postage']+$this->product['price']); ?></li>

			</ul>

	  </div>

		<form action="/buy/payment/<?php echo $this->product['id']; ?>" class="submit-form">

			<button class="pull-right / form__submit">Confirm Purchase</button>

		</form>


	<? } else { ?>

		<h1>Sorry!</h1>

		<p>The product you are looking to buy apears to be already sold!</p>

	<?php } ?>

</div>
