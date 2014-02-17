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
            $this->view->render('sell/allitems', 'View all your items currently for sale', true, false);
        }

        function new_item() {
            $sellservice = new SellService();

            $this->view->categories = $sellservice->populateSelectTagByName('categories', 'category');
            $this->view->brands = $sellservice->populateSelectTagByName('brands', 'brand');
            $this->view->conditions = $sellservice->populateSelectTagByName('conditions', 'condition');

            /*if(isset($_POST['productname']) &&
                isset($_POST['productdescription']) &&
                isset($_POST['category']) &&
                isset($_POST['brand']) &&
                isset($_POST['price']) &&
                isset($_POST['condition'])) {*/
            if(sizeof($_POST) > 0) {

                $name = $_POST['productname'];
                $description = $_POST['productdescription'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $price = $_POST['price'];
                $condition = $_POST['condition'];

                $this->model->insertNewProduct($name, $category, $brand, $price, $description, $condition);
            }

            $this->view->render('sell/newitem', 'Add a new item for sale', true, false);
        }

        function edit_item() {
            $this->view->render('sell/edititem', 'Edit an item you have for sale', true, false);
        }

    }