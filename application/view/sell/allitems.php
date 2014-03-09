<section>

  <div class="hero-banner">
    <div class="wrapper">
      <h1>Your Items</h1>
    </div>
  </div>

  <div class="wrapper">
    <?php if ($this->userProducts != null) : ?>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>View</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>

      <?php
        foreach ($this->userProducts as $product) {
          echo '<tr><td>' . $product['name'] . '</td>' .
          '<td><a href="/product/view/' . $product['id'] . '">View Item</a></td>' .
          '<td><a href="/sell/edit-item/' . $product['id'] . '">Edit Item</a></td></tr>';
        }
      ?>
      </tbody>
    </table>
    <?php else : ?>
      <div class="center--large">
        <h2>You aren't selling anything!</h2>
      </div>
    <?php endif; ?>
    <div class="form__block cf">
      <a href="/sell/item/details" class="pull-right / btn btn--large btn--dark">Sell an item</a>
    </div>

  </div>
</section>