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
			<nav class="pagination pull-left border__none--hover">
				<a href="#">&laquo;</a>
				<a href="#">&lsaquo;</a>
				<a href="#" class="selected">1</a>
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
					<a href="#">Grid</a>
					<a href="#">List</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col d-2">
				<aside class="page-options__sidebar">

					<div class="page-options__sidebar-item list-block__wrap">
						<h2 class="list-block__title">Categories</h2>
						<ul class="list-block__list border__none--hover">
							<li>
								<a href="#">Samsung</a>
							</li>
							<li>
								<a href="#">Apple</a>
							</li>
							<li>
								<a href="#">Nokia</a>
							</li>
							<li>
								<a href="#">Blackberry</a>
							</li>
							<li>
								<a href="#">View More...</a>
							</li>
						</ul>
					</div>

					<div class="page-options__sidebar-item list-block__wrap">
						<h2 class="list-block__title">Condition</h2>
						<ul class="list-block__list border__none--hover">
							<li>
								<a href="#">New</a>
							</li>
							<li>
								<a href="#">Used</a>
							</li>
							<li>
								<a href="#">Not Specified</a>
							</li>
						</ul>
					</div>

					<div class="page-options__sidebar-item list-block__wrap">
						<h2 class="list-block__title">Related</h2>
						<ul class="list-block__list border__none--hover">
							<li>
								<a href="#">iPhone 5S</a>
							</li>
							<li>
								<a href="#">iPhone 5C</a>
							</li>
							<li>
								<a href="#">iPhone 5</a>
							</li>
							<li>
								<a href="#">iPhone 4S</a>
							</li>
						</ul>
					</div>
				</aside>
			</div>
		</div>

		<div class="page-options cf">
			<nav class="pagination pull-left border__none--hover">
				<a href="#">&laquo;</a>
				<a href="#">&lsaquo;</a>
				<a href="#">10</a>
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
					<a href="#">Grid</a>
					<a href="#">List</a>
				</div>
			</div>
		</div>

	</div>
</div>