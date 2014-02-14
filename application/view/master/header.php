<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicons -->

		<link rel="shortcut icon" href="/favicon.ico">

		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>

		<script type="text/javascript" src="/assets/js/libs/modernizr.js"></script>

		<link rel="stylesheet" href="/assets/css/styles.css" />

		<!--[if lt IE 9]>
			<script type="text/javascript" src="/assets/js/libs/selectivizr-min.js"></script>
		<![endif]-->

		<!-- Google Analytics <script type="text/javascript">

			var _gaq = _gaq || [];
			var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
			_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
			_gaq.push(['_setAccount', 'UA-********-2']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script> -->

	</head>
	<?php flush(); ?>
	<body class="index">

		<header class="header header--main bg--light cf">
			<div class="top-bar bg--dark">
				<div class="wrapper">
				<?php if (isset($_SESSION['LOGIN'])): ?>
					<a href="/account/dashboard" class="top-bar__a">dashboard</a>
					<a href="/account" class="top-bar__a">account</a>
					<a href="/account/logout" class="top-bar__a">logout</a>
				<?php else: ?>
					<a href="/account/signup" class="top-bar__a">signup</a>
					<a href="/account/login" class="top-bar__a">login</a>
				<?php endif ?>
				</div>
			</div>

			<div class="wrapper">
				<div class="main-logo">
					<a href="/" title="Sell My Gadgets">
						<img src="/assets/img/svg/logo.svg">
					</a>
				</div>

				<nav class="nav nav--main">
					<ul class="nav--main__ul">
						<li class="nav--main__li"><a href="/" class="nav--main__a selected">home</a></li>
						<li class="nav--main__li"><a href="/buy" class="nav--main__a">buy</a></li>
						<li class="nav--main__li"><a href="/sell" class="nav--main__a">sell</a></li>
						<li class="nav--main__li"><a href="/site/about" class="nav--main__a">about</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section class="search search--top cf">
			<div class="wrapper">
				<h1 class="visuallyhidden">SOME SEO SHIT RIGHT HUR</h1>

				<h2 class="h1 index-only search--top__h2--index">Hey, you there. Would you like to buy gadgets at low prices?</h2>
				<p class="index-only search--top__p gamma">I'm sure you could find something you need by searching below.</p>

				<h2 class="h1 search--top__h2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, exercitationem, eligendi, ducimus, vero adipisci iure molestiae neque.</h2>

				<h1></h1>

				<form action="/product/search" method="GET" class="center">
					<label for="search" class="visuallyhidden">search</label>
					<input type="search" placeholder="E.g. iPhone" name="s" class="search--top__input" autocomplete="off">
					<input type="submit" text="peen">
				</form>
			</div>
		</section>