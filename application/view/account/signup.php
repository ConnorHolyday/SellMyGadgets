<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title; ?></title>
	<meta charset="utf-8">
</head>
<body>

	<section class="form form--signup">

		<form action="/account/signup" method="post" class="form">

			<h1>
				Signup Process
			</h1>

			<label for="firstname">First Name:</label>
			<input type="text" name="firstname" class="form__textbox">

			<br>

			<label for="surname">Surname:</label>
			<input type="text" name="surname" class="form__textbox">

			<br>

			<label for="address1">Address Line 1:</label>
			<input type="text" name="address1" class="form__textbox">

			<br>

			<label for="address2">Address Line 2:</label>
			<input type="text" name="address2" class="form__textbox">

			<br>

			<label for="town_city">Town / City:</label>
			<input type="text" name="town_city" class="form__textbox">

			<br>

			<label for="county">County:</label>
			<input type="text" name="county" class="form__textbox">

			<br>

			<label for="postcode">Postcode:</label>
			<input type="text" name="postcode" class="form__textbox">

			<br>

			<label for="phonenumber">Phone Number:</label>
			<input type="tel" name="phonenumber" class="form__textbox">

			<br>
			<br>

			<label for="email">Email:</label>
			<input type="email" name="email" class="form__textbox">

			<br>

			<label for="password">Password:</label>
			<input type="password" name="password" class="form__textbox">

			<br>

			<input type="submit" class="form__submit button button--submit" value="Signup">

		</form>

	</section>

	<script>
		document.getElementsByTagName('input')[0].focus();
	</script>

</body>
</html>