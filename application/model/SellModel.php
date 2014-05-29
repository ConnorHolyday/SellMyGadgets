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

      $delivery_id = $this->insertProductDeliveryDetails(
        $productData['delivery_type'],
        $productData['delivery_price'],
        0,
        $productData['collection_details']
      );

      $qry = $this->db->prepare_insert('products',
        'name, category, price, status',
        "'$name', $category, $price, 1"
      );

      $id = $this->db->insert_return_id($qry);

      $qry2 = $this->db->prepare_insert('product_details',
        'product_id, primary_image, description, delivery_id, condition_id, creation_date, created_by, modified_date, modified_by',
        "$id, 0, '$description', $delivery_id, $condition, CURDATE(), $user, CURDATE(), $user"
      );

      $this->db->execute_query($qry2);

      $qry3 = $this->db->prepare_insert('user_products', 'user_id, product_id', "$user, $id");
      $this->db->execute_query($qry3);

      if($productData['images'] != null) {
        $this->insertProductMedia($productData['images'], $id);
      }
    }

    private function insertProductDeliveryDetails($del_type, $del_price, $collection, $coll_details) {
      $qry = $this->db->prepare_insert(
        'product_delivery',
        'delivery_status, delivery_cost, collection_available, collection_details',
        "'$del_type', $del_price, $collection, '$coll_details'"
      );

      $id = $this->db->insert_return_id($qry);

      return $id;
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
