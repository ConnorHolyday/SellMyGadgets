<section>
  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item - Upload Images</h1>
    </div>
  </div>
  <div class="wrapper">
    <nav class="breadcrumb breadcrumb__sell">
      <a href="/sell/item/details">Details</a>
      <a href="/sell/item/images" class="selected">Images</a>
      <a href="/sell/item/delivery">Delivery</a>
      <a href="/sell/item/confirm">Review</a>
    </nav>
    <form action="/sell/item/delivery" method="post" class="submit-form" enctype="multipart/form-data">
      <div class="drop-zone__wrapper">
        <h1>Drag 'n' drop</h1>
        <small>For the best output please upload a square image with minimum dimensions: 230x230px</small>

        <div class="drop-zone__wrapper-inner">
          <div class="drop-zone vertical-align">
            <span class="arrow">&#8593;</span>
            <span class="anim"></span>
            <span class="anim2"></span>
            <span class="anim3"></span>
          </div>
        </div>
      </div>
      <div class="form__block">
        <input type="file" name="uploads[]" multiple>
      </div>
      <button type="submit" class="form__submit pull-right">Next Stage</button>
    </form>
  </div>
</section>