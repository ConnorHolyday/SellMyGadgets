<section class="wrapper">

    <h1>All your items</h1>


    <?php

      if($this->userProducts != null) {
        foreach ($this->userProducts as $product) {
            echo
            $product['name'] . ' ' .
            '<a href="/product/view/' . $product['id'] . '">View Item</a>' .
            ' <a href="/sell/edit-item/' . $product['id'] . '">Edit Item</a><br>';
        }
      } else {
        echo '<p>You are currently not selling any items, why don\'t you </p>';
      }
    ?>


    <a href="/sell/new-item">Sell a new item</a>

</section>