<?php

  class SellService {

    function __construct() {

    }

    function populateSelectTagByName($name, $field) {
      $db = new Database();

      $qry = $db->prepare_basic_select('*', 'product_' . $name);
      $arr = $db->execute_assoc_query($qry);

      if($arr != null) {

        $options = '';

        foreach($arr as $option) {
          $options .= '<option value="' . $option['id'] . '">' . $option[$field . '_name'] . '</option>';
        }

        return $options;
      }
    }

    function checkSellSession() {
      if(!isset($_SESSION['SELL_DATA'])) {
        $this->buildSellSession();
      }

      //print_r($_SESSION['SELL_DATA']);
    }

    function buildSellSession() {

      $_SESSION['SELL_DATA'] = [
        'name' => '',
        'description' => '',
        'category' => '',
        'brand' => '',
        'price' => '',
        'condition' => '',
        'delivery_type' => '',
        'delivery_price' => '',
        'collection' => false,
        'collection_details' => '',
        'images' => []
      ];
    }

    function getSellSessionData() {
      return $_SESSION['SELL_DATA'];
    }

    function addDataToSellSession ($propName, $value) {
      $_SESSION['SELL_DATA'][$propName] = $value;
    }

    function addDetailsDataToSession($name, $category, $brand, $price, $description, $condition) {
      $this->addDataToSellSession('name', $name);
      $this->addDataToSellSession('category', $category);
      $this->addDataToSellSession('brand', $brand);
      $this->addDataToSellSession('price', $price);
      $this->addDataToSellSession('description', $description);
      $this->addDataToSellSession('condition', $condition);
    }

    function addImagesDataToSession($file, $ext) {
      $arr = $_SESSION['SELL_DATA']['images'];
      $arr[] = ['file' => $file, 'ext' => $ext];
      $_SESSION['SELL_DATA']['images'] = $arr;
    }

    function checkUploadAmount() {
      return count($_SESSION['SELL_DATA']['images']);
    }

    function addDeliveryDataToSession($del_type, $del_price, $collection, $coll_details) {
      $this->addDataToSellSession('delivery_type', $del_type);
      $this->addDataToSellSession('delivery_price', $del_price);
      $this->addDataToSellSession('collection', $collection);
      $this->addDataToSellSession('collection_details', $coll_details);
    }

    function destroySellSession() {
      unset($_SESSION['SELL_DATA']);
    }

  }
