<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item</h1>
    </div>
  </div>

  <div class="wrapper">

    <h2>Details</h2>

    <form action="/sell/item/images" method="post" class="form">

      <label for="productname">Product Name:</label>
      <input type="text" name="productname" class="form__textbox">

      <br>

      <label for="productdescription">Product Description:</label>
      <textarea name="productdescription">
      </textarea>

      <br>

      <label for="category">Category:</label>
      <select name="category">
        <?php echo $this->categories; ?>
      </select>

      <br>

      <label for="brand">Brand:</label>
      <select name="brand">
        <?php echo $this->brands; ?>
      </select>

      <br>

      <label for="price">Price:</label>
      £<input type="text" name="price" class="form__textbox">

      <br>

      <label for="condition">Condition:</label>
      <select name="condition">
        <?php echo $this->conditions; ?>
      </select>

      <br>

      <input type="submit" class="form__submit button button--submit" value="Next Stage">

    </form>

  </div>
</section>
