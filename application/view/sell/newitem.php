<section class="wrapper">

	<h1>Sell new item</h1>

	<form action="/account/signup" method="post" class="form">


		<label for="productname">Product Name:</label>
		<input type="text" name="productname" class="form__textbox">

		<br>

		<label for="category">Category:</label>
		<select name="category">
			<option value="1">Mobile Phone</option>
			<option value="2">Computer</option>
		</select>

		<br>

		<label for="brand">Brand:</label>
		<select name="brand">
			<option value="1">Apple</option>
		</select>

		<br>

		<label for="price">Price:</label>
		<input type="text" name="price" class="form__textbox">

		<br>

		<label for="condition">Condition:</label>
		<select name="condition">
			<option value="1">New</option>
		</select>

		<br>


		<input type="submit" class="form__submit button button--submit" value="Sell Product">

	</form>


</section>
