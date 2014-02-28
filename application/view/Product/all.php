<div class="wrapper">
  <nav class="breadcrumb breadcrumb__product">
    <a href="/">Home</a>
    <a href="#">Product Search</a>
    <a href="#">Product Search for "iPhone"</a>
  </nav>

  <div class="content">

    <div class="page-options cf">
      <nav class="pagination pull-left border__none--hover">
        <a href="#">&laquo;</a>
        <a href="#">&lsaquo;</a>
        <a href="#" class="selected">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <span>&hellip;</span>
        <a href="#">20</a>
        <a href="#">&rsaquo;</a>
        <a href="#">&raquo;</a>
      </nav>

      <div class="pull-right page-options__view">
        <div class="inline-block page-options__view--sort">
          <span>Sort:</span>
          <select name="sort">
            <option value="1">Name (A-Z)</option>
            <option value="2">Name (Z-A)</option>
            <option value="3">Price (Low - High)</option>
            <option value="4">Price (High - Low)</option>
          </select>
        </div>

        <div class="inline-block page-options__view--grid">
          <span>View:</span>
          <a href="#" class="view--grid">Grid</a>
          <a href="#" class="view--list">List</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col d-2">
        <aside class="page-options__sidebar">

          <div class="page-options__sidebar-item list-block__wrap">
            <h2 class="list-block__title">Categories</h2>
            <ul class="list-block__list border__none--hover">
              <li class="icon-uniE604">
                <a href="#">Samsung</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">Apple</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">Nokia</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">Blackberry</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">View More...</a>
              </li>
            </ul>
          </div>

          <div class="page-options__sidebar-item list-block__wrap">
            <h2 class="list-block__title">Condition</h2>
            <ul class="list-block__list border__none--hover">
              <li class="icon-uniE604">
                <a href="#">New</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">Used</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">Not Specified</a>
              </li>
            </ul>
          </div>

          <div class="page-options__sidebar-item list-block__wrap">
            <h2 class="list-block__title">Related</h2>
            <ul class="list-block__list border__none--hover">
              <li class="icon-uniE604">
                <a href="#">iPhone 5S</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">iPhone 5C</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">iPhone 5</a>
              </li>
              <li class="icon-uniE604">
                <a href="#">iPhone 4S</a>
              </li>
            </ul>
          </div>
        </aside>
      </div>

      <div class="col d-6">

        <div class="row display--grid">

          <?php if($this->products != null) : ?>

            <span class="col d-all">Showing 1 - <?php echo "1" //Amount of pages ?> of <?php echo sizeof($this->products); ?> Results</span>

            <?php foreach ($this->products as $product) : ?>
              <div class="col d2-2">
                <div class="boxed module__product">
                  <img src="<?php echo $product['primary_image']; ?>" alt="">

                  <ul class="product-meta list-block__list">
                    <li><?php echo $product['name']; ?></li>
                    <li>£<?php echo $product['price']; ?></li>
                    <li>Condition - <?php echo $product['condition_name']; ?></li>

                    <li class="tags">Tags: iPhone, Apple, Mobile, Phone</li>
                  </ul>

                  <a href="#" class="btn btn--dark">View Product</a>
                </div>
              </div>
            <?php endforeach; ?>

          <?php else : ?>

            <div class="col d-all">
              <p>No products to show in this view</p>
            </div>

          <?php endif; ?>

        </div>

      </div>
    </div>

    <div class="page-options cf">
      <nav class="pagination pull-left border__none--hover">
        <a href="#">&laquo;</a>
        <a href="#">&lsaquo;</a>
        <a href="#" class="selected">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <span>&hellip;</span>
        <a href="#">20</a>
        <a href="#">&rsaquo;</a>
        <a href="#">&raquo;</a>
      </nav>

      <div class="pull-right page-options__view">
        <div class="inline-block page-options__view--sort">
          <span>Sort:</span>
          <select name="sort">
            <option value="1">Name (A-Z)</option>
            <option value="2">Name (Z-A)</option>
            <option value="3">Price (Low - High)</option>
            <option value="4">Price (High - Low)</option>
          </select>
        </div>

        <div class="inline-block page-options__view--grid">
          <span>View:</span>
          <a href="#" class="view--grid">Grid</a>
          <a href="#" class="view--list">List</a>
        </div>
      </div>
    </div>

  </div>
</div>