<?php
	class SearchController extends BaseController {

		function __construct() {
			parent::__construct();
 			$this->model = new SearchModel();
		}

		function index() {

		}

		/* Querys all products to display within the products page
		this function is accsed via the site_directory/product/all */
		function Results($keywords){
			if(!isset($_GET['page'])) {
                $currentPage = 1;
            } else {
                $currentPage = $_GET['page'];    
            }

            if(!isset($_GET['sort'])) $_GET['sort'] = 'asc';

            $productCount = $this->model->countAllProducts($keywords); 
            $pages = ceil($productCount / PAGE_ITEMS);
            $last = $currentPage * PAGE_ITEMS;

            $first = $last - PAGE_ITEMS;
            
            $this->view->productsAmount = $productCount;
            $this->view->pages = $pages;
            $this->view->firstProduct = $first;
            $this->view->lastProduct = $last - 1;

            switch ($_GET['sort']) {
            	case 'asc':
               		$this->view->products = $this->model->searchByAlphabeticalAsc($keywords, $first);
            		break;
    		  	case 'dec':
	        		$this->view->products = $this->model->searchByalphabeticalDec($keywords, $first);
	        		break;
    		  	case 'big':
	        		$this->view->products = $this->model->searchByPriceBigest($keywords, $first);
	        		break;
    		  	case 'sml':
	        		$this->view->products = $this->model->searchByPriceSmallest($keywords, $first);
	        		break;
	        	case 'basic':
	        		$this->view->products = $this->model->searchBasic($keywords, $first);
	        		break;
            	default:
            		$this->view->products = $this->model->searchBasic($keywords, $first);
            		break;
            }
            
			$this->view->render('search/results', 'Searching for ' . $keywords, true, true);
		}
	}