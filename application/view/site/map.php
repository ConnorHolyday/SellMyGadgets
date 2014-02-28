<div class="hero-banner">
	<div class="wrapper">
		<h1>Site map</h1>
	</div>
</div>

<section class="wrapper list-block">

	<?php foreach($this->siteMap as $cat=>$pages) : ?>
		<h1 class="capitalize"><?php echo $cat; ?></h1>

		<ul class="list-block__list">

		<?php foreach($pages as $page) : ?>
			<li>
				<a href="../<?php echo $cat; ?>/<?php echo $page; ?>"><?php echo $page; ?></a>
			</li>
		<?php endforeach; ?>

		</ul>

	<?php endforeach; ?>

</section>