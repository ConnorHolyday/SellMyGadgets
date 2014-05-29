<?php
  class ProductController extends BaseController {

    function __construct() {
      parent::__construct();
      $this->model = new ProductModel();

      $this->view->categories = $this->model->getAllCategories();
      $this->view->conditions = $this->model->getAllConditions();
    }

    function all() {
      //get and sort pagination stuff

      $currentPage = (!isset($_GET['page'])) ? 1 : $_GET['page'];

      $category = (!isset($_GET['category'])) ? 'product_categories.id BETWEEN 0 AND 999' : 'product_categories.id =' . $_GET['category'];

      if(!isset($_GET['sort'])) {
          $_GET['sort'] = 'asc';
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
          case 'desc':
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

      $pages = ceil($this->model->countAllProducts() / PAGE_ITEMS);
      $last = $currentPage * PAGE_ITEMS;

      $first = $last - PAGE_ITEMS;

      $this->view->productsAmount = $this->model->countAllFilteredProducts($category, $condition);
      $this->view->pages = $pages;
      $this->view->firstProduct = $first;
      $this->view->lastProduct = $last - 1;

      $this->view->products = $this->model->loadAllProducts($category, $condition, $sort, $first);

      $this->view->render('Product/all', 'View all products', '', true, true, [['file', 'smg'], ['file', 'productview']]);
    }

    /*
    Querys all products by an id and will only return a single product information
    this function is accsed via the site_diretory/product/single
    */
    function view($id) {
     
      if(is_numeric($id)){
        $products = $this->model->getProductById($id);
      } else {
        $products = $this->model->getProductByName($id);
      }


     if(isset($_POST['question'])){
        $user = $this->model->getUserID($_SESSION['USER_NAME']);
        $this->model->setComment($user[0]['id'], $products[0]['id'], $_GET['commentID'], $_POST['question']);
      };


      $images = $this->model->getAllImages($id);

      $allMedia = array();
      $comments = array();

      foreach ($images as $media){
        array_push ($allMedia, '<img src="/' . STATIC_2 . 'small/' . $media['id'] . $media['extension'] . '" alt="' . $media['title'] . '" >');
      }

      foreach($this->model->getQuestion($id) as $question) {

          $array = array(
            'question' => 1,
            'id' => $question['id'],
            'userName' => $question['username'],
            'userImage' => 'to be done',
            'comment' => $question['comment']
          );
          array_push($comments, $array);

            foreach($this->model->getComments($id, $question['id']) as $reply) {
              $array = array(
                'question' => 0,
                'id' => $reply['id'],
                'userName' => $reply['username'],
                'userImage' => 'to be done',
                'comment' => $reply['comment']
              );
              array_push($comments, $array);
            }
      }

      $this->view->productId = $products[0]['id'];
      $this->view->productName = $products[0]['name'];
      $this->view->productPrice = $products[0]['price'];
      $this->view->productImage = '<img src="/' . STATIC_2 . 'medium/' . $products[0]['primary_image'] . $products[0]['extension'] . '" alt="' . $products[0]['title'] .'" >';
      $this->view->productImageName = $products[0]['title'];
      $this->view->productDeliveryDate = $products[0]['delivery_date'];
      $this->view->productDeliveryCost = $products[0]['delivery_cost'];
      $this->view->productCondition = $products[0]['condition_name'];
      $this->view->productSeller = $products[0]['username'];
      $this->view->productDescription = $products[0]['description'];
      $this->view->productMedia = $allMedia;
      $this->view->productComments = $comments;

      //render the view page
      $this->view->render('product/view', 'View product', '', true, true);
    }

    function Search(){
      if(!isset($_GET['page'])) {
        $currentPage = 1;
      } else {
        $currentPage = $_GET['page'];
      }

      if(!isset($_GET['sort'])) {
        $_GET['sort'] = 'asc';
      }

      if(!isset($_GET['s'])) {
        $search = '';
      } else {
        $search = $_GET['s'];
      }

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

      if($_GET['sort']) {
          $sort = 'name ASC';
      } else {
        switch ($_GET['sort']) {
          case 'asc':
            $sort = 'name ASC';
            break;
          case 'desc':
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

      $productCount = $this->model->countAllSearchedProducts($search, $category, $condition);
      $pages = ceil($productCount / PAGE_ITEMS);
      $last = $currentPage * PAGE_ITEMS;

      $first = $last - PAGE_ITEMS;

      $this->view->productsAmount = $productCount;
      $this->view->pages = $pages;
      $this->view->firstProduct = $first;
      $this->view->lastProduct = $last - 1;
      $this->view->searchKeywords = $search;

      $this->view->products = $this->model->searchProductsByName($search, $category, $condition, $sort, $first);

      $this->view->render('product/search', 'Searching for ' . $search, true, true);
    }
  }
