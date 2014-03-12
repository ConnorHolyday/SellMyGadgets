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
        $productData['collection_details'],
        $id
      );

      $this->insertProductMedia($productData['images'], $id);
    }


    private function insertProductDeliveryDetails($del_type, $del_price, $collection, $coll_details, $productId) {

    }

    private function insertProductMedia($media, $productId) {

      foreach ($media['file'] as $key => $file) {

        $ext = $media['ext'][$key];

        $qry = $this->db->prepare_insert('product_media',
          'product_id, title, extension',
          "'$productId', '$file', '$ext'"
        );

        $id = $this->db->insert_return_id($qry);
        $fileName = str_pad($id, 8, '0', STR_PAD_LEFT);
        $tempFile = TMP_DIR . $file . '.' . $ext;

        $img = new ResizeImage($tempFile);

        $img->resizeImage(230, 230, 'crop');
        $img->saveImage(STATIC_2 . 'med/' . $fileName . '.' . $ext, 100);

        $img->resizeImage(115, 115, 'crop');
        $img->saveImage(STATIC_2 . 'sml/' . $fileName . '.' . $ext, 100);

        rename($tempFile, STATIC_2 . 'original/' . $fileName . '.' . $ext);

      }
    }

    public function getProductsByUser($user) {
      $qry = 'SELECT * FROM products p INNER JOIN user_products up ON up.product_id = p.id WHERE up.user_id = ' . $user . ';';

      return $this->db->execute_assoc_query($qry);
    }

  }
