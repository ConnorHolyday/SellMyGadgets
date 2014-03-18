<div class="wrapper">
	<h1> Congratulations You have just purchased $product </h1>
	<p> This should arrive in the post via royal mail within 2 weeks </p>
	<p> If you are unhappy with your purchase or it does not meet the description please contact support imidietly if this is not dealt with within 30 days of purchase we assume the product was fit for sale </p>
	<?
	echo '<h1> Response </h1>';
	print_r($this->PaySeller);
	echo '<h1> XML STRING </h1>';
	print_r($this->PaySeller->toXMLString());
	?>
</div>









