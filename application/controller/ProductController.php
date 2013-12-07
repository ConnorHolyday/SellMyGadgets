<?php
	echo "Product controller";
	
	class ProductController extends BaseController {
		
		function __construct() {
			parent::__construct();
		}
		
		function all() {
							
			$this->view->render('Product/index');
		}
		
		function single($id) {
			$qry = 'SELECT * FROM 
			
			';
			//$database->doQuery($qry);
			
			$this->view->render('Product/single');
		}
		
		function search(){
					
		}
		
		function catagory() {
			$qry ='';
			
			//$$database->doQuery($qry);
			
			$this->view->render('Product/index');
		}
		
		function Create() {		
		 	echo 'CreateProduct controller';
			$this->view->render('Product/create');		
		}
		
		
	}