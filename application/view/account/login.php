<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title; ?></title>
	<meta charset="utf-8">
</head>
<body>

	<section class="form form--login">
		<form action="/account/login" method="post">

			<h1>
				Please Login to continue
			</h1>

			<label for="username">Username:</label>
			<input type="text" name="username" class="form__input">

			<label for="password">Password:</label>
			<input type="password" name="password" class="form__input">

			<?php if(isset($_GET['from'])): ?>

			<input type="hidden" name="to" value="<?php echo $_GET['from']; ?>">

			<?php endif ?>

			<input type="submit" class="button button--submit" value="Login">

		</form>

	</section>

	<script>
		document.getElementsByTagName('input')[0].focus();
	</script>
</body>
</html>