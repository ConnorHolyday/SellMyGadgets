<?php
  class SellController extends BaseController {

    function __construct() {
      parent::__construct();
      AccountService::requiresLogin();
      $this->model = new SellModel();
      $this->service = new SellService();
    }

    function index() {
      $this->your_items();
    }

    function your_items() {
      $this->view->userProducts = $this->model->getProductsByUser(AccountService::checkAuth());
      $this->view->render('sell/allitems', 'View all your items currently for sale', true, false);
    }

    function item($stage = 'details') {

      $this->service->checkSellSession();

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

          $this->upload();

          $this->view->render('sell/delivery', 'Sell Item - Delivery', true, false);

          break;

        case 'confirm':

          if(sizeof($_POST) > 0) {
            $del_type = $_POST['del_type'];
            $del_price = $_POST['del_price'];
            $collection = $_POST['collection'];
            $coll_details = $_POST['coll_details'];

            $this->service->addDeliveryDataToSession($del_type, $del_price, $collection, $coll_details);
          }

          $this->view->confirmData = $this->service->getSellSessionData();
          $this->view->render('sell/confirm', 'Sell Item - Confirm', true, false);

          break;

        case 'processed':

          /* !!! =========================

          Check validity before processing

          ========================= !!! */

          $this->view->processMessage = '<h1 class="center--large">Your item will now go through an administration process.</h1><h2 class="center--large">If your item is accepted, it will become visible on the site.</h2>';

          $this->view->render('sell/processed', 'Sell Item - Processed', true, false);

          break;

        default:
          header('Location: /sell/item/details');
          break;
      }

    }

    function upload() {

      if(isset($_FILES['uploads'])) {

        if($this->service->checkUploadAmount() < 5) {

          $exts = ['png', 'jpg', 'jpeg', 'gif'];

          foreach ($_FILES['uploads']['tmp_name'] as $key => $tmp_name) {

            if(is_uploaded_file($tmp_name)) {

              $ext = explode('.', $_FILES['uploads']['name'][$key]);
              $ext = strtolower(end($ext));

              if(in_array($ext, $exts) === false) {
                // extension not allowed, do something about it.
              } else {

                try {

                  $folder = AccountService::checkAuth();

                  if (!file_exists(TMP_DIR . $folder)) {
                    mkdir(TMP_DIR . $folder, 0777, true);
                  }

                  $name = md5(uniqid(rand(), true));
                  move_uploaded_file($tmp_name, TMP_DIR . $folder . '/' . $name . '.' . $ext);

                  $this->service->addImagesDataToSession($name, $ext);

                  echo $_FILES['uploads']['name'][$key] . ' was successfully uploaded.';

                } catch (Exception $e) {
                  // Something went horribly wrong and the site will crash.
                  echo $_FILES['uploads']['name'][$key] . ' could not be uploaded.';
                }

              }

            }

          }
        } else {
          // User has reached upload limit
          echo 'You have reached the upload limit of 5';
        }

      } else {
        //echo 'not set';
      }

    }

    function edit_item($id) {
      if($id != null) {
        $this->view->render('sell/edititem', 'Edit an item you have for sale', true, false);
      } else {
        header('Location: /sell/your-items');
      }
    }

  }
