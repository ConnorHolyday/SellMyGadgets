<?php	
	class ProductController extends BaseController {
		
		function __construct() {	
			parent::__construct();	

			//call the model functions to send and recieve querys
			require "application/model/ProductModel.php";
			$this->model = new ProductModel();
		}
				
		/* 
		Querys all products to display within the products page
		this function is accsed via the site_directory/product/all 
		*/
		function all() {	
			$products = $this->model->loadAllProducts();
			
			//loop throug the array and push html out put string to new array to tidy out puts
			$productLine = array();

			foreach ($products as $product){
				array_push ($productLine , 
								$product['id'] . " " .
								$product['name'] . " " .
								$product['price'] . " " .
								$product['primary_image'] . " " .
								$product['title'] . " " .
								$product['catagory_name'] . " " .
								$product['delivery_date'] . " " .
								$product['delivery_cost'] . " " .
								$product['condition_name'] . " " .
								$product['username'] . " " .
								$product['description'] .	"<br>"
							);
				}
			
			//store the array in global varible and render the veiw
			$this->view->products = $productLine;		
			$this->view->render('Product/index');
	
		}
		
		/*
		Querys all products by an id and will only return a single product information
		this function is accsed via the site_diretory/product/single
		*/
		function view($id) {
			list($products, $images, $comments) = $this->model->getProductById($id);

			//loop throgh query results (should only be 1) store each column data into its own varible for access from the view
			$allMedia = array();
			foreach ($products as $product){
				$this->view->productId = $product['id'];
				$this->view->productName = $product['name'];
				$this->view->productPrice = $product['price'];
				$this->view->productImage = $product['primary_image'];
				$this->view->productImageName = $product['title'];
				$this->view->productCatagory = $product['catagory_name'];
				$this->view->productDeliveryDate = $product['delivery_date'];
				$this->view->productDeliveryCost = $product['delivery_cost'];
				$this->view->productCondition = $product['condition_name'];
				$this->view->productSeller = $product['username'];	
				$this->view->productDescription = $product['description'];
				
				
				//images and comments to be updated still
				foreach ($images as $media){
					array_push ($allMedia, '<img src="' . $media['id'] . '" alt="' . $media['title'] . '" >')	;	

					
				}
				
				$this->view->productMedia = $allMedia;
				
				foreach ($comments as $comment){
					array_push ($allCommetns, '' . $comments['id'] . $comments['comment']);
				}
				
				$this->view->productComments = $allComments;
					
			}
					
			//render the view page							
			$this->view->render('Product/view');
		}
	
		/* 
		Function to select all products in a catagory
		 - Need to add string and integer detect to select by catagory id or catagory name
		*/
		function catagory($catagory){
			$products = $this->model->getProductByCatagory($catagory);

			//loop throgh query results (should only be 1) store each column data into its own varible for access from the view
			$allMedia = array();
			foreach ($products as $product){
				$this->view->productId = $product['id'];
				$this->view->productName = $product['name'];
				$this->view->productPrice = $product['price'];
				$this->view->productImage = '<img src="' . $product['primary_image'] . '" alt="' . $product['title'] . '">';
				$this->view->productImageName = $product['title'];
				$this->view->productCatagory = $product['category_name'];
				$this->view->productDescription = $product['description'];
					
			//render the view page							
			$this->view->render('Product/catagory');
			
		}		
	}
}