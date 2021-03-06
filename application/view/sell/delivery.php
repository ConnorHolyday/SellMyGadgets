<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item - Delivery Options</h1>
    </div>
  </div>

  <div class="wrapper">

  <nav itemscope itemtype ="https://schema.org/breadcrumb"class="breadcrumb breadcrumb__sell">
    <a itemprop="url" href="/sell/item/details">Details</a>
    <a itemprop="url" href="/sell/item/images">Images</a>
    <a itemprop="url" href="/sell/item/delivery" class="selected">Delivery</a>
    <a itemprop="url" href="/sell/item/confirm">Review</a>
  </nav>

    <form action="/sell/item/confirm" method="post" class="form submit-form">

      <div class="row">
        <div class="col m-all t-all d-all / form__block">
          <input type="radio" name="del_type" value="1" id="r1" required>
          <label for="r1">Delivery</label>
        </div>
      </div>

      <div class="row">
        <div class="col m-all t-3 d-4 / form__block label__bottom">
          <input type="number" min="0" name="del_price" id="del_price" required>
          <label for="del_price">Delivery Price (£)</label>
        </div>
        <div class="col m-all t-3 d-4 / form__block label__bottom">
          <input type="text" min="0" name="del_details" id="del_details" required>
          <label for="del_details">Delivery Details - E.g. First Class</label>
        </div>
      </div>

      <div class="row">
        <div class="col m-all t-all d-all / form__block">
          <input type="radio" name="del_type" value="2" id="r2" required>
          <label for="r2">Collection</label>
        </div>
      </div>

      <div class="form__block / label__bottom">
        <textarea name="coll_details" id="coll_details" required></textarea>
        <label for="coll_details">Collection Details</label>
      </div>

      <button class="pull-right / form__submit">Next Stage</button>

    </form>
  </div>

</section>
