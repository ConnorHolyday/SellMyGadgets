<?php
  class SellController extends BaseController {

    function __construct() {
      parent::__construct();
      AccountService::requiresLogin();
      $this->model = new SellModel();
    }

    function index() {
      $this->your_items();
    }

    function your_items() {
      $this->view->userProducts = $this->model->getProductsByUser(AccountService::checkAuth());
      $this->view->render('sell/allitems', 'View all your items currently for sale', true, false);
    }

    function item($stage = 'details') {


      $sellservice = new SellService();


      switch ($stage) {
        case 'details':

          $this->view->categories = $sellservice->populateSelectTagByName('categories', 'category');
          $this->view->brands = $sellservice->populateSelectTagByName('brands', 'brand');
          $this->view->conditions = $sellservice->populateSelectTagByName('conditions', 'condition');

          $this->view->render('sell/details', 'Sell Item - Details', true, false);

          break;
        case 'images':
          $this->view->render('sell/images', 'Sell Item - Images', true, false);
          break;
        case 'delivery':
          $this->view->render('sell/delivery', 'Sell Item - Delivery', true, false);
          break;
        case 'confirm':
          $this->view->render('sell/confirm', 'Sell Item - Confirm', true, false);
          break;

        default:

          break;
      }

      /*


      if(sizeof($_POST) > 0) {

        $name = $_POST['productname'];
        $description = $_POST['productdescription'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $condition = $_POST['condition'];

        $this->model->insertNewProduct($name, $category, $brand, $price, $description, $condition);
      }*/
    }

    function upload() {

    }

    function edit_item($id) {
      if($id != null) {
        $this->view->render('sell/edititem', 'Edit an item you have for sale', true, false);
      } else {
        header('Location: /sell/your-items');
      }
    }

  }