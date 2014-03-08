<?php
    class ProductController extends BaseController {

        function __construct() {
            parent::__construct();
            $this->model = new ProductModel();
        }

        function all() {
            //get and sort pagination stuff
            if(!isset($_GET['page'])) {
                $currentPage = 1;
            } else {
                $currentPage = $_GET['page'];    
            }

            if(!isset($_GET['']))

            $pages = ceil($this->model->countAllProducts() / PAGE_ITEMS);
            $last = $currentPage * PAGE_ITEMS;

            $first = $last - PAGE_ITEMS;
            
            $this->view->productsAmount = $this->model->countAllProducts();
            $this->view->pages = $pages;
            $this->view->firstProduct = $first;
            $this->view->lastProduct = $last - 1;

            //get catgory id
            //get condition id
            //oreder by

            if(!isset($_GET['category'])) {
                $category = 'product_categories.id BETWEEN 0 AND 999';
            } else {
                $category = 'product_categories.id =' . $_GET['category'];
            }

            if(!isset($_GET['condition'])) {
                $condition = 'product_condition.id BETWEEN 0 AND 999'; 
            } else {
                $category = 'product_categories.id =' . $_GET['condition'];
            }

            if(!isset($_GET['sort'])) {
                $sort = 'name ASC';
            } else {
                switch ($_GET['sort']) {
                    case 'asc':
                            $sort = 'name ASC';
                        break;
                    case 'dec':
                            $sort = 'name DESC';
                        break;
                    case 'big':
                            $sort = 'price ASC';
                        break;
                    case 'sml':
                            $sort = 'price DESC';
                        break;
                    default:
                            $sort = 'name ASC';
                        break;
                }
            }

            $this->view->products = $this->model->loadAllProducts($category ,$condition ,$sort ,$first);
            $this->view->categories = $this->model->getAllCategories();
            $this->view->conditions = $this->model->getAllConditions();

            $this->view->render('Product/all', 'View all products', true, true);
        }

        /*
        Querys all products by an id and will only return a single product information
        this function is accsed via the site_diretory/product/single
        */
        function view($id) {
             if(is_numeric($id)){
                list($products, $images, $comments) = $this->model->getProductById($id);
            } else {
                list($products, $images, $comments) = $this->model->getProductByName($id);
            }
        

            //loop throgh query results (should only be 1) store each column data into its own varible for access from the view
            $allMedia = array();
            $allComments = array();

            foreach ($products as $product){
                $this->view->productId = $product['id'];
                $this->view->productName = $product['name'];
                $this->view->productPrice = $product['price'];
                $this->view->productImage = '<img src="' . IMG_MED_DIR . $product['primary_image'] . $product['extension'] . '" alt="' . $product['title'] .'" >';
                $this->view->productImageName = $product['title'];
                $this->view->productDeliveryDate = $product['delivery_date'];
                $this->view->productDeliveryCost = $product['delivery_cost'];
                $this->view->productCondition = $product['condition_name'];
                $this->view->productSeller = $product['username'];
                $this->view->productDescription = $product['description'];

                //images and comments to be updated still
                foreach ($images as $media){
                    array_push ($allMedia, '<img src="' . IMG_MED_DIR . $media['id'] . $media['extension'] . '" alt="' . $media['title'] . '" >');
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
            if($category == null) $category = 1;
            
            if(is_numeric($category)){
                $products = $this->model->getProductByCategoryId($category);
                $this->view->category_name = $category;
            } else {
                $products = $this->model->getProductByCategory($category);
                $this->view->category_name = $category;
            }

            //loop throgh query results (should only be 1) store each column data into its own varible for access from the view
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

            $this->view->products = $products;

            //render the view page
            $this->view->render('product/category', 'View product by category', true, true);

        }
    }
