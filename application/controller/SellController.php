<?php
    class SellController extends BaseController {

        function __construct() {
            parent::__construct();
        }

        function index() {
        	$this->view->render('sell/allitems', 'View all your items currently for sale', true, false);
        }

        function new_item() {

        }

        function edit_item() {
        	
        }

    }