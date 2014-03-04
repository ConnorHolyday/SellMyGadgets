<section class="wrapper">

    <style type="text/css">
        table {
            text-align: left;
            border: 1px solid #d5d5d5;
        }
        td, th {
            padding: .5em;
            border: 1px solid #d5d5d5;
        }

    </style>

    <h1>Your items currently for sale</h1>

    <?php if ($this->userProducts != null): ?>
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
    <?php else: ?>
    <p>You are currently not selling any items, why don't you</p>
    <?php endif ?>
    <a href="/sell/item/details">Sell an item</a>

</section>