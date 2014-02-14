<?php
foreach ($this->products as $product) {
		echo $product;
}
?>

<div class="wrapper">
	<nav class="breadcrumb breadcrumb__product">
		<a href="/">Home</a>
		<a href="#">Product Search</a>
		<a href="#">Product Search for "iPhone"</a>
	</nav>

	<div class="content">

		<div class="page-options cf">
			<nav class="pagination pull-left">
				<a href="#">&laquo;</a>
				<a href="#">&lsaquo;</a>
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<span>&hellip;</span>
				<a href="#">20</a>
				<a href="#">&rsaquo;</a>
				<a href="#">&raquo;</a>
			</nav>

			<div class="pull-right page-options__view">
				<div class="inline-block page-options__view--sort">
					<span>Sort:</span>
					<select name="sort">
						<option value="1">Name (A-Z)</option>
						<option value="2">Name (Z-A)</option>
						<option value="3">Price (Low - High)</option>
						<option value="4">Price (High - Low)</option>
					</select>
				</div>

				<div class="inline-block page-options__view--grid">
					<span>View:</span>
					<a href="#">
						<span>Grid</span>
					</a>
					<a href="#">
						<span>List</span>
					</a>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col d-2">
				<aside class="page-options page-options__sidebar">

					<div class="categories">
						<h1>Categories</h1>
					</div>

					<div class="condition">
						<h1>Condition</h1>
					</div>

					<div class="related">
						<h1>Related</h1>
					</div>
				</aside>
			</div>
		</div>

	</div>
</div>