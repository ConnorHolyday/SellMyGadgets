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

      $this->service = new SellService();

      switch ($stage) {
        case 'details':

          $this->view->categories = $this->service->populateSelectTagByName('categories', 'category');
          $this->view->brands = $this->service->populateSelectTagByName('brands', 'brand');
          $this->view->conditions = $this->service->populateSelectTagByName('conditions', 'condition');

          $this->view->render('sell/details', 'Sell Item - Details', true, false);

          break;

        case 'images':

          if(sizeof($_POST) > 0) {

            $name = $_POST['productname'];
            $description = $_POST['productdescription'];
            $category = $_POST['category'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $condition = $_POST['condition'];

            $this->service->addDetailsDataToSession($name, $category, $brand, $price, $description, $condition);
          }

          $this->view->render('sell/images', 'Sell Item - Images', true, false);

          break;

        case 'delivery':

          if(isset($_FILES['uploads'])) {

            $exts = ['png', 'jpg', 'jpeg', 'gif'];

            foreach ($_FILES['uploads']['tmp_name'] as $key => $tmp_name) {

              if(is_uploaded_file($tmp_name)) {

                $ext = explode('.', $_FILES['uploads']['name'][$key]);
                $ext = strtolower(end($ext));


                if(in_array($ext, $exts) === false) {
                  // extension not allowed
                } else {

                  try {

                    $name = md5(uniqid(rand(), true)) . '.' . $ext;
                    move_uploaded_file($tmp_name, TMP_DIR . $name);

                  } catch (Exception $e) {

                  }

                }

              }


            }
          }

          $this->view->render('sell/delivery', 'Sell Item - Delivery', true, false);

          break;

        case 'confirm':

          if(sizeof($_POST) > 0) {

          }

          $this->view->render('sell/confirm', 'Sell Item - Confirm', true, false);

          break;

        default:
          header('Location: /sell/item/details');
          break;
      }

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

