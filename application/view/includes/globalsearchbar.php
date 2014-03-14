	<section class="search search--top cf">
		<div class="wrapper">
			<h1 class="visuallyhidden">SOME SEO SHIT RIGHT HUR</h1>

			<h2 class="h1 search--top__h2--index">Hey, you there. Would you like to buy gadgets at low prices?</h2>
			<p class="search--top__p gamma">I'm sure you could find something you need by searching below.</p>

			<h2 class="h1 search--top__h2">Can't find what you're looking for? Search below.</h2>

			<form action=<?php echo '"http://' . $_SERVER['HTTP_HOST'] . '/product/search"'; ?>method="GET" class="center search-form">
				<label for="search" class="visuallyhidden">search</label>

				<div class="search-wrap">
						<input type="search" placeholder="E.g. iPhone" name="s" class="search--top__input" autocomplete="off">
						<button type="submit" class="icon-search search-button"></button>
				</div>
			</form>
		</div>
	</section>
