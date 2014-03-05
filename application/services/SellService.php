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


    function buildSellSession() {

      $_SESSION['SELL_DATA'] = [
        'name' => '',
        'description' => '',
        'category' => '',
        'brand' => '',
        'price' => '',
        'condition' => '',
        'images' => ''
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

    function addImagesDataToSession () {

    }

    function addDeliveryDataToSession() {

    }

    function destroySellSession() {
      unset($_SESSION['SELL_DATA']);
    }

  }

