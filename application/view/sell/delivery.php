<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item</h1>
    </div>
  </div>

  <div class="wrapper">

    <form action="/sell/item/confirm" method="post" class="form">

      <h2>Delivery Details</h2>


      <label>Delivery Type</label>
      <input type="radio" name="del_type" value="1" id="r1">
      <label for="r1">Royal Mail 1st Class</label>
      <input type="radio" name="del_type" value="2" id="r2">
      <label for="r2">Royal Mail 2nd Class</label>
      <input type="radio" name="del_type" value="3" id="r3">
      <label for="r3">Parcelforce Next Day Service</label>
      <input type="radio" name="del_type" value="4" id="r4">
      <label for="r4">Parcelforce 2 Day Service</label>

      <label for="del_price">Delivery Price</label>
      <input type="text" name="del_price" id="del_price">
      <h2>Collection Details</h2>
      <input type="checkbox" name="collection" id="collection">
      <label for="collection">
        Available for Collection
      </label>
      <label for="coll_details">Other Collection details</label>
      <textarea name="coll_details" id="coll_details"></textarea>

      <input type="submit" class="form__submit button button--submit" value="Next Stage">

    </form>
  </div>

</section>