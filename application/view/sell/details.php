<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item</h1>
    </div>
  </div>

  <div class="wrapper">

    <h2>Details</h2>

    <form action="/sell/item/images" method="post" class="form__float-label submit-form">

      <div class="form__block label__bottom">
        <input type="text" name="productname" class="" required>
        <label for="productname">Product Name</label>
      </div>

      <div class="row / form__block">
        <div class="col m-all t-2 d-2 / label__bottom">
          <input type="number" name="price" class="" required>
          <label for="price">Price (£)</label>
        </div>

        <div class="col m-all t-2 d-2 / select__block">
          <label for="condition">Condition:</label>
          <select name="condition">
            <?php echo $this->conditions; ?>
          </select>
        </div>
      </div>

      <div class="row / form__block">
        <div class="col m-all t-2 d-2 / select__block">
          <label for="category">Category:</label>
          <select name="category">
            <?php echo $this->categories; ?>
          </select>
        </div>

        <div class="col m-all t-2 d-2 / select__block">
          <label for="brand">Brand:</label>
          <select name="brand">
            <?php echo $this->brands; ?>
          </select>
        </div>
      </div>

      <div class="form__block label__bottom">
        <textarea name="productdescription" required></textarea>
        <label for="productdescription">Product Description</label>
      </div>

      <button type="submit" class="pull-right / form__submit" disabled>Next Stage</button>

    </form>

  </div>
</section>
