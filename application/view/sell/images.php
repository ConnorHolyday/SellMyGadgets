<section>
  <div class="hero-banner">
    <div class="wrapper">
      <h1>Sell an item - Upload Images</h1>
    </div>
  </div>
  <div class="wrapper">
    <nav itemscope itemtype ="https://schema.org/breadcrumb" class="breadcrumb breadcrumb__sell">
      <a itemprop="url" href="/sell/item/details">Details</a>
      <a itemprop="url" href="/sell/item/images" class="selected">Images</a>
      <a itemprop="url" href="/sell/item/delivery">Delivery</a>
      <a itemprop="url" href="/sell/item/confirm">Review</a>
    </nav>
    <form action="/sell/item/delivery" method="post" class="submit-form" enctype="multipart/form-data">
      <div class="drop-zone__wrapper">
        <h1>Drag files here to upload</h1>

        <div class="drop-zone__wrapper-inner">
          <div class="drop-zone vertical-align">
            <span class="arrow">&#8593;</span>
            <span class="anim"></span>
            <span class="anim2"></span>
            <span class="anim3"></span>
          </div>
        </div>
      </div>
      OR
      <p>
        Use the upload control below
      </p>
      <div class="form__block">
        <input type="file" name="uploads[]" multiple>
      </div>
      <button class="form__submit pull-right">Next Stage</button>
    </form>
  </div>
</section>