<?php

  class HomeController extends BaseController {

    function __construct() {
      parent::__construct();
    }

    function index() {
      $this->view->render('home/index', 'Homepage', true, true, [['file', 'smg'], ['inline', '(function(d){sellmygadgets.include(\'/home/stats\',d.querySelector(\'.js-stats\'));sellmygadgets.include(\'/home/star-seller\',d.querySelector(\'.js-star\'));})(document);']]);
    }

    function star_seller() {
      $this->view->render_include('home/starseller');
    }

    function stats() {
      $this->view->render_include('home/stats');
    }
  }