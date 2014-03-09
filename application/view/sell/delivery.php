<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item - Delivery Options</h1>
    </div>
  </div>

  <div class="wrapper">

    <form action="/sell/item/confirm" method="post" class="form submit-form">

      <div class="row form__block">
        <div class="col m-1 t-3 d-4">
          <input type="radio" name="del_type" value="1" id="r1" required>
          <label for="r1">Delivery</label>
        </div>
        <div class="col m-1 t-3 d-4">
          <input type="radio" name="del_type" value="2" id="r2" required>
          <label for="r2">Collection</label>
        </div>
      </div>

      <div class="row / form__block">
        <div class="col m-all t-3 d-4 / label__bottom">
          <input type="number" min="0" name="del_price" id="del_price" required>
          <label for="del_price">Delivery Price (£)</label>
        </div>
        <div class="col m-all t-3 d-4 / label__bottom">
          <input type="text" min="0" name="del_details" id="del_details" required>
          <label for="del_details">Delivery Details - E.g. First Class</label>
        </div>
      </div>
      <div class="form__block / label__bottom">
        <textarea name="coll_details" id="coll_details" required></textarea>
        <label for="coll_details">Collection Details</label>
      </div>

      <button type="submit" class="pull-right / form__submit">Next Stage</button>

    </form>
  </div>

</section>