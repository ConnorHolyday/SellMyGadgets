<?php
  class SellModel extends BaseModel {

    function __construct() {
      parent::__construct();
    }

    public function insertNewProduct($productData) {

      $name = $productData['name'];
      $category = $productData['category'];
      $brand = $productData['brand'];
      $price = $productData['price'];
      $description = $productData['description'];
      $condition = $productData['condition'];
      $user = AccountService::checkAuth();

      $qry = $this->db->prepare_insert('products',
        'name, category, brand, price, status',
        "'$name', $category, $brand, $price, 1"
      );

      $id = $this->db->insert_return_id($qry);

      $qry = $this->db->prepare_insert('product_details',
        'product_id, primary_image, description, condition_id, creation_date, created_by, modified_date, modified_by',
        "$id, 0, '$description', $condition, CURDATE(), $user, CURDATE(), $user"
      );

      $this->db->execute_query($qry);

      $qry = $this->db->prepare_insert('user_products', 'user_id, product_id', "$user, $id");
      $this->db->execute_query($qry);

      $this->insertProductDeliveryDetails(
        $productData['delivery_type'],
        $productData['delivery_price'],
        $productData['collection'],
        $productData['collection_details']
      );

      $this->insertProductMedia($productData['images']);
    }


    private function insertProductDeliveryDetails($del_type, $del_price, $collection, $coll_details) {

    }

    private function insertProductMedia($media) {

    }


    public function getProductsByUser($user) {
      $qry = 'SELECT * FROM products p INNER JOIN user_products up ON up.product_id = p.id WHERE up.user_id = ' . $user . ';';

      return $this->db->execute_assoc_query($qry);
    }


  }
