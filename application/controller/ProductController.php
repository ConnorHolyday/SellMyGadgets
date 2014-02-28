<?php
    class ProductController extends BaseController {

        function __construct() {
            parent::__construct();
            $this->model = new ProductModel();
        }

        function index() {

        }

        function all() {
            if(!isset($_GET['page'])) {
                $currentPage = 1;
            } else {
                $currentPage = $_GET['page'];    
            }


            $pages = ceil($this->model->countAllProducts() / PAGE_ITEMS);
            $last = $currentPage * PAGE_ITEMS;

            $first = $last - PAGE_ITEMS;
            
            $this->view->productsAmount = $this->model->countAllProducts();
            $this->view->pages = $pages;
            $this->view->firstProduct = $first;
            $this->view->lastProduct = $last - 1;

            $this->view->products = $this->model->loadAllProducts($first);

            echo PAGE_ITEMS, $currentPage, $pages, $last, $first;




            $this->view->render('Product/all', 'View all products', true, true);
        }








        /*
        Querys all products by an id and will only return a single product information
        this function is accsed via the site_diretory/product/single
        */
        function view($id) {
             if(is_numeric($category)){
                list($products, $images, $comments) = $this->model->getProductById($id);
            } else {
                list($products, $images, $comments) = $this->model->getProductByName($id);
            }
        

            //loop throgh query results (should only be 1) store each column data into its own varible for access from the view
            $allMedia = array();
            foreach ($products as $product){
                $this->view->productId = $product['id'];
                $this->view->productName = $product['name'];
                $this->view->productPrice = $product['price'];
                $this->view->productImage = $product['primary_image'];
                $this->view->productImageName = $product['title'];
                $this->view->productDeliveryDate = $product['delivery_date'];
                $this->view->productDeliveryCost = $product['delivery_cost'];
                $this->view->productCondition = $product['condition_name'];
                $this->view->productSeller = $product['username'];
                $this->view->productDescription = $product['description'];

                //images and comments to be updated still
                foreach ($images as $media){
                    array_push ($allMedia, '<img src="' . $media['id'] . '" alt="' . $media['title'] . '" >');
                }

                $this->view->productMedia = $allMedia;

                foreach ($comments as $comment){
                    array_push ($allComments, '' . $comments['id'] . $comments['comment']);
                }

                $this->view->productComments = $allComments;
            }

            //render the view page
            $this->view->render('product/view', 'View product', true, true);
        }

        /*
        Function to select all products in a catagory
         - Need to add a new paramter for page number so the model can update query
         - Domain/catagory/page/query/page
        */
        function category($category) {

            $products = $this->model->getProductByCategory($category);

            //loop throgh query results (should only be 1) store each column data into its own varible for access from the view
            $allMedia = array();
            foreach ($products as $product) {
                $this->view->productId = $product['id'];
                $this->view->productName = $product['name'];
                $this->view->productPrice = $product['price'];
                $this->view->productImage = '<img src="' . $product['primary_image'] . '" alt="' . $product['title'] . '">';
                $this->view->productImageName = $product['title'];
                $this->view->productCatagory = $product['category_name'];
                $this->view->productDescription = $product['description'];
            }

            //render the view page
            $this->view->render('product/category', 'View product by category', true, true);

            if(is_numeric($category)){
                $products = $this->model->getProductByCategoryId($category);
            } else {
                $products = $this->model->getProductByCategory($category);
            }

            //Check to see if the query retruend any results by counting number of rows
            //if the query returned results then continue with varible storage and page render
            if($products->num_rows >= 1){
                //loop throgh query results (should only be 1) store each column data into its own varible for access from the view
                $allMedia = array();
                foreach ($products as $product){
                    $this->view->productId = $product['id'];
                    $this->view->productName = $product['name'];
                    $this->view->productPrice = $product['price'];
                    $this->view->productImage = '<img src="' . $product['primary_image'] . '" alt="' . $product['title'] . '">';
                    $this->view->productImageName = $product['title'];
                    $this->view->productCategory = $product['category_name'];
                    $this->view->productDescription = $product['description'];
                }
                //render the view page

            //if returned no results render appology page
            } else {
                //render the view page
                //$this->view->
                //$this->view->render('product/category');
            }
        }
    }
