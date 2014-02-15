<?php
    class SellController extends BaseController {

        function __construct() {
            parent::__construct();
        }

        function index() {
        	$this->view->render('sell/allitems', 'View all your items currently for sale', true, false);
        }

        function new_item() {
					$this->view->render('sell/newitem', 'Add a new item for sale', true, false);
        }

        function edit_item() {
					$this->view->render('sell/edititem', 'Edit an item you have for sale', true, false);
        }

    }