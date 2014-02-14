<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicons -->

		<link rel="shortcut icon" href="favicon.ico">

		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>

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

		<script type="text/javascript" src="/assets/js/libs/modernizr.js"></script>
	</head>
	<?php flush(); ?>
	<body class="<?php echo $this->page; ?>">

	<header class="header header--main bg--light cf">
		<div class="top-bar bg--dark">
		<?php if (isset($_SESSION['LOGIN'])): ?>
			<a href="/account/dashboard" class="top-bar__a">dashboard</a>
			<a href="/account" class="top-bar__a">account</a>
			<a href="/account/logout" class="top-bar__a">logout</a>
		<?php else: ?>
			<a href="/account/signup" class="top-bar__a">signup</a>
			<a href="/account/login" class="top-bar__a">login</a>
		<?php endif ?>
		</div>

		<div class="main-logo">
			<img src="/assets/img/svg/logo.svg">
		</div>

		<nav class="nav nav--main">
			<ul class="nav--main__ul">
				<li class="nav--main__li"><a href="/" class="nav--main__a selected">home</a></li>
				<li class="nav--main__li"><a href="/buy" class="nav--main__a">buy</a></li>
				<li class="nav--main__li"><a href="/sell" class="nav--main__a">sell</a></li>
				<li class="nav--main__li"><a href="/site/about" class="nav--main__a">about</a></li>
			</ul>
		</nav>
	</header>